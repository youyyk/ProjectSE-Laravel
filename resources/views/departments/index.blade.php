@extends('welcome')

@section('content')
<div class="container">
    <h1 class="mt-3 mb-4">
        แผนกครัว
        <span class="float-end">
            <form action="{{ route('departments.store') }}" method="POST">
                @csrf
                <div class="input-group">
                  <input type="type" name="name" class="form-control mt-lg-2 text-center" placeholder="- - - เพิ่มแผนก - - -" autocomplete="off">
                  <div class="input-group-append">
                    <button class="btn btn-primary" type="submit">+ เพิ่ม</button>
                  </div>
                </div>
            </form>
        </span>
    </h1>

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
                    <span class="float-end">
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editDepartmentModal{{$department->id}}">
                            แก้ไข
                        </button>
                        <button class=" btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteDepartmentModal{{$department->id}}">
                                ลบ
                        </button>
                    </span>

                    {{-- Edit Menu --}}
                    @include('departments.department_component.editDepartmentPopUp',['department'=>$department])

                    {{-- Delete Menu --}}
                    @include('departments.department_component.deleteDepartmentPopUp',['department'=>$department])


                </div>
            </div>
        </div>
    @endforeach
</div>






@endsection
