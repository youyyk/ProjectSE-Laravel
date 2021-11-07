<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\MenuResource;
use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menus = Menu::get();
        return MenuResource::collection($menus);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $menu = new Menu();
        $menu->name = $request->input('name');
        $menu->price = $request->input('price');
        $menu->processTime = $request->input('processTime');
        $menu->category = $request->input('category');
        $menu->department_id = $request->input('department_id');
        $menu->path = $request->input('path');
        $menu->save();
        return new MenuResource($menu);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function show(Menu $menu)
    {
        return new MenuResource($menu);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Menu $menu)
    {
        $menu->name = $request->input('name'); // ชื่อเมนูห้ามซ้ำ
        $menu->price = $request->input('price');
        $menu->processTime = $request->input('processTime');
        $menu->category = $request->input('category');
        $menu->department_id = $request->input('department_id');
        $menu->path = $request->input("path");
        $menu->save();
        return new MenuResource($menu);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menu $menu)
    {
        // use soft_deleted
    }
}
