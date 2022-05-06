@extends('template')
@section('content')
    <div class="play-now-container">
        <a href="/playnow/worldlist" class="play-now-left-button"></a>
        <a href="{{ $gameClientUrl }}" class="play-now-right-button"></a>
        <img src="/img/PlayNowGraphic.png" class="play-now-image" 
            alt="Knight and Magician present two options for playing Open RSC servers" />
    </div>
@endsection