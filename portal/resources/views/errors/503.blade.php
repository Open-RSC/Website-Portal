<!DOCTYPE html>
<html>
<head>
    <title>Site Under Maintenance</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            height: 100vh;
            font-family: Arial, sans-serif;
            background-color: #000;
            color: #fff;
        }
        h1 {
            font-size: 2em;
        }
        img {
            width: 100px;
            height: 100px;
        }
    </style>
</head>
<body>
    <img src="{{ asset('img/favicons/android-chrome-256x256.png') }}" alt="Logo">
    <h1>We're currently undergoing maintenance. Please check back later.</h1>
    @if(config('openrsc.discord_url_on_maintenance_page') && config('openrsc.discord_url'))
        <h2>To find out more details, please check out Discord server at <a href="{{config('openrsc.discord_url')}}">{{ config('openrsc.discord_url') }}</a>.</h2>
    @endif
</body>
</html>
