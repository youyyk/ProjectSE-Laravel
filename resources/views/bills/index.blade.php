@extends('welcome')

@section('content')
    <div class="container">
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
                    <td class="border-2 p-0.5">{{$bill->id}}</td>
                    <td class="border-2 p-0.5">{{$bill->total}}</td>
                    <td class="border-2 p-0.5">{{$bill->status}}</td>

                    <td class="border-2 p-0.5">{{$bill->user}}</td>
                    <td class="border-2 p-0.5">{{$bill->resTable}}</td>
                    <td class="border-2 p-0.5">{{$bill->menus}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
