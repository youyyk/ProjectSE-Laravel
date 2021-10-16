@extends('welcome')

@section('content')
<div class="container">
    <h1 class="mt-3">
        รายการบิล
    </h1>
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
                <td class="border-2 p-0.5">{{$bill->status}}</td>

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
