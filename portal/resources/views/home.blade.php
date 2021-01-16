@extends('template')

@section('content')
    <div class="container text-gray-400" style="width: 800px;">
        <div class="row">
            <div class="col-4 float-left">
                <div class="container border-top border-info border-bottom pt-1 pb-1">
                    <div class="text-left">
                        <h4 class="text-danger">Statistics</h4>
                        <div>
                            Players Online:
                            <a href="{{ route('online') }}">
                    <span class="text-primary float-right">
                        {{ number_format($online) }}
                    </span>
                            </a>
                        </div>
                        <div>
                            Players Created Today:
                            <a href="{{ route('createdtoday') }}">
                        <span class="text-primary float-right">
                            {{ number_format($registrations) }}
                        </span>
                            </a>
                        </div>
                        <div>
                            Online Last 48 Hours:
                            <a href="{{ route('logins48') }}">
                        <span class="text-primary float-right">
                            {{ number_format($logins) }}
                        </span>
                            </a>
                        </div>
                        <div>
                            Unique Players:
                            <a href="{{ route('stats') }}">
                        <span class="text-primary float-right">
                            {{ number_format($uniquePlayers) }}
                        </span>
                            </a>
                        </div>
                        <div>
                            Total Players:
                            <a href="{{ route('stats') }}">
                        <span class="text-primary float-right">
                            {{ number_format($totalPlayers) }}
                        </span>
                            </a>
                        </div>
                        <div>
                            Gold in Game:
                            <a href="{{ route('stats') }}">
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

            <div class="col-5 float-right">
                <div class="border-top border-info border-bottom pt-1 pb-1">
                    @foreach ($activityfeed as $activity)
                        <div class="row clickable-row" data-href="../player/{{ $activity->id }}">
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
                                <span class="text-primary font-italic">({{ Carbon\Carbon::parse($activity->time)->diffForHumans() }})</span>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
