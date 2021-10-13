@extends('welcome')
<style>
    .sidebar {
        margin: 0;
        padding: 0;
        width: 250px;
        background-color: #f1f1f1;
        position: fixed;
        height: 100%;
        overflow: auto;
    }
    .sidebar p {
        display: block;
        color: black;
        font-size: large;
        padding: 12px;
        text-decoration: none;
        background-color: lightgray;
    }

    div.content {
        margin-left: 250px;
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
        <h3 style="text-align: center; margin-top: 20px"> โต๊ะ {{$resTable->name}} </h3>
        <h5 style="text-align: center; margin-top: 10px">รายการอาหาร</h5>
        @foreach($cart->menus as $menu)
            <div style="display: flex; justify-content: normal; margin-bottom: 0px;">
                <p style="flex-basis: 50%; margin-bottom: 0px;">{{$menu->name}}</p>
                <p style="flex-basis: 50%; margin-bottom: 0px;">จำนวน: {{$menu->pivot->total}}</p>
            </div>
            <div class="btn-group" role="group" aria-label="Basic example" style="margin-bottom: 10px; width: 100%">
                <a class="btn btn-secondary"
                   href="{{route('cart.value',['action'=>"increase",'cart'=>$cart, 'menuId'=>$menu->id])}}"
                   role="button" style="margin-right: 5px;">+</a>
                <a class="btn btn-secondary"
                   href="{{route('cart.value',['action'=>"decrease",'cart'=>$cart, 'menuId'=>$menu->id])}}"
                   role="button" style="margin-right: 5px;">-</a>
            </div>
        @endforeach
        @if(Auth::check())
        <a href="{{route('bill.create.manual',
                   ['cart'=>$cart,
                    'user_id'=>Auth::user()->id])}}"
           class="btn btn-success" style="width: 100%">ยืนยัน</a>
        <a href="{{route('bill.show.table',
                   ['resTable'=>$resTable])}}"
           class="btn btn-warning" style="width: 100%; margin-top: 10px">บิลทั้งหมด</a>
        @endif
    </div>

    <div class="content">
        <div class="row container-fluid">
            <div style="margin-top: 20px;">
                {{$menus->links()}}
            </div>  <!-- Set in boot Laravel -->
            @foreach($menus as $menu)
                <div class="col-sm-2 mb-3"> <!-- Size Card -->
                    <a href="{{route('cart.add',['cart'=>$cart,'menuId'=>$menu->id])}}"
                       style="color: black; text-decoration: none;">
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
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>

@endsection
