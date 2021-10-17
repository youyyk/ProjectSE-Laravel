@extends('welcome')
<style>
    .card:hover {
        cursor: pointer;
        box-shadow: 0 3px 6px rgba(0,0,0,0.16), 0 3px 6px rgba(0,0,0,0.23);
        z-index:1000
    }
</style>
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
        </h1>
        {{-- Create Menu --}}
        @include('menus.menu_component.createPopUp')
        <hr>
        {{-- filter  --}}
        @include('menus.menu_component.filterMenu',['menus'=>$menus,'filterMenu'=>$filterMenu,'user_role'=>'admin'])

        {{-- ----------------------------------------Menu Card----------------------------------------- --}}
        <div class="row container-fluid">
            @foreach($menus as $menu)
                <div class="col-sm-2 mb-3">
                    <div class="card">
                        <img class="card-img-top"
                             style="height: 250px"
                             src="{{url(\Str::replace('public/','storage/',$menu->path))}}"
                             alt="{{$menu->name}}">
                        <div class="card-body">
                            <table>
                                <tbody>
                                <h4 class="card-title text-dark">{{$menu->name}}</h4>
                                <p class="card-text">ราคา : {{$menu->price}} ฿</p>
                                <p class="card-text">ระยะเวลาการทำ : {{$menu->processTime}} นาที</p>
                                <p class="card-text">ประเภท : {{$menu->category}}</p>
                                <span class="float-end" style="margin-right: 5px">
                                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editMenuModal{{$menu->id}}">
                                        แก้ไข
                                    </button>
                                    <button class=" btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteMenuModal{{$menu->id}}">
                                        ลบ
                                    </button>
                                </span>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                    {{--                    Edit Menu--}}
                    @include('menus.menu_component.editPopUp',['menu'=>$menu])
                    {{--                    Delete Menu--}}
                    @include('menus.menu_component.deletePopUp',['menu'=>$menu])
            @endforeach
        </div>
    </div>

@endsection

