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
            <a href="{{route("menu.choose.index")}}">
                <button class="btn btn-primary">
                    Go to choose Menu
                </button>
            </a>
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
                                    <input name="price" type="number" class="form-control text-center" placeholder="- - -  baht - - -">
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
                                    <input name="category" type="text" class="form-control text-center" placeholder="e.g. Dessert and Dish">
                                </div>
                            </div>
                            {{--    Department's ID    --}}
                            <div class="mb-5 form-group row">
                                {{--  Connect to department's name later  --}}
                                <label class="col-sm-4 col-form-label">Department's id</label>
                                <div class="col-sm-5">
                                    <input name="department_id" type="number" class="form-control">
                                </div>
                            </div>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <a href="{{route("menus.index")}}">
                                <button type="submit" class="btn btn-primary">
                                    + Add Menu
                                </button>
                            </a>
                        </form>
                    </div>

                </div>
            </div>
        </div>


        {{-- ----------------------------------------Menu Card----------------------------------------- --}}
        <hr>
        <div class="row">
            @foreach($menus as $menu)
                <div class="col-sm-3 mb-4">
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
                                    <a data-bs-toggle="modal" data-bs-target="#deleteMenuModal">
                                        <button class=" btn btn-danger">
                                            ลบ
                                        </button>
                                    </a>
                                </span>
                                <span class="float-end">
                                    <a data-bs-toggle="modal" data-bs-target="#editMenuModal">
                                    <button class=" btn btn-primary">
                                        แก้ไข
                                    </button>
                                    </a>
                                </span>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            @endforeach
        </div>
    </div>

    {{-- ----------------------------------------Edit Menu----------------------------------------- --}}
    <div class="modal fade" id="editMenuModal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
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
                            {{--  Dropdown later  --}}
                            <label class="col-sm-4 col-form-label" >ประเภท</label>
                            <div class="col-sm-5">
                                <input name="category" type="text" class="form-control text-center" value="{{$menu->category}}">
                            </div>
                        </div>
                        {{--    Department's ID    --}}
                        <div class="mb-5 form-group row">
                            {{--  Connect to department's name later  --}}
                            <label class="col-sm-4 col-form-label">Department's id</label>
                            <div class="col-sm-5">
                                <input name="department_id" type="number" class="form-control text-center" value="{{$menu->department_id}}">
                            </div>
                        </div>
                        <div>
                            <a href="{{route("menus.index")}}" >
                                <button type="submit" class="btn btn-primary w-100">
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
    <div class="modal fade" id="deleteMenuModal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body text-center m-3">
                    <h4>คุณต้องการลบ <b>ชื่อเมนู</b> ใช่หรือไม่?</h4>
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


@endsection
