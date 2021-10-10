@extends('welcome')

@section('content')
    <h1 class="mb-4 mt-4">เปลี่ยน Status</h1>
    <form action="{{ route('resTables.update', ['resTable' => $resTable->id]) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3 form-group row">
            <label class="col-sm-2 col-form-label">Status</label>
            <div class="col-sm-2">
                <input name="status" type="text" class="form-control text-center @error('status') border border-danger @enderror" value="{{$resTable->status}}">
            </div>
            <div class = "col-sm-3">
                @error('status')
                    <p class = "text-danger">{{$message}}</p>
                @enderror
            </div>
        </div>

        <button type="submit" class="btn btn-primary">
            เปลี่ยน status
        </button>
    </form>

@endsection
