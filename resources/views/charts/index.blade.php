@extends('welcome')
@inject('billController', 'App\Http\Controllers\BillController')
@section('content')


<div class="container">
    <h1 class="mt-3 ">
        สรุปยอดบิลทั้งหมด
        <span class="float-end dropdown btn-toolbar mt-3" role="toolbar" aria-label="Toolbar with button groups">
{{--            <span class="float-start fs-6">กราฟประจำ : </span>--}}
            <h6><span class="badge rounded-pill bg-primary">กราฟ</span></h6>
            <span class="btn-group me-2 px-2" role="group" aria-label="Second group">
{{--                <button type="button" class="btn btn-dark ">--}}
{{--                    กราฟ--}}
{{--                </button>--}}
                <button type="button" class="btn btn-dark ">
                    <a href="{{route("day.line")}}" style="text-decoration:none" class="link-light">
                วัน</a>
                </button>
                <button type="button" class="btn btn-secondary ">
                    <a href="{{route("month.line")}}" style="text-decoration:none" class="link-light">
                เดือน</a>
                </button>
                <button type="button" class="btn btn-dark ">
                    <a href="{{route("year.line")}}" style="text-decoration:none" class="link-light">
                ปี</a>
                </button>

{{--            <input type="radio" class="btn-check" name="btnradio" id="btnradio1" autocomplete="off" checked>--}}
{{--            <label class="btn btn-outline-info" for="btnradio1">--}}
{{--                <a href="{{route("charts.index")}}" style="text-decoration:none" class="link-dark">--}}
{{--                วัน</a>--}}
{{--            </label>--}}

{{--            <input type="radio" class="btn-check" name="btnradio" id="btnradio2" autocomplete="off">--}}
{{--            <label class="btn btn-outline-info" for="btnradio2">--}}
{{--                <a href="{{route("month.line")}}" style="text-decoration:none" class="link-dark">--}}
{{--                เดือน</a>--}}
{{--            </label>--}}

{{--            <input type="radio" class="btn-check" name="btnradio" id="btnradio3" autocomplete="off">--}}
{{--            <label class="btn btn-outline-info" for="btnradio3">--}}
{{--                <a href="{{route("year.line")}}" style="text-decoration:none" class="link-dark">--}}
{{--                ปี</a>--}}
{{--            </label>--}}

            <button class="btn btn-outline-secondary dropdown-toggle " type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Dropdown button
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <a class="dropdown-item" href="#">Something else here</a>
            </div>
            </span>
        </span>
    </h1>

    <hr>
    <h3 class="mt-3 text-center">
        รายการบิล
        <span class="float-end">
            <a href="{{route("bills.create")}}">
                <button type="button" class="btn btn-primary">
                    + เพิ่มบิล
                </button>
            </a>
        </span>
    </h3>

    <table class="table border-2 mt-3">
        <thead>
        <tr>
            <th class="border-2">#</th>
            <th class="border-2">Total</th>
            <th class="border-2">Status</th>
            <th class="border-2">User (Relation)</th>
            <th class="border-2">Restable (Relation)</th>
            <th class="border-2">Menus (Relation)</th>
        </tr>
        </thead>
        <tbody>
        @foreach($bills as $bill)
            <tr>
                <td class="border-2 p-0.5">
                    <a href="{{route('bills.show',['bill'=>$bill->id])}}" class="text-info">
                        {{$bill->id}}
                    </a>
                </td>
                <td class="border-2 p-0.5">{{$bill->total}}</td>
                <td class="border-2 p-0.5">
                    @if($bill->status==1)
                        <span class="badge rounded-pill bg-success">
                            {{"ว่าง"}}
                            {{--{{$resTable->status==1?"ว่าง":"ไม่ว่าง"}}--}}
                        </span>
                    @else
                        <span class="badge rounded-pill bg-danger">
                            {{"ไม่ว่าง"}}
                        </span>
                    @endif
                </td>

                <td class="border-2 p-0.5">{{$bill->user->name}}</td>
                <td class="border-2 p-0.5">{{$bill->resTable->id}}</td>
                <td class="border-2 p-0.5">
                    @foreach($bill->menus as $menu)
                        <div>
                            {{ $menu->name}}
                        </div>
                    @endforeach
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection
