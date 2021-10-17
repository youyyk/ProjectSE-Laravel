<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

use App\Http\Requests\DepartmentRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $departments = Department::get();
        return view('departments.index',[
            'departments' => $departments
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('departments.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  DepartmentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DepartmentRequest $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => [
                Rule::unique('departments'),
            ],
        ])->validate();
        $department = new Department();
        $department->name = $request->input('name');

        $department->save();

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $department = Department::findOrFail($id);
        return view('departments.show',[
            'department' => $department
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $department = Department::findOrFail($id);
        return view('departments.edit',[
            'department' => $department
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  DepartmentRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DepartmentRequest $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => [
                Rule::unique('departments')->ignore($id),
            ],
        ])->validate();
        $department = Department::findOrFail($id);
        $department->name = $request->input('name');

        $department->save();

        return redirect()->route('departments.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $department = Department::findOrFail($id);
        foreach ($department->menus as $menu){
            $menu->department_id = 1;
            $menu->save();
        }
        $department->delete();

        return redirect()->route('departments.index');
    }
}
