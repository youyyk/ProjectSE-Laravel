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
                    <input type="text" name="name" class="form-control mt-lg-2 text-center" placeholder="- - - เพิ่มโต๊ะ - - -" autocomplete="off">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit" data-bs-toggle="modal" data-bs-target="#createTableModal">+ เพิ่มโต๊ะใหม่</button>
                    </div>
                </div>
            </form>
        </span>
        </h1>
        <hr>

{{--        --}}{{-- Create ResTable --}}
{{--        @include('resTables.resTable_component.createPopUp')--}}

        <table class="table border-2">
            <thead>
            <tr>
                <th class="border-2">ชื่อโต๊ะ</th>
                <th class="border-2">สถานะ ( 0=ว่าง, 1=ไม่ว่าง )</th>
                <th class="border-2">การทำงาน</th>
            </tr>
            </thead>
            <tbody>
            @foreach($resTables as $resTable)
                <tr>
                    <td class="border-2 p-0.5">{{$resTable->name}}</a></td>
                    <td class="border-2 p-0.5">{{$resTable->status}}</td>
                    <td class="border-2 p-0.5">
{{--                        <form action="{{ route('resTables.destroy', ['resTable' => $resTable->id]) }}" method="POST">--}}
{{--                            @method('DELETE')--}}
{{--                            @csrf--}}
{{--                            <button type="submit" class="btn btn-danger">--}}
{{--                                ลบ--}}
{{--                            </button>--}}

{{--                            <a href="{{route("resTables.edit",['resTable'=>$resTable->id])}}">--}}
{{--                                <button type="button" class="btn btn-primary" >--}}
{{--                                    แก้ไข--}}
{{--                                </button>--}}
{{--                            </a>--}}

{{--                        </form>--}}

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
