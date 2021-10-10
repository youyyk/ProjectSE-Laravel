@extends('welcome')


@section('content')
    <h1 class="mb-4 mt-4">แก้ไขบิล #</h1>
    <form action="{{ route('bills.update', ['bill' => $bill->id]) }}" method="POST">
        @csrf
        @method('PUT')

        {{--    Table's ID    --}}
        <div class="mb-3 form-group row">
            <label class="col-sm-2 col-form-label">เลขโต๊ะ</label>
            <div class="col-sm-2">
                <input name="restable_id" type="number" class="form-control text-center @error('restable_id') border border-danger @enderror" value="{{ $bill->restable_id }}">
            </div>
            <div class = "col-sm-3">
                @error('restable_id')
                    <p class = "text-danger">{{$message}}</p>
                @enderror
            </div>
        </div>
        {{--    Menu's Nmae    --}}
        <div class="mb-3 form-group row">
            <label class="col-sm-2 col-form-label">รายการอาหาร</label>
            <div class="col-sm-2">
                <input name="menus_id" type="text" class="form-control text-center @error('menus_id') border border-danger @enderror" value="{{ $bill->menus_id }}">
            </div>
            <div class = "col-sm-3">
                @error('menus_id')
                    <p class = "text-danger">{{$message}}</p>
                @enderror
            </div>
        </div>
        {{--    User's ID    --}}
        <div class="mb-3 form-group row">
            <label class="col-sm-2 col-form-label">User's ID</label>
            <div class="col-sm-2">
                <input name="user_id" type="number" class="form-control text-center @error('user_id') border border-danger @enderror" value="{{ $bill->user_id }}">
            </div>
            <div class = "col-sm-3">
                @error('user_id')
                    <p class = "text-danger">{{$message}}</p>
                @enderror
            </div>
        </div>
        {{--    Price Total    --}}
        <div class="mb-3 form-group row">
            <label class="col-sm-2 col-form-label" >ค่าอาหารทั้งหมด</label>
            <div class="col-sm-2">
                <input name="total" type="number" class="form-control text-center @error('total') border border-danger @enderror" value="{{ $bill->total }}">
            </div>
            <div class = "col-sm-3">
                @error('total')
                    <p class = "text-danger">{{$message}}</p>
                @enderror
            </div>
        </div>

        <button type="submit" class="btn btn-primary" style="margin-right: 20px">
            แก้ไข
        </button>
    </form>

    <form action="{{ route('bills.destroy', ['bill' => $bill->id]) }}" method="POST">
        @method('DELETE')
        @csrf

        <button type="submit" class="mt-2 btn btn-danger">
            ลบ
        </button>
    </form>


@endsection

