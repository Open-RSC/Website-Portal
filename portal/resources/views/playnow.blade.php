@extends('template')
@section('content')
    <div class="play-now-container">
        <a href="/playnow/worldlist" class="play-now-left-button" 
            aria-label="Play Open RSC servers via the web client"></a>
        <a href="{{ $gameClientUrl }}" class="play-now-right-button"
            aria-label="Play Open RSC servers via the game client (launcher)"></a>
        <img src="{{ $graphicImageUrl }}" class="play-now-image" 
            alt="Knight and Magician present two options for playing Open RSC servers" />
    </div>
    <p class="play-now-other-clients">
        You can also play on <span class="play-now-other-client-name">{{ $otherOSName }}</span> with the 
        <a href="{{ $otherClientUrl }}" class="play-now-other-client-link">{{ $otherClientName }}</a>.
    </p>
@endsection