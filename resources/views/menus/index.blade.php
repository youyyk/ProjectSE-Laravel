@extends('welcome')

@section('content')
    <h1 class="mt-3">
        รายการอาหาร
        <span class="float-end">
            <a href="{{route("menus.create")}}">
                <button type="button" class="btn btn-primary">
                    + เพิ่มเมนู
                </button>
            </a>
        </span>
    </h1>
    <hr>
{{--    <table class="table border-2 mt-3">--}}
{{--        <thead>--}}
{{--        <tr>--}}
{{--            <th class="border-2">#</th>--}}
{{--            <th class="border-2">Name</th>--}}
{{--            <th class="border-2">Price</th>--}}
{{--            <th class="border-2">Process Time</th>--}}
{{--            <th class="border-2">Category</th>--}}
{{--            <th class="border-2">Department (Relation)</th>--}}
{{--            <th class="border-2">Bills (Relation)</th>--}}
{{--        </tr>--}}
{{--        </thead>--}}
{{--        <tbody>--}}
{{--        @foreach($menus as $menu)--}}
{{--            <tr>--}}
{{--                <td class="border-2 p-0.5">{{$menu->id}}</td>--}}
{{--                <td class="border-2 p-0.5">--}}
{{--                    <a href="{{route('menus.show',['menu'=>$menu->id])}}" class="text-info">--}}
{{--                        {{$menu->name}}--}}
{{--                    </a>--}}
{{--                </td>--}}
{{--                <td class="border-2 p-0.5">{{$menu->price}}</td>--}}
{{--                <td class="border-2 p-0.5">{{$menu->processTime}}</td>--}}
{{--                <td class="border-2 p-0.5">{{$menu->category}}</td>--}}

{{--                <td class="border-2 p-0.5">{{$menu->department->name}}</td>--}}
{{--                <td class="border-2 p-0.5">--}}
{{--                    @foreach($menu->bills as $bill)--}}
{{--                    <div>--}}
{{--                        {{ $bill->id }}--}}
{{--                    </div>--}}
{{--                    @endforeach--}}
{{--                </td>--}}
{{--            </tr>--}}
{{--        @endforeach--}}
{{--        </tbody>--}}
{{--    </table>--}}


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
                            <a href="{{route('menus.edit',['menu'=>$menu->id])}}" class="btn btn-primary float-end">แก้ไข</a>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        @endforeach
    </div>



@endsection
