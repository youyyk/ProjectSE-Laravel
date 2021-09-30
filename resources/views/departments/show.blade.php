@extends('welcome')

@section('content')
    <h1 class="mt-3">
        {{$department->name}}
        <span class="float-end">
            <a href="{{route("departments.edit",['department'=>$department->id])}}">
                <button type="button" class="btn btn-primary">
                    แก้ไข
                </button>
            </a>
        </span>
    </h1>
    <hr>
    <h4>รายชื่อเมนู</h4>
    @foreach($department->menus as $menu)
        <li>
            {{ $menu->name }}
        </li>
    @endforeach



@endsection
