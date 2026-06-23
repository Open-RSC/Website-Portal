@extends('template')
@section('content')
    <div class="play-now-container">
        <a href="/playnow/worldlist" class="play-now-button"
            aria-label="Play OpenRSC servers via the web client">
            <span class="play-now-button-small">Click here for</span>
            <span class="play-now-button-large">Web Client</span>
        </a>
        <a href="{{ $gameClientUrl }}" class="play-now-button"
            aria-label="Play OpenRSC servers via the {{ $gameClientName }}">
            <span class="play-now-button-small">Click here for</span>
            <span class="play-now-button-large">{{ $gameClientName }}</span>
        </a>
    </div>
    <p class="play-now-client-info">
        <span class="play-now-info-web">{{ $webClientLabel }}</span> {{ $webClientInfo }}<br>
        <span class="play-now-info-game">{{ $gameClientLabel }}</span> {{ $gameClientInfo }}
    </p>
    <p class="play-now-other-clients">
        You can also play on <span class="play-now-other-client-name">{{ $otherOSName }}</span> with the
        <a href="{{ $otherClientUrl }}" class="play-now-other-client-link">{{ $otherClientName }}</a>.
    </p>
    <span class="d-block text-center">
        <p>Need an account? Click <a href="/register">here</a> to register an account.</p>
    </span>
@endsection
