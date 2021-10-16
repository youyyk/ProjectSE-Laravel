@extends('welcome')

@section('content')
    <h1 class="mb-4 mt-4">แก้ไขโต๊ะ</h1>

    <form action="{{ route('resTables.update', ['resTable' => $resTable->id]) }}" method="POST">
        @csrf
        @method('PUT')

        {{--    resTable's name    --}}
        <div class="mb-3 form-group row">
            <label class="col-sm-2 col-form-label">ชื่อโต๊ะ</label>
            <div class="col-sm-3">
                <input name="name" type="text" class="form-control text-center" value="{{ $resTable->name }}">
            </div>
        </div>
{{--            resTable's status    --}}
{{--        <div class="mb-3 form-group row">--}}
{{--            <label class="col-sm-2 col-form-label">สถานะ</label>--}}
{{--            <div class="col-sm-2">--}}
{{--                <input name="status" type="text" class="form-control text-center" value="{{$resTable->status}}">--}}
{{--            </div>--}}
{{--        </div>--}}
                <button type="submit" class="btn btn-primary">
                    แก้ไข
                </button>
    </form>


    <form action="{{ route('resTables.destroy', ['resTable' => $resTable->id]) }}" method="POST">
        @method('DELETE')
        @csrf

        <button type="submit" class="mt-2 btn btn-danger">
            ลบ
        </button>
    </form>

@endsection
