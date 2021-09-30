@extends('welcome')


@section('content')

    <h1 class="mt-3">
        บิล #{{$bill->id}}
        <span class="float-end">
                <a href="{{route("bills.edit",['bill'=>$bill->id])}}">
                    <button type="button" class="btn btn-primary">
                        แก้ไข
                    </button>
                </a>
            </span>
    </h1>
    <hr>
    {{--    Table's ID    --}}
    <div class="mb-3  row">
        <label class="col-sm-2 "><b>เลขโต๊ะ</b></label>
        <label class="col-sm-2">
            {{$bill->restable_id}}
        </label>
    </div>
    {{--    Menu's Name    --}}
    <div class="mb-3  row">
        <label class="col-sm-2 "><b>รายการอาหาร</b></label>
        <label class="col-sm-2">
            @foreach($bill->menus as $menu)
                <div>
                    {{ $menu->name}}
                </div>
            @endforeach
        </label>
    </div>
    {{--    User's ID    --}}
    <div class="mb-3 row">
        <label class="col-sm-2 "><b>ID พนักงาน</b></label>
        <label class="col-sm-2">
            {{$bill->user_id}}
        </label>
    </div>
    {{--    Price Total    --}}
    <div class="mb-3 row">
        <label class="col-sm-2 " ><b>ค่าอาหารทั้งหมด</b></label>
        <div class="col-sm-2">
            {{$bill->total}} ฿
        </div>
    </div>

@endsection
