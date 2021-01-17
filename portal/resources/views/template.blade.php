<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('includes.header')
<body>
@include('includes.navbar')
<section id="home">
    <div class="row text-gray-400"
         style="max-width: 1500px; min-height: 100vh; margin-left: auto; margin-right: auto; background: rgba(30,30,30,.2);">

        <!-- Left rock border -->
        <div class="side-decoration d-none d-xl-flex" style="transform: scaleX(-1);"></div>

        @yield('content')

        <!-- Right rock border -->
        <div class="side-decoration d-none d-xl-flex"></div>
    </div>
</section>
@include('includes.footerscripts')
</body>
</html>
