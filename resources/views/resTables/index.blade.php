@extends('welcome')
@section('content')

<div class="container">
    <h1 class="mt-3">
        รายการโต๊ะ
    </h1>
{{--    ICON of resTable    --}}
        @foreach($resTables as $resTable)
                {{-- 1 ว่าง 0 ไม่ว่าง--}}
                @if($resTable->status == 1)
                <a href="{{ route("menu.choose.index",['tableId'=>$resTable->id]) }}" style="text-decoration:none">
                    <button class="btn m-2" style="background-color: white; border-color: green;">
                        <p style="font-size: 18px; margin-top: 10px; margin-bottom: -10px"><b>{{ $resTable->name }}</b></p>
                        <img src="{{url(\Str::replace('public/','storage/', 'public/images/on.png'))}}"
                                 width="100px" height= "100px">
                    </button>
                </a>
                @else
                <a href="{{ route("menu.choose.index",['tableId'=>$resTable->id]) }}" style="text-decoration:none">
                    <button class="btn m-2" style="background-color: white; border-color: red;">
                        <p style="font-size: 18px; margin-top: 10px; margin-bottom: -10px"><b>{{ $resTable->name }}</b></p>
                        <img src="{{url(\Str::replace('public/','storage/', 'public/images/off.png'))}}"
                                 width="100px" height= "100px">
                    </button>
                </a>
                @endif
        @endforeach
</div>
@endsection

