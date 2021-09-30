@extends('welcome')


@section('content')
    <h1 class="mb-4 mt-4">แก้ไขบิล #</h1>
    <form>
        {{--    Table's ID    --}}
        <div class="mb-3 form-group row">
            <label class="col-sm-2 col-form-label">เลขโต๊ะ</label>
            <div class="col-sm-2">
                <input name="restable_id" type="number" class="form-control text-center">
            </div>
        </div>
        {{--    Menu's Nmae    --}}
        <div class="mb-3 form-group row">
            <label class="col-sm-2 col-form-label">รายการอาหาร</label>
            <div class="col-sm-2">
                <input name="menus_id" type="text" class="form-control text-center">
            </div>
        </div>
        {{--    User's ID    --}}
        <div class="mb-3 form-group row">
            <label class="col-sm-2 col-form-label">User's ID</label>
            <div class="col-sm-2">
                <input name="user_id" type="number" class="form-control text-center">
            </div>
        </div>
        {{--    Price Total    --}}
        <div class="mb-3 form-group row">
            <label class="col-sm-2 col-form-label" >ค่าอาหารทั้งหมด</label>
            <div class="col-sm-2">
                <input name="total" type="number" class="form-control text-center">
            </div>
        </div>
        <a href="{{route("bills.index")}}">
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

