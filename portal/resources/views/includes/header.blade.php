<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>OpenRSC</title>
	<meta name="description" content="An RSC replica - open source and free!">
	<meta name="keywords"
		  content="rsc preservation,openrsc,open rsc,rsc,open-rsc,rs classic,rsc cabbage,rsc cabbage,authentic rs classic,vanilla rsc,rs1,rs vet, rsc vet">
	<meta name="author" content="OpenRSC">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	@if (config('openrsc.force_https', false))
		<meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
	@endif

	<!-- Favicons -->
	<link rel="apple-touch-icon" sizes="180x180" href="{{ asset('img/favicons/apple-touch-icon.png') }}">
	<link rel="icon" type="image/png" sizes="32x32" href="{{ asset('img/favicons/favicon-32x32.png') }}">
	<link rel="icon" type="image/png" sizes="16x16" href="{{ asset('img/favicons/favicon-16x16.png') }}">
	<link rel="manifest" href="{{ asset('img/favicons/site.webmanifest') }}">
	<link rel="mask-icon" href="{{ asset('img/favicons/safari-pinned-tab.svg') }}" color="#5bbad5">

	<!-- CSS -->
	<link type="text/css" rel="stylesheet" href="{{ mix('css/tailwind.css') }}">
    <link type="text/css" rel="stylesheet" href="{{ mix('css/all.css') }}">
    <link type="text/css" rel="stylesheet" href="{{ mix('css/app.css') }}">

    @livewireStyles
</head>
