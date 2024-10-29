@extends('auth.layout.auth-app')

@section('content')
<div class="login-main">
    <form class="theme-form">
        <h2 class="text-center">Sign in to account</h2>
        <p class="text-center">Enter your email &amp; password to login</p>
        <div class="form-group">
            <label class="col-form-label">Email Address</label>
            <input class="form-control" type="email" required="" placeholder="Test@gmail.com">
        </div>
        <div class="form-group">
            <label class="col-form-label">Password</label>
            <div class="form-input position-relative">
                <input class="form-control" type="password" name="login[password]" required="" placeholder="*********">
                <div class="show-hide"><span class="show"> </span></div>
            </div>
        </div>
        <div class="form-group mb-0 checkbox-checked">
            <div class="form-check checkbox-solid-info">
                <input class="form-check-input" id="solid6" type="checkbox">
                <label class="form-check-label" for="solid6">Remember password</label>
            </div><a class="link" href="forget-password.html">Forgot password?</a>
            <div class="text-end mt-3">
                <button class="btn btn-primary btn-block w-100" type="submit">Sign in </button>
            </div>
        </div>
        @include('auth.components.social-login')
        <p class="mt-4 mb-0 text-center">Don't have account?<a class="ms-2" href="{{route('signup')}}">Create Account</a></p>
    </form>
</div>
@endsection