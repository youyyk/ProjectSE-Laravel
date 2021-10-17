@extends('welcome')
@inject('menuController', 'App\Http\Controllers\MenuController')
@section('content')

    <div class="m-5">
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
        {{-- Create Menu --}}
        @include('menus.menu_component.createPopUp')

        {{-- filter  --}}

        @include('menus.menu_component.filterMenu',['menus'=>$menus,'filterMenu'=>$filterMenu,'user_role'=>'admin'])



        {{-- ----------------------------------------Menu Card----------------------------------------- --}}
        <div class="row container-fluid">
            @foreach($menus as $menu)
                <div class="col-sm-2 mb-3">
                    <div class="card">
                        <img class="card-img-top m-3" style="width: 250px;height: 250px" src="{{url(\Str::replace('public/','storage/',$menu->path))}}" alt="{{$menu->name}}">
                        <div class="card-body">
                            <table>
                                <tbody>
                                <h4 class="card-title text-dark">{{$menu->name}}</h4>
                                <p class="card-text">ราคา : {{$menu->price}} ฿</p>
                                <p class="card-text">ระยะเวลาการทำ : {{$menu->processTime}} นาที</p>
                                <p class="card-text">ประเภท : {{$menu->category}}</p>
                                <span class="float-end">
                                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editMenuModal{{$menu->id}}">
                                        แก้ไข
                                    </button>
                                    <button class=" btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteMenuModal{{$menu->id}}">
                                        ลบ
                                    </button>
                                </span>
                                </tbody>
                            </table>

                            {{-- Edit Menu --}}
                            @include('menus.menu_component.editPopUp',['menu'=>$menu])

                            {{-- Delete Menu --}}
                            @include('menus.menu_component.deletePopUp',['menu'=>$menu])

                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection

