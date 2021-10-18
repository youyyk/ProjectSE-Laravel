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
    <form class="form-inline"
          action="{{ route('departments.store') }}"
          method="POST">
        @csrf
        <h1 class="mt-3">
            แผนกครัว
            <span class="float-end mt-3">
                <span class="float-start px-2">
                    <input type="type" name="name"
                           style="padding: 0.25rem 0rem; font-size: 18px"
                           class="rounded-2 text-center form-control @error('name') border border-danger rounded is-invalid @enderror"
                           placeholder="- - - เพิ่มแผนก - - -"
                           autocomplete="off">
                </span>
                    <button class="btn btn-outline-primary" type="submit">+ เพิ่ม</button>
                    @error('name') {{-- การแสดงการกรอกข้อมูลผิดพลาด --}}
                            <span class="invalid-feedback m-2 fs-6" role="alert">
                                {{ $message }}
                            </span>
                    @enderror
            </span>
        </h1>
    </form>


    <hr>

<div class="row container-fluid">
    @foreach($departments as $department)
        <div class="col-2 m-5">
            <div class="card" style="width: 15rem;">
                <div class="card-body">
                    <form action="{{route('menu.filter')}}">
                        <input name="selected_depart" id="selected_depart" type="hidden" value="{{$department->id}}">
                        <button type="submit" style="border-style: none;background-color: Transparent;"><h3 class="card-title">{{$department->name}}</h3></button>
                    </form>
                        <p class="card-text">จำนวนเมนู : {{$department->menus->count()}}</p>
                    @if($department->id != 1)
                    <span class="float-end" style="margin-right: 5px">
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editDepartmentModal{{$department->id}}">
                            แก้ไข
                        </button>
                        <button class=" btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteDepartmentModal{{$department->id}}">
                                ลบ
                        </button>
                    </span>
                    {{-- Edit Menu --}}
                    @else
                        <div class="float-end rounded-2 p-2" style="background-color: #ECECEC;">
                            ไม่สามารถลบได้
                        </div>
                    @endif
                </div>
            </div>
        </div>
        {{-- Edit Menu --}}
        @include('departments.department_component.editDepartmentPopUp',['department'=>$department])

        {{-- Delete Menu --}}
        @include('departments.department_component.deleteDepartmentPopUp',['department'=>$department])
    @endforeach
</div>






@endsection
