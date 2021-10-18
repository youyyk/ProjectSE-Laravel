<style >
    .bg-image {
        background-image: url('{{asset('/storage/images/kitchen.jpeg')}}');

    }
</style>

@extends('welcome')

@section('content')

<div class="container " style="margin-top:15%;margin-left: 25%">
    <div class="row no-gutter">
        <!-- The image half -->
        <div class="col-md-3 d-none d-md-flex bg-image"></div>


        <!-- The content half -->
        <div class="col-md-5 bg-light">
            <div class="login d-flex align-items-center py-5">

                <!-- Demo content-->
                <div class="container">
                    <div class="row">
                        <div class="col-lg-10 mx-auto">
                            <h3 class="display-4 text-center mb-5">เข้าสู่ระบบ</h3>
                            <form method="POST" action="{{ route('login') }}">
                                @csrf

                                <div class="form-group row justify-content-center mb-4">
                                    <label for="email" class="col-md-3 col-form-label text-md-right">{{ __('อีเมล') }}</label>

                                    <span class="col-md-7">
                                        <input id="email" type="email" class="form-control rounded-pill @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="off" autofocus>

                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </span>
                                </div>

                                <div class="form-group row justify-content-center" style="margin-top: 10px">

                                    <label for="password" class="col-md-3 col-form-label text-md-right">{{ __('รหัสผ่าน') }}</label>

                                    <span class="col-md-7">
                                        <input id="password" type="password" class="form-control rounded-pill @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </span>
                                </div>

                                <div class="text-center" style="margin-top: 10px;">
                                    {{--                            <div class="col-md-8 offset-md-4">--}}
                                    <button type="submit" class="btn btn-primary rounded-pill mt-4" style="width: 150px">
                                        {{ __('เข้าสู่ระบบ') }}
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div><!-- End -->

            </div>
        </div><!-- End -->

    </div>
</div>


@endsection

