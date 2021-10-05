@extends('welcome')

@section('content')
    <div class="container">
        <table class="table border-2 mt-3">
            <thead>
            <tr>
                <th class="border-2">#</th>
                <th class="border-2">status</th>
                <th class="border-2">Bills (Relation)</th>
            </tr>
            </thead>
            <tbody>
            @foreach($resTables as $resTable)
                <tr>
                    <td class="border-2 p-0.5">{{$resTable->id}}</td>
                    <td class="border-2 p-0.5">{{$resTable->status}}</td>

                    <td class="border-2 p-0.5">{{$resTable->bills}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
