@extends('welcome')

@section('content')
    <div class="container">
        <h3 class="text-center" style="margin-top: 20px;">บิลทั้งหมดของโต๊ะ {{$bills[0]->resTable->name}}</h3>
        <a class="btn btn-secondary"
           href="{{route("menu.choose.index",['tableId'=>$bills[0]->resTable->id])}}"
           role="button" style="float:right; width: 100px">กลับ</a>
        <a class="btn btn-warning col-lg-5"
           href="{{ route('bill.pay.table', ['resTable'=>$bills[0]->resTable]) }}"
           role="button" style="float:right; width: 200px; margin-right: 10px;">ชำระเงิน</a>
{{--        <button class="btn btn-warning"--}}
{{--                style="float:right; width: 200px; margin-right: 10px;"--}}
{{--                data-bs-toggle="modal"--}}
{{--                data-bs-target="#paidPopUp">--}}
{{--            ชำระเงิน--}}
{{--        </button>--}}
{{--        @include('bills.bill_component.paidPopUp',['bills'=>$bills, 'resTable'=>$bills[0]->resTable])--}}
        @foreach($bills as $bill)
            <h5>#{{$bill->id}} โดย {{$bill->user->name}}</h5>
            <h5>Total: {{$bill->total}}</h5>
            <table class="table border-2 mt-3">
                <thead>
                <tr>
                    <th class="border-2">ชื่อเมนู</th>
                    <th class="border-2">จำนวน</th>
                    <th class="border-2">สถานะ</th>
                    <th class="border-2">คำสั่ง</th>
                </tr>
                </thead>
                <tbody>
                @foreach($bill->menus as $menu)
                    <tr class="something">
                        <td class="border-2 p-0.5" style="width: 30%">{{$menu->name}}</td>
                        <td class="border-2 p-0.5" style="width: 30%">{{$menu->pivot->amount}}</td>
                        <td class="border-2 p-0.5" style="width: 30%; font-size: 20px">
                            @if($menu->pivot->status==="notStarted")
                                <span class="badge alert-secondary">{{$menu->pivot->status}}</span>
                            @elseif($menu->pivot->status==="inProcess")
                                <span class="badge alert-primary">{{$menu->pivot->status}}</span>
                            @elseif($menu->pivot->status==="finish")
                                <span class="badge alert-success">{{$menu->pivot->status}}</span>
                            @endif
                        </td>
                        <td class="border-2 p-0.5" style="width: 30%">
                            @if($menu->pivot->status == "notStarted")
                                <button class="btn btn-danger"
                                        data-bs-toggle="modal"
                                        data-bs-target="#cancelMenuInBillPopUp{{$bill->id}}-{{$menu->id}}">
                                        ยกเลิก
                                </button>
                            @else
                                <button class="btn btn-secondary" disabled
                                        data-bs-toggle="modal"
                                        data-bs-target="#cancelMenuInBillPopUp{{$bill->id}}-{{$menu->id}}">
                                        ยกเลิก
                                </button>
                            @endif
                        </td>
                        @include('menus.menu_component.cancelMenuInBillPopUp',['bill'=>$bill, 'menu'=>$menu])
                    </tr>
                @endforeach
                </tbody>
            </table>
        @endforeach
    </div>
@endsection
