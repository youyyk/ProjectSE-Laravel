@extends('welcome')

@section('content')
    <div class="container">
        <h3 class="text-center" style="margin-top: 20px;">
            ชำระเงินเรียบร้อยของ
            @if($paid=="all")
                โต๊ะ {{$id}}
            @else
                บิล #{{$id}}
            @endif
        </h3>
        <table class="table border-2 bg-light" style="margin: 50px 0px">
            <tbody>
                <tr class="something text-center align-middle">
                    <td style="font-size: 18px; width: 50%">รับเงินมา</td>
                    <td>{{$receive}}</td>
                    <td>บาท</td>
                </tr>
                <tr class="something text-center align-middle">
                    <td style="font-size: 18px; width: 20%">ยอดชำระ</td>
                    <td>{{$total}}</td>
                    <td>บาท</td>
                </tr>
                <tr class="something text-center align-middle">
                    <td style="font-size: 18px; width: 30%;">ทอนเงิน</td>
                    <td>{{$exchange}}</td>
                    <td>บาท</td>
                </tr>
            </tbody>
        </table>

        <div class="text-center">
            <a class="btn btn-primary w-50"
               style="margin-top: 20px"
               href="{{route("resTables.index")}}"
               role="button" style="">เสร็จสิ้น</a>
        </div>
    </div>
@endsection
