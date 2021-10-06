@extends('welcome')

@section('content')
    <h1 class="mt-3">
        {{$menu->name}}
        <span class="float-end">
            <a href="{{route("menus.edit",['menu'=>$menu->id])}}">
                <button type="button" class="btn btn-primary">
                     แก้ไข
                </button>
            </a>
        </span>
    </h1>
    <hr>
    {{--    price    --}}
    <div class="mb-3 row">
        <label class="col-sm-2 col-form-label"><b>ราคา</b></label>
        <label class="col-sm-3">
            {{$menu->price}} ฿
        </label>
    </div>
    {{--    Cooking Time    --}}
    <div class="mb-3 row">
        <label class="col-sm-2 col-form-label"><b>ระยะเวลาการทำ</b></label>
        <label class="col-sm-3">
            {{$menu->processTime}} นาที
        </label>
    </div>
    {{--    Category    --}}
    <div class="mb-3 form-group row">
        {{--  Dropdown later  --}}
        <label class="col-sm-2 col-form-label" ><b>ประเภท</b></label>
        <label class="col-sm-3">
            {{$menu->category}}
        </label>
    </div>
    {{--    Department's ID    --}}
    <div class="mb-5 form-group row">
        {{--  Connect to department's name later  --}}
        <label class="col-sm-2 col-form-label"><b>Department's id</b></label>
        <label class="col-sm-3">
            {{$menu->department_id}}
        </label>
    </div>






@endsection
