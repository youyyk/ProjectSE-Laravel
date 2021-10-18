@extends('welcome')
<style>
    .card:hover {
        cursor: pointer;
        box-shadow: 0 3px 6px rgba(0,0,0,0.16), 0 3px 6px rgba(0,0,0,0.23);
        z-index:1000
    }
</style>
@section('content')
<div class="container">
    <form action="{{ route('register') }}">
        @csrf
        <h1 class="mt-3">
            ผู้ใช้งาน
            <span class="float-end mt-3">
                <a>
                    <button class="btn btn-dark " type="submit">
                        + ผู้ใช้งาน
                    </button>
                </a>
            </span>
        </h1>
    </form>
    <hr>
    {{-- filter  --}}
    @include('users.user_component.filterUser',['filterUser'=>$filterUser])
    {{-- ---------------------------------------- card -------------------------------------------}}

    <div class="row container-fluid">
        @foreach($users as $user)
            <div class="col-sm-4 mb-3">
                <div class="card">
                    <img class="card-img-top"
                         style="height: 250px"
                         src="{{url(\Str::replace('public/','storage/',$user->path))}}"
                         alt="{{$user->name}}">
                    <div class="card-body">
                        <table>
                            <tbody>
                            <h4 class="card-title text-dark">{{$user->name}}</h4>
                            <p class="card-text">อีเมล : {{$user->email}}</p>
                            <p class="card-text" style="font-size: 20px">ประเภท :
                                @if($user->type=="Admin")
                                <span class="badge rounded-pill alert-success">
                                    {{"แอดมิน"}}
                                </span>
                                @elseif($user->type=="FrontWorker")
                                <span class="badge rounded-pill alert-info">
                                    {{"พนักงานหน้าร้าน"}}
                                </span>
                                @elseif($user->type=="BackWorker")
                                <span class="badge rounded-pill alert-secondary">
                                    {{"พนักงานหลังร้าน"}}
                                </span>

                                @endif
                            </p>
                            <p class="card-text">เข้าสู่ระบบล่าสุด : {{$user->last_login}}</p>
                            <span class="float-end">
                                <button class=" btn btn-primary" data-bs-toggle="modal" data-bs-target="#editUserModal{{$user->id}}">
                                        แก้ไข
                                </button>
                                <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteUserModal{{$user->id}}">
                                    ลบ
                                </button>
                            </span>
                            </tbody>
                        </table>
                    </div>
                </div>
                {{--                         Edit Menu --}}
                @include('users.user_component.editPopUp',['user'=>$user])

                {{--                         Delete Menu --}}
                @include('users.user_component.deletePopUp',['user'=>$user])
            </div>
        @endforeach
    </div>
</div>
@endsection
