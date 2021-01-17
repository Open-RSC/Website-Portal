@extends('template')
@section('content')
    <!-- Left column -->
    <div class="col float-left w-25"
         style="min-width: 350px; max-width: 350px; margin-left: auto; margin-right: auto;">
        <div class="border-top border-info border-bottom pt-1 pb-1 bg-black">

            <!-- Server info box -->
            <div class="text-left pl-3 pr-3 border-info border-bottom pt-1 pb-1">
                <span class="h5 text-danger">Server Info</span>
                <div class="table-transparent">
                    @if(('app.authentic') == true)
                        <div class="pl-1 d-block"><span class="text-primary d-block">RSC Preservation</span>
                            <span class="d-block"><i class="fas fa-angle-right"></i> 1x XP rate</span>
                            <span class="d-block"><i class="fas fa-angle-right"></i> No QoL customizations</span>
                            <span class="d-block"><i class="fas fa-angle-right"></i> Staff moderated and no botting allowed</span>
                            <span class="d-block"><i class="fas fa-angle-right"></i> Authentic RSC based on RSC+ replay data</span>
                            <span class="d-block"><i class="fas fa-angle-right"></i> Uses the Open RuneScape Classic framework</span>
                        </div>
                    @elseif(('app.authentic') == false)
                        test
                    @endif
                </div>
            </div>

            <!-- Statistics box -->
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

    </div>

    <!-- Center column -->
    <div class="col w-50 text-center">

        <!-- News section -->
        <div class="text-left pl-3 pr-3">
            <span class="h5 text-danger text-center">Latest News and Updates</span>
            <table id="List" class="container table-both-hover table-transparent">
                <tr>
                    <td width="77px">
                        <a href="{{ asset('news') }}"><img class="no-margin" src="{{ asset('img/home/mm_scroll.jpg') }}" border="0"></a>
                    </td>
                    <td class="valign-top">
                        <table id="List" class="container table-both-hover table-transparent">
                            <!-- todo change to refer news possibly some text file -->
                            <td class="clickable-row" data-href="{{ route('online') }}">
                                News text
                                <span class="text-primary float-right">
                                        1-Jan-2021
                                    </span>
                            </td>
                            @foreach ($activityfeed as $activity)
                                <td class="clickable-row" data-href="{{ route('online') }}">
                                    News text
                                </td>
                            @endforeach
                        </table>
                    </td>
                </tr>
            </table>
            <p>To view a full list of news and updates, <a href="{{ asset('news') }}">Click Here</a></p>
        </div>

    </div>

    <!-- Right column -->
    <div class="col w-25 float-right bg-black"
         style="min-width: 350px; max-width: 350px; margin-left: auto; margin-right: auto;">
        <div class="border-top border-info border-bottom pt-1 pb-1">

            <!-- Achievements box -->
            <div class="text-left pl-3 pr-3 border-info border-bottom pt-1 pb-1">
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
                                <span class="text-primary" style="white-space: nowrap; font-size: 12px;">
                                            ({{ Carbon\Carbon::parse($activity->time)->diffForHumans() }})
                                        </span>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>

            <!-- Discord box -->
            <div class="border-info pt-1 pb-1">
                <iframe src="https://discordapp.com/widget?id=459699205674369025&theme=dark" width="100%"
                        height="520" allowtransparency="true"
                        style="padding-left: 14px; padding-right: 14px;"></iframe>
            </div>

        </div>
    </div>
@endsection
