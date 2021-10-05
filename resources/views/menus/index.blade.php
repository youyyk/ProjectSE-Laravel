@extends('welcome')

@section('content')
    <div class="container">
        <button>
            <a href="{{route("menu.choose.index")}}">Go to choose Menu</a>
        </button>

        <table class="table border-2 mt-3">
            <thead>
            <tr>
                <th class="border-2">#</th>
                <th class="border-2">Name</th>
                <th class="border-2">Price</th>
                <th class="border-2">Process Time</th>
                <th class="border-2">Category</th>
                <th class="border-2">Department (Relation)</th>
                <th class="border-2">Bills (Relation)</th>
            </tr>
            </thead>
            <tbody>
            @foreach($menus as $menu)
                <tr>
                    <td class="border-2 p-0.5">{{$menu->id}}</td>
                    <td class="border-2 p-0.5">{{$menu->name}}</td>
                    <td class="border-2 p-0.5">{{$menu->price}}</td>
                    <td class="border-2 p-0.5">{{$menu->processTime}}</td>
                    <td class="border-2 p-0.5">{{$menu->category}}</td>

                    <td class="border-2 p-0.5">{{$menu->department}}</td>
                    <td class="border-2 p-0.5">{{$menu->bills}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
