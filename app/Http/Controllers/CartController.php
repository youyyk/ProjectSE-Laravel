<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Menu;
use App\Models\Restable;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function __construct()
    {
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
    public function create($tableId)
    {
        $this->store($tableId);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($tableId)
    {
        $cart = new Cart();
        $cart->restable_id = $tableId;
        $cart->save();
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
        $same = $cart->menus()->syncWithoutDetaching($menuId); // Not attach if attached
        if ($same["attached"]==[]){ // mean this round not have new menu
            $oldTotal = $this->findTotalMenuInCart($cart, $menuId);
            $cart->menus()->updateExistingPivot($menuId, ['total'=> ++$oldTotal]);
        }
        return redirect()->back();
    }

    public function addMenuTotal($action, Cart $cart, $menuId)
    {
        $new_total = $this->findTotalMenuInCart($cart, $menuId);
        if ($action == "increase"){
            $new_total++;
        }
        else if ($action == "decrease"){
            if (--$new_total<=0){$cart->menus()->detach($menuId);}
        }
        $cart->menus()->updateExistingPivot($menuId, ['total'=>$new_total]);
        return redirect()->back();
    }

    public function findTotalMenuInCart(Cart $cart, $menuId){
        foreach($cart->menus as $menu){
            if($menu->id == $menuId){
                return $menu->pivot->total;
            }
        }
        return null;
    }
}
