@extends('welcome')

@section('content')
    <h1 class="mb-4 mt-4">เพิ่มเมนู</h1>
    <form action="{{ route('menus.store') }}" method="POST">
        @csrf
        {{--   Menu's Name   --}}
        <div class="mb-3 form-group row">
            <label class="col-sm-2 col-form-label">ชื่อเมนู</label>
            <div class="col-sm-3">
                <input name="name" type="text" value="{{ old('name') }}"
                       class="form-control @error('name') border border-red-600 rounded @enderror">
                @error('name') {{-- การแสดงการกรอกข้อมูลผิดพลาด --}}
                <p class="text-red-600">
                    {{ $message }}
                </p>
                @enderror
            </div>
        </div>
        {{--    Menu's Price    --}}
        <div class="mb-3 form-group row">
            <label class="col-sm-2 col-form-label">ราคา</label>
            <div class="col-sm-3">
                <input name="price" type="number" value="{{ old('price') }}"
                       placeholder="- - - - - - -  baht  - - - - - - -"
                       class="form-control text-center  @error('price') border border-red-600 rounded @enderror" >
                @error('price') {{-- การแสดงการกรอกข้อมูลผิดพลาด --}}
                <p class="text-red-600">
                    {{ $message }}
                </p>
                @enderror
            </div>
        </div>
        {{--    Cooking Time    --}}
        <div class="mb-3 form-group row">
            <label class="col-sm-2 col-form-label">ระยะเวลาการทำ</label>
            <div class="col-sm-3">
                <input name="processTime" type="number" value="{{ old('processTime') }}"
                       class="form-control @error('processTime') border border-red-600 rounded @enderror">
                @error('processTime') {{-- การแสดงการกรอกข้อมูลผิดพลาด --}}
                <p class="text-red-600">
                    {{ $message }}
                </p>
                @enderror
            </div>
        </div>
        {{--    Category    --}}
        <div class="mb-3 form-group row">
            {{--  Dropdown later  --}}
            <label class="col-sm-2 col-form-label" >ประเภท</label>
            <div class="col-sm-3">
                <input name="category" type="text" value="{{ old('category') }}"
                       class="form-control text-center  @error('category') border border-red-600 rounded @enderror"
                       placeholder="e.g. Dessert and Dish">
                @error('category') {{-- การแสดงการกรอกข้อมูลผิดพลาด --}}
                <p class="text-red-600">
                    {{ $message }}
                </p>
                @enderror
            </div>
        </div>
        {{--    Department's ID    --}}
        <div class="mb-5 form-group row">
            {{--  Connect to department's name later  --}}
            <label class="col-sm-2 col-form-label">Department's id</label>
            <div class="col-sm-3">
                <input name="department_id" type="number"
                       class="form-control @error('department_id') border border-red-600 rounded @enderror">
                @error('department_id') {{-- การแสดงการกรอกข้อมูลผิดพลาด --}}
                <p class="text-red-600">
                    {{ $message }}
                </p>
                @enderror
            </div>
        </div>

        <div>
            <button type="submit" class="btn btn-primary">
                + Add Menu
            </button>
        </div>
    </form>






@endsection
