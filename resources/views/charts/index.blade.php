@extends('welcome')
@inject('billController', 'App\Http\Controllers\BillController')
@section('content')


<div class="container">
    <h1 class="mt-3 ">
        สรุปยอดบิลทั้งหมด
        <span class="float-end btn-toolbar mt-3" role="toolbar" aria-label="Toolbar with button groups">

            <h6><span class="badge rounded-pill alert-primary">กราฟ</span></h6>
            <span class="btn-group me-2 px-2" role="group" aria-label="Second group">

                <button type="button" class="btn btn-outline-light border border-dark">
                    <a href="{{route("day.line")}}" style="text-decoration:none" class="link-dark">
                วัน</a>
                </button>
                <button type="button" class="btn btn-outline-light border border-dark ">
                    <a href="{{route("month.line")}}" style="text-decoration:none" class="link-dark">
                เดือน</a>
                </button>
                <button type="button" class="btn btn-outline-light border border-dark ">
                    <a href="{{route("year.line")}}" style="text-decoration:none" class="link-dark">
                ปี</a>
                </button>

            </span>
        </span>
    </h1>

    <hr>
    <h3 class="mt-3 text-center">
        รายการบิล
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
                        <span class="badge rounded-pill alert-success">
                            {{"ว่าง"}}
                        </span>
                    @else
                        <span class="badge rounded-pill alert-danger">
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
