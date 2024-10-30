<!DOCTYPE html>
<html lang="en">

<head>
    @include('panel.layout.partials.head')
</head>

<body>
    @include('components.tap-on-top')
    @include('components.loader')
    <div class="page-wrapper compact-wrapper" id="pageWrapper">
        @include('panel.layout.partials.header')
        <div class="page-body-wrapper">
            @include('panel.layout.partials.sidebar')
            
            <div class="page-body">
                @include('components.page-header')
                @yield('content')
            </div>
            @include('panel.layout.partials.footer')

        </div>
    </div>
    @include('panel.layout.partials.script')
</body>

</html>