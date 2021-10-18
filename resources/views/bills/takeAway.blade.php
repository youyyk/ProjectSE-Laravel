@extends('welcome')

@section('content')
<div class="container">
    <div>
        <h3 class="text-center" style="margin-top: 20px;">
            บิลกลับบ้านทั้งหมด
        </h3>
        <a class="btn btn-secondary"
           href="{{route("resTables.index")}}"
           role="button" style="float:right; width: 100px">กลับ</a>
    </div>
    <div class="row">
        @foreach($bills as $bill)
            <div class="card mb-3" style="margin-top: 15px;">
                <div class="card-header">
                    <h5>#{{$bill->id}} โดย {{$bill->user->name}}</h5>
                    <h5 style="display: inline">
                        Total: {{$bill->total}}
                        <b class="badge alert-secondary" style="font-size: 16px; color: black">
                            ( กลับบ้าน )
                        </b>
                    </h5>
                    <button class="btn btn-warning"
                            {{$bill->status==1?"disabled":""}}
                            style="float:right; width: 200px; margin-right: 10px; margin-top: -10px"
                            data-bs-toggle="modal"
                            data-bs-target="#paidPopUpTakeAway{{$bill->id}}">
                        ชำระเงิน
                    </button>
                    @include('bills.bill_component.paidPopUpTakeAway',['bill'=>$bill])
                </div>
                <div class="card-body" style="margin-top: -15px; margin-bottom: -15px;">
                    <table class="table border-2 mt-3">
                        <thead>
                        <tr class="text-center">
                            <th class="border-2">ชื่อเมนู</th>
                            <th class="border-2">จำนวน</th>
                            <th class="border-2">ราคา</th>
                            <th class="border-2">สถานะ</th>
                            <th class="border-2">คำสั่ง</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($bill->menus as $menu)
                            <tr class="something text-center align-middle">
                                <td class="border-2" style="width: 25%">{{$menu->name}}</td>
                                <td class="border-2" style="width: 10%">{{$menu->pivot->amount}}</td>
                                <td class="border-2" style="width: 25%">{{$menu->price*$menu->pivot->amount}}</td>
                                <td class="border-2" style="width: 25%; font-size: 20px">
                                    @if($menu->pivot->status==="notStarted")
                                        <span class="badge alert-secondary" style="width: 50%">ยังไม่เริ่ม</span>
                                    @elseif($menu->pivot->status==="inProcess")
                                        <span class="badge alert-primary" style="width: 50%">กำลังทำ</span>
                                    @elseif($menu->pivot->status==="finish")
                                        <span class="badge alert-success" style="width: 50%">เสร็จสิ้น</span>
                                    @endif
                                </td>
                                <td class="border-2" style="width: 15%">
                                    <button class="btn
                                       {{$menu->pivot->status == "notStarted"?"btn-danger":"btn-secondary"}}"
                                            {{$menu->pivot->status != "notStarted"?"disabled":""}}
                                            data-bs-toggle="modal"
                                            data-bs-target="#cancelMenuInBillPopUp{{$bill->id}}-{{$menu->id}}">
                                        ยกเลิก
                                    </button>
                                </td>
                            </tr>
                            @include('menus.menu_component.cancelMenuInBillPopUp',['bill'=>$bill, 'menu'=>$menu])
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
