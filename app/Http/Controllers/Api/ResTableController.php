<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\CartController;
use App\Http\Controllers\Controller;
use App\Http\Resources\ResTableResource;
use App\Models\Restable;
use Illuminate\Http\Request;

class ResTableController extends Controller
{
    private $cart_controller;

    public function __construct()
    {
        $this->cart_controller = new CartController();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menus = Restable::get();
        return ResTableResource::collection($menus);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $resTable = new resTable();
        $resTable->name = $request->input('name');
        $resTable->status = 1;
        $resTable->save();
        $this->cart_controller->create($resTable->id);

        return new ResTableResource($resTable);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Restable  $restable
     * @return \Illuminate\Http\Response
     */
    public function show(Restable $resTable)
    {
        return new ResTableResource($resTable);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Restable  $restable
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Restable $resTable)
    {
        $resTable->name = $request->input('name');
        $resTable->status = $request->input('status');
        $resTable->save();
        return new ResTableResource($resTable);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Restable  $restable
     * @return \Illuminate\Http\Response
     */
    public function destroy(Restable $restable)
    {
        //
    }
}
