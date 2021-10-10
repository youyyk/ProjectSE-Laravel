@extends('welcome')

@section('content')
    <h1 class="mb-4 mt-4">Create Bill</h1>
    <form action="{{ route('bills.store') }}" method="POST">
        @csrf
{{--        --}}{{--   Bill's ID   --}}
{{--        <div class="mb-3 form-group row">--}}
{{--            <label class="col-sm-2 col-form-label">Bill's ID</label>--}}
{{--            <div class="col-sm-2">--}}
{{--                <input name="name" type="number" class="form-control @error('name') border border-danger @enderror">--}}
{{--            </div>
                <div class = "col-sm-3">
                    @error('name')
                        <p class = "text-danger">{{$message}}</p>
                    @enderror
                </div>--}}
{{--        </div>--}}
        {{--    Table's ID    --}}
        <div class="mb-3 form-group row">
            <label class="col-sm-2 col-form-label">Table's ID</label>
            <div class="col-sm-2">
                <input name="restable_id" type="number" class="form-control text-center @error('restable_id') border border-danger @enderror">
            </div>
            <div class = "col-sm-3">
                @error('restable_id')
                    <p class = "text-danger">{{$message}}</p>
                @enderror
            </div>
        </div>
        {{--    Menu's ID    --}}
        <div class="mb-3 form-group row">
            <label class="col-sm-2 col-form-label">Menus' ID (separated with comma)</label>
            <div class="col-sm-2">
                <input name="menus_id" type="text" class="form-control text-center @error('menus_id') border border-danger @enderror">
            </div>
            <div class = "col-sm-3">
                @error('menus_id')
                    <p class = "text-danger">{{$message}}</p>
                @enderror
            </div>
        </div>
        {{--    User's ID    --}}
        <div class="mb-3 form-group row">
            <label class="col-sm-2 col-form-label">User's ID</label>
            <div class="col-sm-2">
                <input name="user_id" type="number" class="form-control @error('user_id') border border-danger @enderror">
            </div>
            <div class = "col-sm-3">
                @error('user_id')
                    <p class = "text-danger">{{$message}}</p>
                @enderror
            </div>
        </div>
        {{--    Price Total    --}}
        <div class="mb-3 form-group row">
            <label class="col-sm-2 col-form-label" >Price Total</label>
            <div class="col-sm-2">
                <input name="total" type="number" class="form-control text-center @error('total') border border-danger @enderror" placeholder="- - - - -  baht  - - - - -">
            </div>
            <div class = "col-sm-3">
                @error('total')
                    <p class = "text-danger">{{$message}}</p>
                @enderror
            </div>
        </div>
        <a href="{{route("bills.index")}}">
            <button type="submit" class="btn btn-primary">
                + Add bill
            </button>
        </a>
    </form>






@endsection
