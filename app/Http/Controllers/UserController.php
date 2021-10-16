<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::get();
        return view('users.index',[
            'users' => $users,
            'search_name' => '',
        ]);
    }

    public function searchCard(Request $request)
    {
        if ($request->search ==""){
            $users = User::latest('updated_at')->get();
        }

        else $users = User::where('name','LIKE',"%".$request->search."%")->latest('updated_at')->get();

        return view('users.index',[
            'users' => $users,
            'search_name' => $request->search,
        ]);
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => [
                Rule::unique('users')->ignore($id),
                // unique ไม่ซ้ำกับในตาราง ยกเว้น id นี้ที่กำลังแก้ไข
                // Rule ต้อง use Illuminate\Validation\Rule;
            ],
//            'email' => [
//                Rule::unique('users')->ignore($id),
//                // unique ไม่ซ้ำกับในตาราง ยกเว้น id นี้ที่กำลังแก้ไข
//                // Rule ต้อง use Illuminate\Validation\Rule;
//            ],
        ])->validate();

        $user = User::findOrFail($id);
        $user->name = $request->input('name');
//        $user->email = $request->input('email');
        $user->type = $request->input('type');
        if ($request->has('image')){
            $imageFile = $request->file('image');
            $path = $imageFile->storeAs('public/images',$imageFile->getClientOriginalName());
            $user->path = $path;
        }

        $user->save();

        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('users.index');
    }
}
