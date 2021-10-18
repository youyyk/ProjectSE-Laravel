@extends('welcome')
@section('content')

<div class="container" style="">
    <h1 class="mt-5 mb-4">
        รายการโต๊ะ
        <span class="float-end">
            <a href="{{ route("menu.choose.index",['tableId'=>1]) }}">
                <button type="button" class="btn btn-success">
                    สั่งกลับบ้าน
                </button>
            </a>
        </span>
        <span class="float-end" style="margin-right: 5px">
            <a href="{{ route("bill.show.takeaway") }}">
                <button type="button" class="btn btn-primary">
                    บิลกลับบ้านทั้งหมด
                </button>
            </a>
        </span>
    </h1>
{{--    ICON of resTable    --}}
        @foreach($resTables->skip(1) as $resTable)
                {{-- 1 ว่าง 0 ไม่ว่าง--}}
                @if($resTable->status == 1)
                <a href="{{ route("menu.choose.index",['tableId'=>$resTable->id]) }}" style="text-decoration:none">
                    <button class="btn m-2" style="background-color: white; border-color: green;width: 10em;height: 10em">
                        <p style="font-size: 18px; margin-top: 10px; margin-bottom: -10px"><b>{{ $resTable->name }}</b></p>
                        <img src="{{url(\Str::replace('public/','storage/', 'public/images/on.png'))}}"
                                 width="100px" height= "100px">
                    </button>
                </a>
                @else
                <a href="{{ route("menu.choose.index",['tableId'=>$resTable->id]) }}" style="text-decoration:none">
                    <button class="btn m-2" style="background-color: white; border-color: red;width: 10em;height: 10em">
                        <p style="font-size: 18px; margin-top: 10px; margin-bottom: -10px"><b>{{ $resTable->name }}</b></p>
                        <img src="{{url(\Str::replace('public/','storage/', 'public/images/off.png'))}}"
                                 width="100px" height= "100px">
                    </button>
                </a>
                @endif
        @endforeach
</div>
@endsection

