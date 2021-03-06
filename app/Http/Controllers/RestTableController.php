<?php

namespace App\Http\Controllers;

use App\Http\Requests\RestableRequest;
use App\Models\Cart;
use App\Models\Restable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class RestTableController extends Controller
{
    private $cart_controller;

    public function __construct()
    {
        $this->cart_controller = new CartController();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $resTables = restable::get();
        return view('resTables.index',[
            'resTables' => $resTables
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('resTables.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param RestableRequest $request
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(RestableRequest $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => [
                Rule::unique('resTables'), // unique ไม่ซ้ำกับในตาราง
                // Rule ต้อง use Illuminate\Validation\Rule;
            ],
        ])->validate();

        $resTable = new resTable();
        $resTable->name = $request->input('name');
        $resTable->save();
        $this->cart_controller->create($resTable->id);

        return redirect()->route('showAllResTable');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $resTable = resTable::findOrFail($id);
        return view('resTables.show',['resTable' => $resTable]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit($id)
    {
//        $resTable = restable::findOrFail($id);
//        return view('resTables.edit',[
//            'resTable' => $resTable
//        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RestableRequest $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => [
                Rule::unique('resTables')->ignore($id),
                // unique ไม่ซ้ำกับในตาราง ยกเว้น id นี้ที่กำลังแก้ไข
                // Rule ต้อง use Illuminate\Validation\Rule;
            ],
        ])->validate();

        $resTable = resTable::findOrFail($id);
        $resTable->name = $request->input('name');
        $resTable->save();

        return redirect()->route('showAllResTable');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if($id != 1) {
            $resTable = resTable::findOrFail($id);
            $resTable->delete();
        }

        return redirect()->route('showAllResTable');
    }

    // Not default method
    public function getInfoTableById($id){
        $resTable = resTable::findOrFail($id);
        return $resTable;
    }

    public function setToEmpty($id){
        $resTable = resTable::findOrFail($id);
        $resTable->status = 1;
        $resTable->save();
    }

    public function setToNotEmpty($id){
        $resTable = resTable::findOrFail($id);
        $resTable->status = 0;
        $resTable->save();
    }

    public function showAllResTable() {
        $resTables = restable::get();
        return view('resTables.adminResTables',[
            'resTables' => $resTables
        ]);
    }

}
