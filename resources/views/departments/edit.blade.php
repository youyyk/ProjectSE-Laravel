@extends('welcome')

@section('content')
    <h1 class="mb-4 mt-4">แก้ไขแผนก</h1>
    <form action="{{ route('departments.update', ['department' => $department->id]) }}" method="POST">
        @csrf
        @method('PUT')
        {{--    Department's name    --}}
        <div class="mb-3 form-group row">
            <label class="col-sm-2 col-form-label">ชื่อแผนก</label>
            <div class="col-sm-3">
                <input name="name" type="text" class="form-control text-center" value="{{ $department->name }}">
            </div>
        </div>
    </form>

    <form action="">
        @csrf
        @method('PUT')
        {{--    Menu's Name    --}}
        <div class="mb-5 form-group row">
            <label class="col-sm-2 col-form-label">รายชื่อเมนู</label>
                <div class="col-sm-3">
                    @foreach($department->menus as $menu)
{{--                        <input type="text" class="form-control text-center mb-lg-3" value="{{ $menu->name }}">--}}
                         {{ $menu->name }}
{{--                        <button type="submit" class="m-lg-2 btn btn-danger">--}}
{{--                            ลบ--}}
{{--                        </button>--}}
                        <br>
                    @endforeach
                </div>
        </div>
    </form>


    <form action="{{ route('departments.destroy', ['department' => $department->id]) }}" method="POST">
        @method('DELETE')
        @csrf

        <button type="submit" class="mt-2 btn btn-danger">
            ลบ
        </button>
    </form>

@endsection
