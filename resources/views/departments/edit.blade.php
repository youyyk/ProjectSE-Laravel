@extends('welcome')

@section('content')
    <h1 class="mb-4 mt-4">แก้ไขแผนก</h1>
    <form>
        {{--    Department's name    --}}
        <div class="mb-3 form-group row">
            <label class="col-sm-2 col-form-label" >ชื่อแผนก</label>
            <div class="col-sm-3">
                <input name="name" type="text" class="form-control text-center">
            </div>
        </div>
        {{--    Menu's Name    --}}
        <div class="mb-5 form-group row">
            <label class="col-sm-2 col-form-label">รายชื่อเมนู</label>
            <div class="col-sm-3">
                <input type="text" class="form-control text-center">
            </div>
        </div>
        <a href="{{route("departments.index")}}" >
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
