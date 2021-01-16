@extends('template')

@section('content')
    <div class="container text-gray-400" style="width: 820px;">
        <div class="row">
            <div class="float-left" style="width: 280px;">
                <div class="border-top border-info border-bottom pt-1 pb-1">
                    <div class="text-left pl-3 pr-3">
                        <h4 class="text-danger">Statistics</h4>
                        <div class="clickable-row hover:bg-gray-700" data-href="{{ route('online') }}">
                            Players Online:
                                <span class="text-primary float-right">
                                    {{ number_format($online) }}
                                </span>
                            </a>
                        </div>
                        <div class="clickable-row hover:bg-gray-700" data-href="{{ route('createdtoday') }}">
                            Players Created Today:
                                <span class="text-primary float-right">
                                    {{ number_format($registrations) }}
                                </span>
                            </a>
                        </div>
                        <div class="clickable-row hover:bg-gray-700" data-href="{{ route('logins48') }}">
                            Online Last 48 Hours:
                                <span class="text-primary float-right">
                                    {{ number_format($logins) }}
                                </span>
                            </a>
                        </div>
                        <div class="clickable-row hover:bg-gray-700" data-href="{{ route('stats') }}">
                            Unique Players:
                                <span class="text-primary float-right">
                                    {{ number_format($uniquePlayers) }}
                                </span>
                            </a>
                        </div>
                        <div class="clickable-row hover:bg-gray-700" data-href="{{ route('stats') }}">
                            Total Players:
                                <span class="text-primary float-right">
                                    {{ number_format($totalPlayers) }}
                                </span>
                            </a>
                        </div>
                        <div class="clickable-row hover:bg-gray-700" data-href="{{ route('stats') }}">
                            Gold in Game:
                                <span class="text-primary float-right">
                                    @if ($sumgold>=1000 and $sumgold<1000000)
                                        {{ number_format($sumgold/1000) }}K
                                    @elseif ($sumgold>=1000000 and $sumgold<1000000000)
                                        {{ number_format($sumgold/1000000) }}M
                                    @elseif ($sumgold>=1000000000 and $sumgold<1000000000000)
                                        {{ number_format($sumgold/1000000000) }}B
                                    @elseif ($sumgold>=1000000000000)
                                        {{ number_format($sumgold/1000000000000) }}T
                                    @else
                                        {{ number_format($sumgold) }}
                                    @endif
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="middle">

            </div>

            <div class="float-right" style="width: 320px;">
                <div class="border-top border-info border-bottom pt-1 pb-1">
                    @foreach ($activityfeed as $activity)
                        <div class="row clickable-row hover:bg-gray-700" data-href="../player/{{ $activity->id }}">
                            <div class="col-2">
                                <div class="center"
                                     style="border-radius: 10px; overflow: hidden; width: 50px; height: 50px;">
                                    @if(file_exists( public_path().asset('/img/avatars/'.$activity->id.'.png')))
                                        <img src="{{ asset('img/avatars/'.$activity->id.'.png') }}" alt="Player avatar">
                                    @else
                                        <img src="{{ asset('img/player.png') }}" alt="Default avatar">
                                    @endif
                                </div>
                            </div>
                            <div class="col-9 text-left pb-2">
                                <span class="font-weight-bold">
                                    {{ ucfirst($activity->username) }}
                                </span>
                                {!! $activity->message !!}
                                <span class="text-primary small">({{ Carbon\Carbon::parse($activity->time)->diffForHumans() }})</span>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="discord">
                <iframe src="https://discordapp.com/widget?id=459699205674369025&theme=dark" width="245" height="520" allowtransparency="true" frameborder="0"></iframe>
            </div>
        </div>
    </div>
@endsection
