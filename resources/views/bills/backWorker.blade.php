@extends('welcome')

@section('content')
    <br>
    <div class="row">
        @foreach($bills as $bill)
            <div class="col-sm-6" style="width: 16rem;">
                <div class="card mb-3">
                    <div class="card-header">
                        Bill {{ $bill->id }} โต๊ะ {{ $bill->resTable->id }}
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <tbody>
                            @foreach($bill->menus as $menu)
                                <tr>
                                    <td>{{ $menu->name }}</td>
                                    <td>{{ $menu->pivot->amount }}</td>
{{--                                    <td>{{ $menu->pivot->status }}</td>--}}
                                    <td>
                                        @if($menu->pivot->status == 'notStarted')
                                            <a href="{{route('bill.menu.update.status',['bill'=>$bill,'menuId'=>$menu->id])}}"
                                               class="btn btn-success">เริ่ม</a>
                                        @elseif($menu->pivot->status == 'inProgress')
                                            <a href="{{route('bill.menu.update.status',['bill'=>$bill,'menuId'=>$menu->id])}}"
                                               class="btn btn-success">เสร็จ</a>
                                        @else
                                            <button class="btn btn-secondary" disabled>เสร็จ</button>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
