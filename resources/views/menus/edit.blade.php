@extends('welcome')

@section('content')
    <h1 class="mb-4 mt-4">แก้ไขเมนู</h1>
    <form action="{{ route('menus.update', ['menu' => $menu->id]) }}" method="POST">
        @csrf
        @method('PUT')

        {{--   Menu's Name   --}}
        <div class="mb-3 form-group row">
            <label class="col-sm-2 col-form-label">ชื่อเมนู</label>
            <div class="col-sm-3">
                <input name="name" type="text" class="form-control text-center" value="{{$menu->name}}">
            </div>
        </div>
        {{--    Menu's Price    --}}
        <div class="mb-3 form-group row">
            <label class="col-sm-2 col-form-label">ราคา</label>
            <div class="col-sm-3">
                <input name="price" type="number" class="form-control text-center" value="{{$menu->price}}">
            </div>
        </div>
        {{--    Cooking Time    --}}
        <div class="mb-3 form-group row">
            <label class="col-sm-2 col-form-label">ระยะเวลาการทำ</label>
            <div class="col-sm-3">
                <input name="processTime" type="number" class="form-control text-center" value="{{$menu->processTime}}">
            </div>
        </div>
        {{--    Category    --}}
        <div class="mb-3 form-group row">
            {{--  Dropdown later  --}}
            <label class="col-sm-2 col-form-label" >ประเภท</label>
            <div class="col-sm-3">
                <input name="category" type="text" class="form-control text-center" value="{{$menu->category}}">
            </div>
        </div>
        {{--    Department's ID    --}}
        <div class="mb-5 form-group row">
            {{--  Connect to department's name later  --}}
            <label class="col-sm-2 col-form-label">Department's id</label>
            <div class="col-sm-3">
                <input name="department_id" type="number" class="form-control text-center" value="{{$menu->department_id}}">
            </div>
        </div>

        <div>
            <button type="submit" class="btn btn-primary" style="margin-right: 20px">
                แก้ไข
            </button>
        </div>
    </form>

    <form action="{{ route('menus.destroy', ['menu' => $menu->id]) }}" method="POST">
        @method('DELETE')
        @csrf

        <button type="submit" class="mt-2 btn btn-danger">
            ลบ
        </button>
    </form>






@endsection
