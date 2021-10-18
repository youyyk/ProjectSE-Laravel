@extends('welcome')
@section('content')
<div class="container">
    <h1 class="mt-3 text-center">
        บิล #{{$bill->id}}
{{--        <span class="float-end " >--}}

{{--                <button type="button" class="btn btn-primary">--}}
{{--                    <a href="{{ route("bills.edit",['bill'=> $bill->id]) }}" style="text-decoration:none" class="link-light">--}}
{{--                    แก้ไข</a>--}}
{{--                </button>--}}

            <span class="float-end btn-group px-2 mt-2" role="group" aria-label="Third group">
                <button type="button" class="btn btn-secondary">
                <a href="{{route("day.line")}}" style="text-decoration:none" class="link-light">
                    ย้อนกลับ</a>
                </button>
            </span>
{{--        </span>--}}
    </h1>
    <hr>
    <span class="float-end " >
        <button type="button" class="btn btn-primary">
            <a href="{{ route("bills.edit",['bill'=> $bill->id]) }}" style="text-decoration:none" class="link-light">
            แก้ไข</a>
        </button>
    </span>
    {{--    Table's ID    --}}
    <div class="mt-3 text-center">
        <label class="col-sm-2 "><b>เลขโต๊ะ</b></label>
        <label class="col-sm-2">
            {{$bill->restable_id}}
        </label>
    </div>
    {{--    Menu's Name    --}}
    <div class="mt-3 text-center">
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
    <div class="mt-3 text-center">
        <label class="col-sm-2 "><b>ID พนักงาน</b></label>
        <label class="col-sm-2">
            {{$bill->user_id}}
        </label>
    </div>
    {{--    Price Total    --}}
    <div class="mt-3 text-center">
        <label class="col-sm-2 " ><b>ค่าอาหารทั้งหมด</b></label>
        <div class="mt-3 text-center">
            {{$bill->total}} ฿
        </div>
    </div>
</div>

@endsection
