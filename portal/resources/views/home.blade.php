@extends('template')

@section('content')
    <div class="container text-gray-400">
        <div class="row justify-content-between">
            <div class="col-sm-4 float-left">
                <div class="border-top border-info border-bottom pt-1">
                    <div class="text-left pl-3 pr-3">
                        <span class="h5 text-danger">Statistics</span>
                        <table id="List" class="container table-both-hover table-transparent">
                            <tr>
                                <td class="clickable-row" data-href="{{ route('online') }}">
                                    Players Online
                                    <span class="text-primary float-right">
                                        {{ number_format($online) }}
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td class="clickable-row" data-href="{{ route('createdtoday') }}">
                                    Players Created Today
                                    <span class="text-primary float-right">
                                        {{ number_format($registrations) }}
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td class="clickable-row" data-href="{{ route('logins48') }}">
                                    Online Last 48 Hours
                                    <span class="text-primary float-right">
                                        {{ number_format($logins) }}
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td class="clickable-row" data-href="{{ route('stats') }}">
                                    Unique Players
                                    <span class="text-primary float-right">
                                        {{ number_format($uniquePlayers) }}
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td class="clickable-row" data-href="{{ route('stats') }}">
                                    Total Players
                                    <span class="text-primary float-right">
                                        {{ number_format($totalPlayers) }}
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td class="clickable-row" data-href="{{ route('stats') }}">
                                    Gold in Game
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
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="border-info border-bottom pt-1 pb-1">
                    <div class="discord">
                        <iframe src="https://discordapp.com/widget?id=459699205674369025&theme=dark" width="245"
                                height="520" allowtransparency="true"></iframe>
                    </div>
                </div>
            </div>

            <div class="float-right" style="width: 320px;">
                <div class="border-top border-info border-bottom pt-1 pb-1">
                    <div class="text-left pl-3 pr-3">
                        <span class="h5 text-danger">Achievements</span>
                        <table id="List" class="container table-both-hover table-transparent">
                            @foreach ($activityfeed as $activity)
                                <tr class="clickable-row" data-href="../player/{{ $activity->id }}">
                                    <td class="col-2">
                                        <div class="center"
                                             style="border-radius: 10px; overflow: hidden; width: 50px; height: 50px;">
                                            @if(file_exists( public_path().asset('/img/avatars/'.$activity->id.'.png')))
                                                <img src="{{ asset('img/avatars/'.$activity->id.'.png') }}"
                                                     alt="Player avatar">
                                            @else
                                                <img src="{{ asset('img/player.png') }}" alt="Default avatar">
                                            @endif
                                        </div>
                                    </td>
                                    <td class="col-9 text-left pb-2">
                                        {{ ucfirst($activity->username) }}
                                        {!! $activity->message !!}
                                        <span class="text-primary small">
                                            ({{ Carbon\Carbon::parse($activity->time)->diffForHumans() }})
                                        </span>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
