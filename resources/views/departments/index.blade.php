@extends('welcome')

@section('content')
    <table class="table border-2 mt-3">
        <thead>
        <tr>
            <th class="border-2">#</th>
            <th class="border-2">Name</th>
            <th class="border-2">Menus (Relation)</th>
        </tr>
        </thead>
        <tbody>
        @foreach($departments as $department)
            <tr>
                <td class="border-2 p-0.5">{{$department->id}}</td>
                <td class="border-2 p-0.5">{{$department->name}}</td>

                <td class="border-2 p-0.5">{{$department->menus}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
