@extends('layouts.app')

@section('content')
<style>

</style>
<div class="container">

<div class="card o-hidden border-0 shadow-lg my-5">
    <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
            <div class="col-lg-5 d-none d-lg-block bg-register-image" style='background: url({{env("APP_URL")}}/img/register.jpg); background-size: cover; background-position-x: 35%'></div>
            <div class="col-lg-7">
                <div class="p-5">
                    <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                    </div>
                    <form method="POST" class='user' action="{{ route('register') }}">
                        @csrf
                        <div class="form-group row">
                            <div class="col-sm-12 mb-6 mb-sm-0">
                                <input type="text" name="name" class="form-control form-control-user  @error('name') is-invalid @enderror" id="name"
                                    placeholder="Name"  value="{{ old('name') }}" required autocomplete="name" autofocus>
                                    @error('name')
                                       <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror 
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="text" name="email" class="form-control form-control-user  @error('email') is-invalid @enderror" id="email"
                                placeholder="Email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror 
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input id="password" type="password" class="form-control form-control-user  @error('password') is-invalid @enderror"
                                     placeholder="Password" name="password" required autocomplete="new-password">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input id="password-confirm" type="password" class="form-control form-control-user  @error('password-confirm') is-invalid @enderror"
                                  placeholder="Confirm Password" name="password_confirmation" required autocomplete="new-password">
                                    @error('password-confirm')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <button type="submit" onclick='document.getElementsByTagName("form")[0].submit()' class="btn btn-primary btn-user btn-block">
                            {{ __('Register') }}
                        </button>
                        <hr>
                        <a href="#" class="btn btn-google btn-user btn-block">
                            <i class="fab fa-google fa-fw"></i> Register with Google
                        </a>
                        <a href="#" class="btn btn-facebook btn-user btn-block">
                            <i class="fab fa-facebook-f fa-fw"></i> Register with Facebook
                        </a>
                    </form>
                    <hr>
                    <div class="text-center">
                        <a class="small" href="#">Forgot Password?</a>
                    </div>
                    <div class="text-center">
                        <a class="small" href="/">Already have an account? Login!</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</div>
@endsection
