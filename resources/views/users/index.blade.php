@extends('welcome')

@section('content')
<div class="container">
    <h1 class="mt-3">
        User's List
    </h1>
    <table class="table border-2 mt-3">
        <thead>
        <tr>
            <th class="border-2">#</th>
            <th class="border-2">Username</th>
            <th class="border-2">Password</th>
            <th class="border-2">Name</th>
            <th class="border-2">Type</th>
            <th class="border-2">Last_Login</th>
            <th class="border-2">Bills (Relation)</th>
        </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <td class="border-2 p-0.5">{{$user->id}}</td>
                    <td class="border-2 p-0.5">{{$user->username}}</td>
                    <td class="border-2 p-0.5">{{$user->password}}</td>
                    <td class="border-2 p-0.5">{{$user->name}}</td>
                    <td class="border-2 p-0.5">{{$user->type}}</td>
                    <td class="border-2 p-0.5">{{$user->last_login}}</td>

                    <td class="border-2 p-0.5">{{$user->bills}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
