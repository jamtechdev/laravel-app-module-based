@extends('auth.layout.auth-app')

@section('content')
<div class="login-main">
    <form class="theme-form">
        <h2 class="text-center">Create your account</h2>
        <p class="text-center">Enter your personal details to create account</p>
        <div class="form-group">
            <label class="col-form-label pt-0">Your Name</label>
            <div class="row g-2">
                <div class="col-6">
                    <input class="form-control" type="text" required="" placeholder="First name">
                </div>
                <div class="col-6">
                    <input class="form-control" type="text" required="" placeholder="Last name">
                </div>
            </div>
        </div>
        <div class="form-group">
            <label class="col-form-label">Email Address</label>
            <input class="form-control" type="email" required="" placeholder="Test@gmail.com">
        </div>
        <div class="form-group">
            <label class="col-form-label">Password</label>
            <div class="form-input position-relative">
                <input class="form-control" type="password" name="login[password]" required="" placeholder="*********">
                <div class="show-hide"><span class="show"></span></div>
            </div>
        </div>
        <div class="form-group mb-0 checkbox-checked">
            <div class="form-check checkbox-solid-info">
                <input class="form-check-input" id="solid6" type="checkbox">
                <label class="form-check-label" for="solid6">Agree with</label><a class="ms-3 link" href="forget-password.html">Privacy Policy</a>
            </div>
            <button class="btn btn-primary btn-block w-100 mt-3" type="submit">Create Account</button>
        </div>
        @include('auth.components.social-login')
        <p class="mt-4 mb-0 text-center">Already have an account?<a class="ms-2" href="{{route('login')}}">Sign in</a></p>
    </form>
</div>
@endsection