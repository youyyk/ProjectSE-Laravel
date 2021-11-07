<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\BillResource;
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
        return BillResource::collection($bills);
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
        $bill->type = $request->input('type');
        $bill->status = $request->input('status');
        $bill->paid = $request->input('paid');
        $bill->save();

        $menus = trim($request->input('menus_id'));
        $this->updateBillMenu($bill, $menus);

        return new BillResource($bill);
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
     * @param  \App\Models\Bill  $bill
     * @return \Illuminate\Http\Response
     */
    public function show(Bill $bill)
    {
        return new BillResource($bill);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Bill  $bill
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bill $bill)
    {
        $bill->restable_id = $request->input('restable_id');
        $bill->user_id = $request->input('user_id');
        $bill->total = $request->input('total');
        $bill->type = $request->input('type');
        $bill->status = $request->input('status');
        $bill->paid = $request->input('paid');
        $bill->save();

        $menus = trim($request->input('menus_id'));
        $this->updateBillMenu($bill, $menus);

        return new BillResource($bill);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bill  $bill
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bill $bill)
    {
        //
    }
}
