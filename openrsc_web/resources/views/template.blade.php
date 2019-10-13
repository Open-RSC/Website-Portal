<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('includes.header')
<body>
@include('includes.navbar')
<section id="home">
	@yield('content')
</section>
@include('includes.footerscripts')
</body>
</html>
