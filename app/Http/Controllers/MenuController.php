<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use Phattarachai\LineNotify\Facade\Line;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $menus = Menu::latest('updated_at')->get();
        return view('menus.index',[
            'menus' => $menus
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('menus.create');
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
            'name' => ['required',], 
            'price' => ['required',],
            'processTime' => ['required',],
            'category' => ['required',],
            'department_id'=> ['required',],
        ]);
        $menu = new Menu();
        $menu->name = $request->input('name'); // ชื่อเมนูห้ามซ้ำ
        $menu->price = $request->input('price');
        $menu->processTime = $request->input('processTime');
        $menu->category = $request->input('category');
        $menu->department_id = $request->input('department_id');

        $menu->save();

        return redirect()->route('menus.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $menu = Menu::findOrFail($id);
        return view('menus.show',['menu' => $menu]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $menu = Menu::findOrFail($id);
        return view('menus.edit',['menu' => $menu]);
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
            'name' => ['required',], 
            'price' => ['required',],
            'processTime' => ['required',],
            'category' => ['required',],
            'department_id'=> ['required',],
        ]);
        $menu = Menu::findOrFail($id);
        $menu->name = $request->input('name'); // ชื่อเมนูห้ามซ้ำ
        $menu->price = $request->input('price');
        $menu->processTime = $request->input('processTime');
        $menu->category = $request->input('category');
        $menu->department_id = $request->input('department_id');

        $menu->save();

        return redirect()->route('menus.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $menu = Menu::findOrFail($id);
        $menu->delete();

        return redirect()->route('menus.index');
    }

    // Not default method
    public function chooseMenuIndex()
    {
        $menus = Menu::paginate(12);
        Line::send("Test");
        return view('menus.chooseMenuIndex',[
            'menus' => $menus
        ]);
    }
}
