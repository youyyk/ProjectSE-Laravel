@extends('welcome')
{{--@inject('RestTableController', 'App\Http\Controllers\RestTableController')--}}
@section('content')

    <div class="container m-auto">
        <h1 class="mt-5">
            รายการโต๊ะ
            <span class="float-end">
                <form class="form-inline"
                      action="{{ route('resTables.store') }}"
                      method="POST">
                    @csrf
                    <div class="input-group">
                    <input type="text" name="name"
                           style="padding: 0.25rem 0rem; font-size: 18px"
                           class="rounded-2 text-center form-control mt-lg-2 form-control-sm @error('name') border border-danger rounded is-invalid @enderror"
                           placeholder="- - - เพิ่มโต๊ะ - - -"
                           autocomplete="off">
                    <div class="input-group-append px-2">
                        <button class="btn btn-primary" type="submit" data-bs-toggle="modal" data-bs-target="#createTableModal">+ เพิ่มโต๊ะใหม่</button>
                    </div>
                    </div>
                </form>
                @error('name')
                    <p class=" text-danger m-2 fs-6" role="alert">
                        {{ $message }}
                    </p>
                @enderror
            </span>
        </h1>
        <hr>
{{--        --}}{{-- Create ResTable --}}
{{--        @include('resTables.resTable_component.createPopUp')--}}

        <table class="table border-2 text-center m-auto bg-light">
            <thead>
            <tr class="text-center">
                <th class="border-2">ชื่อโต๊ะ</th>
                <th class="border-2">สถานะ</th>
                <th class="border-2">การทำงาน</th>
            </tr>
            </thead>
            <tbody>
            @foreach($resTables->skip(1) as $resTable)
                <tr class="something text-center align-middle">
                    <td class="border-2 p-0.5" style="width: 40%; font-size: 18px">{{$resTable->name}}</a></td>
                    <td class="border-2 p-0.5" style="width: 40%;">
                        <span class=" badge rounded-pill {{$resTable->status==1?"alert-success":"alert-danger"}}"
                        style="width: 100px; font-size: 16px;">
                            {{$resTable->status==1?"ว่าง":"ไม่ว่าง"}}
                        </span>
                    </td>
                    <td class="border-2 p-0.5" style="width: 20%;">
                        <button type="button" class="btn {{$resTable->status==0?"btn-secondary":"btn-primary"}}" data-bs-toggle="modal" data-bs-target="#editTableModal{{$resTable->id}}"
                            {{$resTable->status==0?"disabled":""}}>
                            แก้ไข
                        </button>
                        <button type="button" class="btn {{$resTable->status==0?"btn-secondary":"btn-danger"}}" data-bs-toggle="modal" data-bs-target="#deleteTableModal{{$resTable->id}}"
                                {{$resTable->status==0?"disabled":""}}>
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
