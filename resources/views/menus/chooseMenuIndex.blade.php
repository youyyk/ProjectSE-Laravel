@extends('welcome')
<style>
    .sidebar {
        margin: 0;
        padding: 0;
        width: 200px;
        background-color: #f1f1f1;
        position: fixed;
        height: 100%;
        overflow: auto;
    }
    .sidebar p {
        display: block;
        color: black;
        padding: 15px;
        text-decoration: none;
        background-color: lightgray;
    }

    div.content {
        margin-left: 200px;
        padding: 1px 16px;
        height: 1000px;
    }
    @media screen and (max-width: 700px) {
        .sidebar {
            width: 100%;
            height: auto;
            position: relative;
        }
        .sidebar a {float: left;}
        div.content {margin-left: 0;}
    }

    @media screen and (max-width: 400px) {
        .sidebar a {
            text-align: center;
            float: none;
        }
    }
</style>
@section('content')

    <div class="sidebar">
        <h4 style="margin-left: 16px; margin-top: 10px">รายการอาหาร</h4>
        <p>ชื่อเมนู x จำนวน</p>
        <p>ชื่อเมนู x จำนวน</p>
    </div>

    <div class="content">
        <div class="row container-fluid">
            {{$menus->links()}}  <!-- Set in boot Laravel -->
            @foreach($menus as $menu)
                <div class="col-sm-2 mb-4"> <!-- Size Card -->
                    <div class="card">
                        <img class="card-img-top"
                             src="https://shadow.elemecdn.com/app/element/hamburger.9cf7b091-55e9-11e9-a976-7f4d0b07eef6.png" alt="Card image cap">
                        <div class="card-body">
                            <table>
                                <tbody>
                                <h4 class="card-title text-dark">{{$menu->name}}</h4>
                                <p class="card-text">Price : {{$menu->price}} ฿</p>
                                <p class="card-text">Cooking Time : {{$menu->processTime}} minutes</p>
                                <p class="card-text"># {{$menu->category}}</p>
{{--                                <a href="{{route('menus.edit',['menu'=>$menu->id])}}" class="btn btn-primary float-end">edit</a>--}}
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection

