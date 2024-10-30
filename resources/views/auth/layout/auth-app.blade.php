<!DOCTYPE html>
<html lang="en">

<head>
  @include('auth.layout.partials.head')
</head>
<body>
  @include('components.tap-on-top')
  @include('components.loader')

  <div class="container-fluid p-0">
    <div class="row m-0">
      <div class="col-12 p-0">
        <div class="login-card login-dark">
          <div>
              <a class="logo" href="{{route('home.index')}}">
                <img class="img-fluid for-light m-auto" src="{{asset('assets/images/logo/logo1.png')}}" alt="looginpage">
                <img class="img-fluid for-dark" src="{{asset('assets/images/logo/logo-dark.png')}}" alt="logo">
              </a>
            @yield('content')
          </div>
        </div>
      </div>
    </div>
    @include('auth.layout.partials.footer')
  </div>
</body>
</html>
