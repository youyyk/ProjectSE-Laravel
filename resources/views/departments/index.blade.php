@extends('welcome')

@section('content')
    <h1 class="mt-3">
        แผนกครัว
        <span class="float-end">
            <form action="{{ route('departments.store') }}" method="POST">
                @csrf
                <div class="input-group">
                  <input type="type" name="name" class="form-control mt-lg-2 text-center" placeholder="- - - เพิ่มแผนก - - -">
                  <div class="input-group-append">
                    <button class="btn btn-primary" type="submit">+ เพิ่ม</button>
                  </div>
                </div>
            </form>
        </span>
    </h1>
    <table class="table border-2 mt-3">
        <thead>
        <tr>
            <th class="border-2">#</th>
            <th class="border-2">Name</th>
            <th class="border-2">Menus (Relation)</th>
        </tr>
        </thead>
        <tbody>
        @foreach($departments as $department)
            <tr>
                <td class="border-2 p-0.5">{{$department->id}}</td>
                <td class="border-2 p-0.5"><a href="{{route('departments.show',['department'=>$department->id])}}" class="text-info">{{$department->name}}</a></td>

                <td class="border-2 p-0.5">
                    @foreach($department->menus as $menu)
                        <div>
                            {{ $menu->name }}
                        </div>
                    @endforeach
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
