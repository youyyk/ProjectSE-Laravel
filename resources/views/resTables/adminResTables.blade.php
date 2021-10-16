@extends('welcome')
{{--@inject('RestTableController', 'App\Http\Controllers\RestTableController')--}}
@section('content')

    <div class="m-5">
        <h1 class="mt-3">
            รายการโต๊ะ
            <span class="float-end">
                <form class="form-inline"
                      action="{{ route('resTables.store') }}"
                      method="POST">
                    @csrf
                    <input type="text" name="name"
                           style="padding: 0.25rem 0rem; font-size: 18px"
                           class="rounded-2 text-center"
                           placeholder="- - - เพิ่มโต๊ะ - - -"
                           autocomplete="off">
                    <button class="btn btn-primary" type="submit" data-bs-toggle="modal" data-bs-target="#createTableModal">+ เพิ่มโต๊ะใหม่</button>
                </form>
            </span>
        </h1>
        <hr>
{{--        --}}{{-- Create ResTable --}}
{{--        @include('resTables.resTable_component.createPopUp')--}}

        <table class="table border-2">
            <thead>
            <tr class="text-center">
                <th class="border-2">ชื่อโต๊ะ</th>
                <th class="border-2">สถานะ</th>
                <th class="border-2">การทำงาน</th>
            </tr>
            </thead>
            <tbody>
            @foreach($resTables as $resTable)
                <tr class="something text-center align-middle">
                    <td class="border-2 p-0.5" style="width: 40%; font-size: 18px">{{$resTable->name}}</a></td>
                    <td class="border-2 p-0.5" style="width: 40%;">
                        <span class=" badge {{$resTable->status==1?"alert-success":"alert-danger"}}"
                        style="width: 100px; font-size: 16px;">
                            {{$resTable->status==1?"ว่าง":"ไม่ว่าง"}}
                        </span>
                    </td>
                    <td class="border-2 p-0.5" style="width: 20%;">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editTableModal{{$resTable->id}}">
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
