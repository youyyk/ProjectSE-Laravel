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

        <div class="mb-5 form-group row">
            <label class="col-sm-2 col-form-label">รายชื่อเมนู</label>
            <div class="col-sm-3">
                @foreach($department->menus as $menu)
                    {{ $menu->name }}
                    <br>
                @endforeach
            </div>
        </div>

        <div>
            <button type="submit" class="btn btn-primary">
                แก้ไข
            </button>
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
