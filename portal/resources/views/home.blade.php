@extends('template')

@section('content')
    <div class="row">

        <!-- Left column -->
        <div class="col side-left text-info border-secondary border-right">
            <h4 class="h4 pl-3">Latest Achievements</h4>
            <div class="text-primary pl-3" style="font-size: 13px; ">
                @foreach ($activityfeed as $activity)
                    <div class="row clickable-row pb-3" data-href="../player/{{ $activity->id }}">
                        <div class="col-2">
                            <div class="align-middle mt-1"
                                 style="border-radius: 10px; overflow: hidden; width: 50px; height: 50px; border: 1px solid;">
                                @if(file_exists( public_path().asset('/img/avatars/'.$activity->id.'.png')))
                                    <img src="{{ asset('img/avatars/'.$activity->id.'.png') }}" alt="Player avatar">
                                @else
                                    <img src="{{ asset('img/player.png') }}" alt="Default avatar">
                                @endif
                            </div>
                        </div>
                        <div class="col-9 pr-0">
                            <div>
                                <span class="font-weight-bold">{{ ucfirst($activity->username) }}</span>
                                {!! $activity->message !!}
                                <span
                                    class="d-block text-info small">{{ Carbon\Carbon::parse($activity->time)->diffForHumans() }}</span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Center column with title text -->
        <div class="col container text-center">
            <div class="d-block pt-4">
                <img src="{{ asset('img/logo.png') }}" class="center img-fluid" alt="logo">
            </div>

            <div class="d-block pb-3">
                <div class="text-white-50">Striving for a replica RSC game and more</div>
            </div>

            <div class="d-block pt-1 pb-4">
                <div class="btn btn-md btn-secondary dropdown-toggle" data-toggle="dropdown"
                     aria-haspopup="true"
                     aria-expanded="false">
                    Downloads
                </div>
                <div class="dropdown-menu bg-dark" style="padding: 0;">
                    <a class="dropdown-item text-white-50 bg-dark"
                       href="{{ asset('downloads/OpenRSC%20Launcher.exe') }}">Windows</a>
                    <a class="dropdown-item text-white-50 bg-dark" href="{{ asset('downloads/OpenRSC.jar') }}">Mac /
                        Linux</a>
                    <a class="dropdown-item text-white-50 bg-dark" href="{{ asset('downloads/openrsc.apk') }}">Android
                        App</a>
                    <a class="dropdown-item text-white-50 bg-dark"
                       href="https://gitlab.openrsc.com/open-rsc/Single-Player/-/releases">Single
                        Player</a>
                    <a class="dropdown-item text-white-50 bg-dark" href="https://gitlab.openrsc.com/open-rsc/Game"
                       target="_blank">Source Code</a>
                </div>
            </div>

            <div class="middle container-fluid border-top border-info">
                <div class="text-left text-primary">
                    <br>
                    <h4 class="text-info">Statistics</h4>
                    <div>
                        Players Online:
                        <a href="{{ route('online') }}">
                    <span class="text-info float-right">
                        {{ number_format($online) }}
                    </span>
                        </a>
                    </div>
                    <div>
                        Server Status:
                        <span class="float-right">
                    {!! $status !!}
                </span>
                    </div>
                    <div>
                        Players Created Today:
                        <a href="{{ route('createdtoday') }}">
                        <span class="text-info float-right">
                            {{ number_format($registrations) }}
                        </span>
                        </a>
                    </div>
                    <div>
                        Online Last 48 Hours:
                        <a href="{{ route('logins48') }}">
                        <span class="text-info float-right">
                            {{ number_format($logins) }}
                        </span>
                        </a>
                    </div>
                    <div>
                        Unique Players:
                        <a href="{{ route('stats') }}">
                        <span class="text-info float-right">
                            {{ number_format($uniquePlayers) }}
                        </span>
                        </a>
                    </div>
                    <div>
                        Total Players:
                        <a href="{{ route('stats') }}">
                        <span class="text-info float-right">
                            {{ number_format($totalPlayers) }}
                        </span>
                        </a>
                    </div>
                    <div>
                        Gold in Game:
                        <a href="{{ route('stats') }}">
                        <span class="text-info float-right">
                            <img class="mt-n2 inline" src="{{ asset('img/items/10.png') }}"
                                 alt="coins" height="24px" width="32px"/>
							{{ number_format($sumgold) }}
                        </span>
                        </a>
                    </div>
                    <div>
                        Cumulative Play:
                        <a href="{{ route('stats') }}">
                        <span class="text-info float-right">
                            {{ $totalTime }}
                        </span>
                        </a>
                    </div>
                    <br>
                </div>
            </div>
        </div>
    </div>
@endsection
