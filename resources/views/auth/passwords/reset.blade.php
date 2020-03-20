


@extends('admin.admin_layout.layout')


@section('admin_content')


    <div class="auth-layout-wrap"><!--style="background-image: url(http://gull-html-laravel.ui-lib.com/assets/images/photo-wide-4.jpg)"-->
        <div class="auth-content">
            <div class="d-flex justify-content-center align-items-center">
                <div class="card o-hidden col-md-8">

                    <div class="row text-center ">
                        <div class="col-md-12">
                            <div class="p-4">

                                <div class="auth-logo text-center mb-4">
                                    @include('admin.admin_layout.logo')
                                </div>
                                <h1 class="mb-3 text-18">Reset Password</h1>
                                <form method="POST" action="{{ route('password.update') }}">
                                    @csrf

                                    <input type="hidden" name="token" value="{{ $token }}">
                                    <div class="form-group">
                                        <label for="email">{{ __('E-Mail Address') }}</label>
                                        <input id="email" type="email" class="form-control form-control-rounded @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="password">{{ __('Password') }}</label>
                                        <input id="password" type="password" class="form-control form-control-rounded @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="password">{{ __('Confirm Password') }}</label>
                                        <input id="password-confirm" type="password" class="form-control form-control-rounded" name="password_confirmation" required autocomplete="new-password">

                                    </div>

                                    <button type="submit" class="btn btn-rounded btn-primary btn-block mt-5"> {{ __('Reset Password') }}</button>

                                </form>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection



