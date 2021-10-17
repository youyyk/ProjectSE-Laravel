@extends('welcome')
{{--@inject('RestTableController', 'App\Http\Controllers\RestTableController')--}}
@section('content')

    <div class="container">
        <h1 class="mt-3">
            รายการโต๊ะ
            <span class="float-end">
            <form action="{{ route('resTables.store') }}" method="POST">
                @csrf

                <div class="input-group">
                    <input type="text" name="name"
                           class="form-control mt-lg-2 text-center @error('name') border border-danger rounded  @enderror"
                           placeholder="เพิ่มโต๊ะ" autocomplete="off">
                    <div class="input-group-append px-2">
                        <button class="btn btn-outline-primary" type="submit" data-bs-toggle="modal" data-bs-target="#createTableModal">+ เพิ่มโต๊ะใหม่</button>
                    </div>
                </div>
                @error('name') {{-- การแสดงการกรอกข้อมูลผิดพลาด --}}
                                    <p class=" text-danger m-2 fs-6">
                                        {{ $message }}
                                    </p>
                            @enderror
            </form>
        </span>
        </h1>

            <hr>

        <table class="table border-2 text-center">
            <thead>
            <tr>
                <th class="border-2">ชื่อโต๊ะ</th>
                <th class="border-2">สถานะ</th>
                <th class="border-2">การทำงาน</th>
            </tr>
            </thead>
            <tbody>
            @foreach($resTables as $resTable)
                <tr>
                    <td class="border-2 p-0.5">{{$resTable->name}}</a></td>
                    <td class="border-2 p-0.5 ">
                        @if($resTable->status==1)
                        <span class="badge rounded-pill bg-success">
                            {{"ว่าง"}}
{{--                            {{$resTable->status==1?"ว่าง":"ไม่ว่าง"}}--}}
                        </span>
                        @else
                            <span class="badge rounded-pill bg-danger">
                            {{"ไม่ว่าง"}}
                        </span>
                        @endif
                    </td>
                    <td class="border-2 p-0.5 ">

                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editTableModal{{$resTable->id}}">
                            แก้ไข
                        </button>
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteTableModal{{$resTable->id}}">
                            ลบ
                        </button>
                    </td>
                    {{--         Edit ResTable --}}
                    @include('resTables.resTable_component.editPopUp',['resTable'=>$resTable])
                    {{--         Delete ResTable--}}
                    @include('resTables.resTable_component.deletePopUp',['resTable'=>$resTable])
                </tr>
            @endforeach
            </tbody>
        </table>

    </div>
@endsection
