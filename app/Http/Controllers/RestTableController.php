<?php

namespace App\Http\Controllers;

use App\Models\Restable;
use Illuminate\Http\Request;

class RestTableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $resTables = Restable::get();
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $resTable = new resTable();

        $resTable->save();

        return redirect()->route('resTables.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $resTable = Menu::findOrFail($id);
        return view('resTables.show',['resTable' => $resTable]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $resTable = Restable::findOrFail($id);
        return view('resTables.edit',[
            'resTable' => $resTable
        ]);
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
        $resTable = resTable::findOrFail($id);
        $resTable->status = $request->input('status');

        $resTable->save();

        return redirect()->route('resTables.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $resTable = resTable::findOrFail($id);
        $resTable->delete();

        return redirect()->route('resTables.index');
    }

    // Not default method
    public function getInfoTableById($id){
        $resTable = resTable::findOrFail($id);
        return $resTable;
    }
}
