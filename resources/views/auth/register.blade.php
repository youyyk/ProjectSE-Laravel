@extends('welcome')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="margin-top: 20px">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3 form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="mb-3 form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3 form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="mb-3 form-group row">
                            <label for="password_confirmation" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="mb-3 form-group row">
                            {{--  Dropdown later  --}}
                            <label class="col-md-4 col-form-label text-md-right" >{{ __('Type') }}</label>
                            <div class="col-md-6">
                                <select class="rounded-1 form-select w-100 h-100"
                                        name="type" id="type" required focus>

{{--                                    @foreach($users as $user)--}}
{{--                                        <option value="{{ $user->type }}">--}}
{{--                                            {{ $user->type }}--}}
{{--                                        </option>--}}
{{--                                    @endforeach--}}
                                    <option value="Admin">Admin</option>
                                    <option value="FrontWorker">FrontWorker</option>
                                    <option value="BackWorker">BackWorker</option>

                                </select>
                            </div>
                        </div>

                        <div class="mb-3 form-group row">
                            <label class="col-md-4 col-form-label text-md-right">Image</label>

                            <div class="col-md-6">
                                <input name="path" type="file" class="form-control @error('path') is-invalid @enderror" >

                                @error('path')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


{{--                        <div class="form-group row mb-0">--}}
                        <div  class="text-center">
{{--                            <span class="col-md-6 offset-md-4">--}}
                                <button type="submit" class="btn btn-primary" style="width: 200px;">
                                    {{ __('Register') }}
                                </button>
{{--                            </span>--}}
                        </div>


                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

