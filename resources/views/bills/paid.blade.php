@extends('welcome')

@section('content')
    <div class="container">
        <h3 class="text-center" style="margin-top: 20px;">
            ชำระเงินเรียบร้อย บิล {{$bill->id}}
        </h3>
        <div class="card" style="width: 18rem;">
            <div class="card-header text-center">
                การชำระเงิน
            </div>
            <ul class="list-group list-group-flush text-center">
                <li class="list-group-item">ยอดชำระ {{$bill->total}}</li>
                <li class="list-group-item">รับเงินมา {{$receive}}</li>
                <li class="list-group-item">ทอนเงิน {{$exchange}}</li>
            </ul>
        </div>
    </div>
@endsection
