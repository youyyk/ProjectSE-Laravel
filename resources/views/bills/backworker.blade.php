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
                                            <button>เริ่ม</button>
                                        @elseif($menu->pivot->status == 'inProcess')
                                            <button>เสร็จ</button>
                                        @else
                                            <button disabled>เสร็จ</button>
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
