<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Menu;
use Illuminate\Http\Request;

class CartController extends Controller
{
    private $menu_controller;
    private $resTable_controller;

    public function __construct()
    {
        $this->menu_controller = new MenuController();
        $this->resTable_controller = new RestTableController();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $carts = Cart::get();
        return $carts;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cart $cart)
    {
        //
    }

    // Not default method
    public function addMenu(Cart $cart, $menuId)
    {
        $cart->menus()->syncWithoutDetaching($menuId); // Not attach if attached
        return $this->menu_controller->chooseMenuIndex($cart->restable_id);
    }

    public function addMenuTotal($action, Cart $cart, $menuId)
    {
        $new_total=0;
        foreach($cart->menus as $menu){
            if($menu->id == $menuId){
                $new_total = $menu->pivot->total;
                break;
            }
        }
        if ($action == "increase"){
            $new_total++;
        }
        else if ($action == "decrease"){
            if (--$new_total<=0){$cart->menus()->detach($menuId);}
        }
        $cart->menus()->updateExistingPivot($menuId, ['total'=>$new_total]);
        return $this->menu_controller->chooseMenuIndex($cart->restable_id);
    }
}
