@extends('welcome')
@inject('menuController', 'App\Http\Controllers\MenuController')
@section('content')

    <div class="container">
        <h1 class="mt-3">
            รายการอาหาร
            <span class="float-end">
            <a>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createMenuModal">
                    + เพิ่มเมนู
                </button>
            </a>
            </span>
            <span class="float-end">
            </span>
        </h1>


    {{-- ----------------------------------------Create Menu----------------------------------------- --}}
    <!-- Modal -->
        <div class="modal fade" id="createMenuModal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" ><b>เพิ่มเมนู</b></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('menus.store') }}" method="POST">
                            @csrf

                            {{--   Menu's Name   --}}
                            <div class="mb-3 form-group row">
                                <label class="col-sm-4 col-form-label">ชื่อเมนู</label>
                                <div class="col-sm-5">
                                    <input name="name" type="text" class="form-control">
                                </div>
                            </div>
                            {{--    Menu's Price    --}}
                            <div class="mb-3 form-group row">
                                <label class="col-sm-4 col-form-label">ราคา</label>
                                <div class="col-sm-5">
                                    <input name="price" type="number" class="form-control text-center" placeholder="- - -  บาท - - -">
                                </div>
                            </div>
                            {{--    Cooking Time    --}}
                            <div class="mb-3 form-group row">
                                <label class="col-sm-4 col-form-label">ระยะเวลาการทำ</label>
                                <div class="col-sm-5">
                                    <input name="processTime" type="number" class="form-control">
                                </div>
                            </div>
                            {{--    Category    --}}
                            <div class="mb-3 form-group row">
                                {{--  Dropdown later  --}}
                                <label class="col-sm-4 col-form-label" >ประเภท</label>
                                <div class="col-sm-5">
{{--                                    <input name="category" type="text" class="form-control text-center" placeholder="e.g. Dessert and Dish">--}}
                                    <select class="w-100 h-100 text-center bg rounded-1" name="category" id="category">
                                        @foreach($categories as $cat)
                                            <option value="{{ $cat->category }}">
                                                {{ $cat->category }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            {{--    Department's ID    --}}
                            <div class="mb-5 form-group row">
                                {{--  Connect to department's name later  --}}
                                <label class="col-sm-4 col-form-label">แผนก</label>
                                <div class="col-sm-5">
{{--                                    <input name="department_id" type="number" class="form-control">--}}
                                    <select class="w-100 h-100 text-center bg rounded-1" name="department_id" id="department_id">
                                        @foreach($departments as $depart)
                                            <option value="{{ $depart->id }}">
                                                {{ $depart->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <a href="{{route("menus.index")}}">
                                <button type="submit" class="btn btn-primary w-100 mt-lg-3">
                                    + เพิ่มเมนู
                                </button>
                            </a>
                        </form>
                    </div>

                </div>
            </div>
        </div>
        <hr>
        {{-- ----------------------------------------filter----------------------------------------- --}}
        <span class="mb-3 float-end">
            <form class="form-inline" >
                <span class="col-1">filter : </span>
                <select class="h-100 text-center bg rounded-1" name="selected_cat" id="selected_cat">
                    <option value="">--เลือกประเภท--</option>
                    @foreach($categories as $cat)
                            <option value="{{ $cat->category }}"}>
                            {{ $cat->category }}
                            </option>
                    @endforeach
                </select>
                <span class="col-sm-1">
                <select class="h-100 text-center bg rounded-1" name="selected_depart" id="selected_depart">
                    <option value="">--เลือกแผนก--</option>
                    @foreach($departments as $depart)
                        <option value="{{ $depart->id }}">
                            {{ $depart->name }}
                        </option>
                    @endforeach
                </select>
            </span>
                <span><input type="text" class="rounded-2 text-center" name="search" id="search" autocomplete="off" placeholder="- - - - ชื่อเมนู - - - -"></span>
                    <button class="btn btn-primary" formaction="{{route('menu.filter')}}">search</button>
                    <button class="btn btn-warning" formaction="{{route('menus.index')}}">clear</button>
            </form>
        </span>


        {{-- ----------------------------------------Menu Card----------------------------------------- --}}
        <div class="row container-fluid">
            @foreach($menus as $menu)
                <div class="col-sm-3 mb-3">
                    <div class="card">
                        <img class="card-img-top" src="https://shadow.elemecdn.com/app/element/hamburger.9cf7b091-55e9-11e9-a976-7f4d0b07eef6.png" alt="Card image cap">
                        <div class="card-body">
                            <table>
                                <tbody>
                                <a href="{{route('menus.show',['menu'=>$menu->id])}}"><h4 class="card-title text-dark">{{$menu->name}}</h4></a>
                                <p class="card-text">ราคา : {{$menu->price}} ฿</p>
                                <p class="card-text">ระยะเวลาการทำ : {{$menu->processTime}} นาที</p>
                                <p class="card-text"># {{$menu->category}}</p>
                                <span class="float-end">
                                        <button class=" btn btn-danger"
                                                data-bs-toggle="modal"
                                                data-bs-target="#deleteMenuModal{{$menu->id}}"
                                        >
                                            ลบ
                                        </button>
                                </span>
                                <span class="float-end">
                                    <button class="btn btn-primary"
                                            data-bs-toggle="modal"
                                            data-bs-target="#editMenuModal{{$menu->id}}"
                                    >
                                        แก้ไข
                                    </button>
                                </span>
                                </tbody>
                            </table>
                            {{-- ----------------------------------------Edit Menu----------------------------------------- --}}
                            <div class="modal fade" id="editMenuModal{{$menu->id}}" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false">
                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable " >
                                    <div class="modal-content " class="w-100">
                                        <div class="modal-header">
                                            <h5 class="modal-title" ><b>แก้ไขเมนู</b></h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('menus.update', ['menu' => $menu->id]) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                {{--   Menu's Name   --}}
                                                <div class="mb-3 form-group row">
                                                    <label class="col-sm-4 col-form-label">ชื่อเมนู</label>
                                                    <div class="col-sm-5">
                                                        <input name="name" type="text" class="form-control text-center" value="{{$menu->name}}">
                                                    </div>
                                                </div>
                                                {{--    Menu's Price    --}}
                                                <div class="mb-3 form-group row">
                                                    <label class="col-sm-4 col-form-label">ราคา</label>
                                                    <div class="col-sm-5">
                                                        <input name="price" type="number" class="form-control text-center" value="{{$menu->price}}">
                                                    </div>
                                                </div>
                                                {{--    Cooking Time    --}}
                                                <div class="mb-3 form-group row">
                                                    <label class="col-sm-4 col-form-label">ระยะเวลาการทำ</label>
                                                    <div class="col-sm-5">
                                                        <input name="processTime" type="number" class="form-control text-center" value="{{$menu->processTime}}">
                                                    </div>
                                                </div>
                                                {{--    Category    --}}
                                                <div class="mb-3 form-group row">
                                                    <label class="col-sm-4 col-form-label" >ประเภท</label>
                                                    <div class="col-sm-5">
                                                        <select class="w-100 h-100 text-center bg rounded-1" name="category" id="category">
                                                            @foreach($categories as $cat)
                                                                <option value="{{ $cat->category }}"
                                                                    {{$menu->category == $cat->category ? "selected" : ""}}
                                                                >
                                                                    {{ $cat->category }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                                {{--Department's ID--}}
                                                <div class="mb-5 form-group row">
                                                    {{--Connect to department's name later--}}
                                                    <label class="col-sm-4 col-form-label">Department's id</label>
                                                    <div class="col-sm-5">
                                                        <select class="w-100 h-100 text-center bg rounded-1" name="department_id" id="department_id">
                                                            @foreach($departments as $depart)
                                                                <option value="{{ $depart->id }}"
                                                                    {{$menu->department_id == $depart->id ? "selected" : ""}}
                                                                >
                                                                    {{ $depart->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div>
                                                    <a href="{{route("menus.index")}}" >
                                                        <button type="submit" class="btn btn-primary w-100 mt-lg-3">
                                                            แก้ไข
                                                        </button>
                                                    </a>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- ----------------------------------------Delete Menu-------------------------------------------}}
                            <div class="modal fade" id="deleteMenuModal{{$menu->id}}" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-body text-center m-3">
                                            <h4>คุณต้องการลบ <b>{{$menu->name}}</b> ใช่หรือไม่?</h4>
                                            <div class="mt-lg-3 row">
                                                <div class="col">
                                                    <form action="{{ route('menus.destroy', ['menu' => $menu->id]) }}" method="POST">
                                                        @method('DELETE')
                                                        @csrf
                                                        <button type="submit" class="btn btn-danger col-lg-5">
                                                            ลบ
                                                        </button>
                                                    </form>
                                                </div>
                                                <div class="col">
                                                    <button type="button" class="btn btn-secondary col-lg-5" data-bs-dismiss="modal">ยกเลิก</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection

