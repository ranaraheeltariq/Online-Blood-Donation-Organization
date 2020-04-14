@extends('layouts.admin')
@section('title','Admin Login')

@section('content')
<div class="container container-login animated fadeIn">
    <h3 class="text-center">Sign In To Admin</h3>
    <div class="login-form">
        <form method="POST" action="{{ route('admin.login') }}">
            @csrf
        <div class="form-group">
            <label for="username" class="placeholder"><b>Username</b></label>
            <input id="username" type="text" class="form-control {{$errors->has('username') || $errors->has('email') ? ' is-invalid' : ''}}" name="email" value="{{ old('email') ?: old('username') }}" required autofocus>
            
            @if ($errors->has('username') || $errors->has('email'))
            <span class="invalid-feedback" role="alert">
                {{-- <strong>{{ $message }}</strong> --}}
                <strong>{{ $errors->first('username') ?: $errors->first('email') }}</strong>
            </span>
        @endif
        </div>
        <div class="form-group">
            <label for="password" class="placeholder"><b>Password</b></label>
            @if (Route::has('password.request'))
            <a href="{{ route('admin.password.request') }}" class="link float-right">Forget Password ?</a>
            @endif
            <div class="position-relative">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                <div class="show-password">
                    <i class="flaticon-interface"></i>
                </div>
                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <div class="form-group form-action-d-flex mb-3">
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="rememberme" name="remember" {{ old('remember') ? 'checked' : '' }}>
                <label class="custom-control-label m-0" for="rememberme">Remember Me</label>
            </div>
            <button type="submit" class="btn btn-primary col-md-5 float-right mt-3 mt-sm-0 fw-bold">
                {{ __('Sign In') }}
            </button>
          </div>
    </form>
    </div>
</div>
@endsection
