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
                    <button class="btn btn-outline-primary " type="submit">
                        + ผู้ใช้งาน
                    </button>
                </a>
            </span>
        </h1>
    </form>
    <hr>
    <span class="mb-3 float-end">
        <form class="form-inline" >
            <form>
                <span class="float-start px-2">
                {{-- filter by type --}}
                <select class="form-select form-select-sm text-center bg rounded-1 form-select"
                        style="width: 150px; display: inline;"
                        name="select_r" id="select_r">
                    <option value="">เลือกหน้าที่</option>
{{--                    @foreach($types as $type)--}}
{{--                        <option value="{{ $select_r }}" {{ $filterMenu['select_r'] === $type->type ? "selected" : ""}}>--}}
{{--                            {{ $type->type }}--}}
{{--                            </option>--}}
{{--                    @endforeach--}}
                    <option value="Admin" {{ $filterMenu['select_r'] === "Admin" ? "selected" : ""}}>Admin</option>
                    <option value="FrontWorker" {{ $filterMenu['select_r'] === "FrontWorker" ? "selected" : ""}}>FrontWorker</option>
                    <option value="BackWorker" {{ $filterMenu['select_r'] === "BackWorker" ? "selected" : ""}}>BackWorker</option>
                </select>
                </span>
                <span class="float-start px-2">
                    <input type="text" class="form-control form-control-sm rounded-2 text-center"
                           style="padding: 0.25rem 0rem;"
                           name="search" id="search" autocomplete="off"
                           placeholder="- - - - ชื่อผู้ใช้งาน - - - -"
                           value="{{$search_name}}">
                </span>
                <button class="btn btn-primary btn-sm" formaction="{{route('user.filter')}}">search</button>
                <button class="btn btn-warning btn-sm" formaction="{{route('users.index')}}">clear</button>
            </form>
        </form>
    </span>
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
                            <p class="card-text">ประเภท :
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
