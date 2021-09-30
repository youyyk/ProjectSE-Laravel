@extends('welcome')

@section('content')
    <h1 class="mb-4 mt-4">แก้ไขเมนู</h1>
    <form>
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
        <a href="{{route("menus.index")}}" >
            <button type="button" class="btn btn-primary" style="margin-right: 20px">
                แก้ไข
            </button>
        </a>

        <a>
            <button type="button" class="btn btn-danger">
                ลบ
            </button>
        </a>
    </form>






@endsection
