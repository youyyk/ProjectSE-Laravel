@extends('welcome')

@section('content')

<div class="container">
    <h1 class="mt-3">
        รายการโต๊ะ
{{--        <span class="float-end">--}}
{{--            <form action="{{ route('resTables.store') }}" method="POST">--}}
{{--                @csrf--}}

{{--                <div class="input-group">--}}
{{--                    <input type="type" name="name" class="form-control mt-lg-2 text-center" placeholder="- - - เพิ่มโต๊ะ - - -">--}}
{{--                    <div class="input-group-append">--}}
{{--                        <button class="btn btn-primary" type="submit">+ เพิ่มโต๊ะใหม่</button>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </form>--}}
{{--        </span>--}}
    </h1>
    <table class="table border-2">
        <thead>
        <tr>
            <th class="border-2">#</th>
            <th class="border-2">name</th>
            <th class="border-2">status</th>
            <th class="border-2">Bills (Relation)</th>
        </tr>
        </thead>
        <tbody>
        @foreach($resTables as $resTable)
            <tr>
                <td class="border-2 p-0.5"><a href="{{route("resTables.edit",['resTable'=>$resTable->id])}}">{{$resTable->id}}</a></td>
                <td class="border-2 p-0.5"><a href="{{route("menu.choose.index",['tableId'=>$resTable->id])}}">{{$resTable->name}} (กดไปสั่งเมนู)</a></td>
                <td class="border-2 p-0.5">{{$resTable->status}}</td>
                <td class="border-2 p-0.5">
                    @foreach($resTable->bills as $bill)
                        <div>
                            ID: {{ $bill->id }} , {{$bill->total}}฿
                        </div>
                    @endforeach
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection
