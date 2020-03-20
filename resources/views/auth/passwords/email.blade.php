
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
                                @if (session('status'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('status') }}
                                    </div>
                                @endif
                                <form method="POST" action="{{ route('password.email') }}">
                                    @csrf
                                    <div class="form-group">
                                        <label for="email">E-Mail  Address</label>
                                        <input id="email" type="text" class="form-control form-control-rounded @error('email') is-invalid @enderror" name="email" @if(old('email'))  value="{{ old('email')  }}" @endif @if(isset($_GET['email'])) value="{{$_GET['email']}}"  @endif required autocomplete="email" autofocus>
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>


                                    <button class="btn btn-rounded btn-primary btn-block mt-3">Send Password Reset Link</button>

                                </form>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
