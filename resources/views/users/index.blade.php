@extends('welcome')

@section('content')
<div class="container">
    <h1 class="mt-3">
        ผู้ใช้งาน
        <span class="float-end">
            <a>
                <form action="{{ route('register') }}" class="px-2">
                    @csrf
                    <button class="btn btn-outline-primary " type="submit">
                        + ผู้ใช้งาน
                    </button>
                </form>
            </a>
        </span>
        <span class="float-end"> </span>
    </h1>
    <hr>
    {{-- ---------------------------------------- card -------------------------------------------}}

    <div class="row container-fluid">
        @foreach($users as $user)
            <div class="col-sm-3 mb-3">
                <div class="card">
                    <img class="card-img-top m-3" style="width: 250px;height: 250px" src="{{url(\Str::replace('public/','storage/',$user->path))}}" alt="{{$user->name}}">
                    <div class="card-body">
                        <table>
                            <tbody>
                            <h4 class="card-title text-dark">{{$user->name}}</h4>
                            <p class="card-text">อีเมล : {{$user->email}}</p>
                            <p class="card-text">ประเภท : {{$user->type}}</p>
                            <p class="card-text">เข้าสู่ระบบล่าสุด : {{$user->last_login}}</p>
{{--                            <span class="float-end">--}}
{{--                                        <button class=" btn btn-danger" data-bs-toggle="modal" >--}}
{{--                                            ลบ--}}
{{--                                        </button>--}}
{{--                            </span>--}}
                            </tbody>
                        </table>

{{--                        --}}{{-- Edit Menu --}}
{{--                        @include('menu_component.editPopUp',['menu'=>$menu])--}}

{{--                        --}}{{-- Delete Menu --}}
{{--                        @include('menu_component.deletePopUp',['menu'=>$menu])--}}

                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
