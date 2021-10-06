<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use Illuminate\Http\Request;

class BillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bills = Bill::get();
        return view('bills.index',[
            'bills' => $bills
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('bills.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $bill = new Bill();
        $bill->restable_id = $request->input('restable_id');
        $bill->user_id = $request->input('user_id');
        $bill->total = $request->input('total');
        $bill->status = true;
        $bill->save();

        $menus = trim($request->input('menus_id'));
        $this->updateBillMenu($bill, $menus);

        return redirect()->route('bills.index');
    }

    private function updateBillMenu($bill, $menusWithComma) { // bill ส่งเข้ามาเพื่อ update ทั้ง object
        if ($menusWithComma) { // ถ้ามี menus ให้ทำต่อ
            $menu_array = [];
            $menus = explode(",", $menusWithComma); // ตัดคำด้วย ,
            foreach($menus as $menu) {
                $menu = trim($menu); // trim is ตัด space หน้าหลัง
                if ($menu) {
                array_push($menu_array, $menu);
                }
            }
            $bill->menus()->sync($menu_array); // ถ้ามีไม่อัพ ถ้าไม่มีสร้างใหม่ ไม่มีซ้ำในอาร์เรย์ลบออก
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $bill = Bill::findOrFail($id);
        return view('bills.show',['bill' => $bill]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bill = Bill::findOrFail($id);
        return view('bills.edit',['bill' => $bill]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       $bill = Bill::findOrFail($id);
       $bill->restable_id = $request->input('restable_id');
       $bill->user_id = $request->input('user_id');
       $bill->total = $request->input('total');
       $bill->status = true;
       $bill->save();

       $menus = trim($request->input('menus_id'));
       $this->updateBillMenu($bill, $menus);

       return redirect()->route('bills.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bill = Bill::findOrFail($id);
        $bill->delete();

        return redirect()->route('bills.index');
    }
}
