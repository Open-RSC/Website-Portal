@extends('template')

@section('content')
    <div class="col container">
        <h4 class="h2 text-center text-gray-400 pt-5 pb-4 text-capitalize">
            Message Centre
        </h4>
        <div class="row justify-content-center">
            <div class="col-lg-12 text-gray-400 pr-5 pl-5 pt-3 pb-3 bg-black">
                @if ($loggedIn)
                    <p>Welcome to the Message Centre!</p>
                    <p><strong>Username:</strong> {{ Auth::user()->username }}</p>
                    <p><strong>World:</strong> {{ $dbConnection }}</p>
                    <p>
                        @if ((int) $muteExpires > 0 && $currentTimeMillis < $muteExpires)
                            <strong>Muted until:</strong> {{ $mutedStatus }}
                        @else
                            <strong>Muted:</strong> {{ $mutedStatus }}
                        @endif
                    </p>
                    <p>
                        @if ((int) $globalMute > 0 && $currentTimeMillis < $globalMute)
                            <strong>Global Muted until:</strong> {{ $globalMutedStatus }}
                        @else
                            <strong>Global Muted:</strong> {{ $globalMutedStatus }}
                        @endif
                    </p>
                    <p>
                        @if ((int) $banned > 0 && $currentTimeMillis < $banned)
                            <strong>Banned until:</strong> {{ $bannedStatus }}
                        @else
                            <strong>Banned:</strong> {{ $bannedStatus }}
                        @endif
                    </p>

                    @if ($mutedStatus !== 'No' || $globalMutedStatus !== 'No' || $bannedStatus !== 'No')
                        @if ($showAppealMessage)
                            <p><a href="https://rsc.vet/board/viewforum.php?f=24">Click here to post an appeal on our forums</a></p>
                        @endif
                    @else
                        <p>Congratulations, you are not muted or banned! Thank you for following our rules.</p>
                    @endif
                @endif
            </div>
        </div>
    </div>
@endsection
