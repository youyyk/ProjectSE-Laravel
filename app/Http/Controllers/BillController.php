<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\Cart;
use App\Models\Department;
use App\Models\Restable;
use Illuminate\Http\Request;

use App\Http\Requests\BillRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;


class BillController extends Controller
{
    private $resTable_controller;

    public function __construct()
    {
        $this->resTable_controller = new RestTableController();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $bills = Bill::orderBy('created_at', 'desc')->paginate(10);;
        return view('bills.index',[
            'bills' => $bills
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
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
        $validated = $request -> validate([
            'restable_id' => ['required',],
            'user_id' => ['required',],
            'total' => ['required',],
            'menus_id' => ['required',],
        ]);
        $bill = new Bill();
        $bill->restable_id = $request->input('restable_id');
        $bill->user_id = $request->input('user_id');
        $bill->total = $request->input('total');
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
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
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
        $validated = $request -> validate([
            'restable_id' => ['required',],
            'user_id' => ['required',],
            'total' => ['required',],
            'menus_id' => ['required',],
        ]);
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
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $bill = Bill::findOrFail($id);
        $bill->delete();

        return redirect()->route('bills.index');
    }

    // Not default method
    public function indexBackWorker() {
        $department_id = Auth::user()->department_id;
        $department = Department::findOrFail($department_id);
        $bills = Bill::where('status', true)->get();
        return view('bills.backWorker',[
            'bills' => $bills,
            'nameDepartment' => $department->name
        ]);
    }

    public function showAllBills(Restable $resTable) {
        $bills = Bill::whereRestable_id($resTable->id)->wherePaid(1)->get();
        $total_all_bills = Bill::whereRestable_id($resTable->id)->wherePaid(1)->sum('total');
        $bills_finish = $bills->where('status', false)->count();
        return view('bills.showAllBills',[
            'bills' => $bills,
            'resTable' => $resTable,
            'total_all_bills_or_receive' => array('total_all_bills'=>$total_all_bills,'receive'=>0,'exchange'=>0),
            'have_bill' => $bills_finish,
        ]);
    }

    public function cancelMenuInBill(Bill $bill, $menuId) {
        $bill->menus()->detach($menuId);
        if (count($bill->menus) == 0){
            $this->destroy($bill->id); // delete bill when not have menu
        }
        return redirect()->back();
    }

    public function payBills(BillRequest $request, Restable $resTable)
    {
        $bills = Bill::whereRestable_id($resTable->id)->wherePaid(1)->get();
        $total_all_bills = Bill::whereRestable_id($resTable->id)->wherePaid(1)->sum('total');
        $receive = $request->input('receiveMoney');
        $validated = $request->validate([
            'receiveMoney' => ['numeric', "min:{$total_all_bills}"]
        ]);
        foreach ($bills as $bill){
            $bill->paid = 0;
            $bill->save();
        }
        $this->resTable_controller->setToEmpty($resTable->id);
        return view('bills.paid',[
            'id' => $resTable->name,
            'total' => $total_all_bills,
            'receive'=>$receive,
            'exchange'=>$receive-$total_all_bills,
            'paid' => 'all',
        ]);
    }

    public function payBill(BillRequest $request, Bill $bill) {
        $receive = $request->input('receiveMoney');
        $validated = $request->validate([
            'receiveMoney' => ['numeric', "min:{$bill->total}"]
        ]);
        $bill->paid = 0;
        $bill->save();
        return view('bills.paid',[
            'id' => $bill->id,
            'total' => $bill->total,
            'receive'=>$receive,
            'exchange'=>$receive-$bill->total,
            'paid' => 'one',
        ]);
    }

    public function createBill(Cart $cart, $user_id, $type) {
        $restable_id = $cart->restable_id;
        $menus = $cart->menus;
        $total_bill = 0;
        $bill = new Bill();
        $bill->restable_id = $restable_id;
        $bill->user_id = $user_id;
        $bill->type = $type;
        $bill->total = 0;
        $bill->save();
        foreach ($menus as $menu){
            $amount = $menu->pivot->total;
            $bill->menus()->attach($menu->id,array('amount'=>$amount));
            $total_bill += ($menu->price*$amount);
        }
        $bill->total = $total_bill;
        $bill->save();
        $cart->menus()->sync([]); // Clear cart this table
        $this->resTable_controller->setToNotEmpty($restable_id); // Set Table to Not empty
        if($restable_id == 1) {
            return redirect()->route('bill.show.takeaway');
        }
        return redirect()->route('bill.show.table',[
            'resTable' => $restable_id
        ]);
    }

    public function updateStatus(Bill $bill, $menuId) {
        $numMenu = $bill->menus->count();
        $countFinish = 0;
        foreach($bill->menus as $menu){
            if($menu->id == $menuId){
                $status = $menu->pivot->status;
            }
            if($menu->pivot->status == 'finish') $countFinish++;
        }
        if($status == 'notStarted') {
            $bill->menus()->updateExistingPivot($menuId, ['status'=>'inProcess']);
        }
        elseif($status == 'inProcess') {
            $bill->menus()->updateExistingPivot($menuId, ['status'=>'finish']);
            if($numMenu == $countFinish+1){
                $bill->status = false;
                $bill->save();
            }
        }
        return redirect()->back();
    }

    public function showTakeAwayBills() {
        $bills = Bill::whereRestable_id(1)->wherePaid(1)->get();
        return view('bills.takeAway',[
            'bills' => $bills
        ]);
    }
}
