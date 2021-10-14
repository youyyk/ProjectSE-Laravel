<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Menu;
use Illuminate\Http\Request;
class MenuController extends Controller
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
        $menus = Menu::latest('updated_at')->get();
        $categories = Menu::get()->unique('category');
        $departments = Department::get();
        $filterMenu=array('search_name' => '', 'select_c' =>'เลือกประเภท', 'select_d' => 0);
        return view('menus.index',[
            'menus' => $menus,
            'categories'=>$categories,
            'departments'=>$departments,
            'filterMenu' => $filterMenu
        ]);
    }
    public function filterCard(Request $request)
    {
        if ($request->selected_cat =="" & $request->selected_depart =="" & $request->search ==""){
            $menus = Menu::latest('updated_at')->get();
        }
        else if ($request->selected_cat !="" & $request->selected_depart =="" & $request->search ==""){
            $menus = Menu::whereCategory($request->selected_cat)->latest('updated_at')->get();
        }
        else if ($request->selected_cat =="" & $request->selected_depart !="" & $request->search ==""){
            $menus = Menu::whereDepartment_id($request->selected_depart)->latest('updated_at')->get();
        }
        else if ($request->selected_cat =="" & $request->selected_depart =="" & $request->search !=""){
            $menus = Menu::where('name','LIKE',"%".$request->search."%")->latest('updated_at')->get();
        }
        else if ($request->selected_cat !="" & $request->selected_depart !="" & $request->search ==""){
            $menus = Menu::whereCategory($request->selected_cat)->whereDepartment_id($request->selected_depart)->latest('updated_at')->get();
        }
        else if ($request->selected_cat =="" & $request->selected_depart !="" & $request->search !=""){
            $menus = Menu::where('name','LIKE',"%".$request->search."%")->whereDepartment_id($request->selected_depart)->latest('updated_at')->get();
        }
        else if ($request->selected_cat !="" & $request->selected_depart =="" & $request->search !=""){
            $menus = Menu::where('name','LIKE',"%".$request->search."%")->whereCategory($request->selected_cat)->latest('updated_at')->get();
        }
        else{
            $menus = Menu::where('name','LIKE',"%".$request->search."%")->whereCategory($request->selected_cat)
                ->whereDepartment_id($request->selected_depart)->latest('updated_at')->get();
        }
        return $menus;

    }
    public function filterAdmin(Request $request){
        $menus = $this->filterCard($request);
        $categories = Menu::get()->unique('category');
        $departments = Department::get();
        $filterMenu=array('search_name' => $request->search, 'select_c' =>$request->selected_cat, 'select_d' => $request->selected_depart);
        return view('menus.index',[
            'menus' => $menus,
            'categories'=>$categories,
            'departments'=>$departments,
            'filterMenu' => $filterMenu
        ]);
    }
    public function filterFrontWorker(Request $request,$tableId){
        $resTable = $this->resTable_controller->getInfoTableById($tableId);
        $menus = $this->filterCard($request);
        $categories = Menu::get()->unique('category');
        $departments = Department::get();
        $filterMenu=array('search_name' => $request->search, 'select_c' =>$request->selected_cat, 'select_d' => $request->selected_depart);
        return view('menus.chooseMenuIndex',[
            'menus' => $menus,
            'categories'=>$categories,
            'departments'=>$departments,
            'search_name' => $request->search,
            'select_c' =>$request->selected_cat,
            'select_d' =>$request->selected_depart,
            'resTable' => $resTable,
            'cart' => $resTable->cart,
            'filterMenu' => $filterMenu
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        return view('menus.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $menu = new Menu();
        $menu->name = $request->input('name'); // ชื่อเมนูห้ามซ้ำ
        $menu->price = $request->input('price');
        $menu->processTime = $request->input('processTime');
        $menu->category = $request->input('category');
        $menu->department_id = $request->input('department_id');
        if ($request->has('image')){
            $imageFile = $request->file('image');
            $path = $imageFile->storeAs('public/images',$imageFile->getClientOriginalName());
            $menu->path = $path;
        }

        $menu->save();

        return redirect()->route('menus.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
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
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
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
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $menu = Menu::findOrFail($id);
        $menu->name = $request->input('name'); // ชื่อเมนูห้ามซ้ำ
        $menu->price = $request->input('price');
        $menu->processTime = $request->input('processTime');
        $menu->category = $request->input('category');
        $menu->department_id = $request->input('department_id');
        if ($request->has('image')){
            $imageFile = $request->file('image');
            $path = $imageFile->storeAs('public/images',$imageFile->getClientOriginalName());
            $menu->path = $path;
        }

        $menu->save();

        return redirect()->route('menus.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $menu = Menu::findOrFail($id);
        $menu->delete();

        return redirect()->route('menus.index');
    }

    // Not default method
    public function chooseMenuIndex($tableId)
    {
        $resTable = $this->resTable_controller->getInfoTableById($tableId);
        $menus = Menu::latest('updated_at')->get();
        $categories = Menu::get()->unique('category');
        $departments = Department::get();
        $filterMenu=array('search_name' => '', 'select_c' =>'เลือกประเภท', 'select_d' => 0);
        return view('menus.chooseMenuIndex',[
            'menus' => $menus,
            'resTable' => $resTable,
            'cart' => $resTable->cart,
            'categories'=>$categories,
            'departments'=>$departments,
            'filterMenu' => $filterMenu
        ]);
    }

    public function getInfoMenuById($id){
        $menu = Menu::findOrFail($id);
        return $menu;
    }
}
