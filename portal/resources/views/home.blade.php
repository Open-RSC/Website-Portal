@extends('template')
@section('content')
    <!-- Left column -->
    <div class="col float-left w-25"
         style="min-width: 350px; max-width: 350px; margin-left: auto; margin-right: auto;">
        <div class="border-top border-info border-bottom pt-1 pb-1 bg-black">

            <!-- Server info box -->
            <div class="text-center container">
                <span class="h5 text-white text-center">Servers Info</span>
            </div>
            <div class="accordion" id="serversInfo">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="rscPreservation">
                        <button class="text-primary accordion-button table-transparent collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#preservationInfo" aria-expanded="false" aria-controls="preservationInfo">
                            RSC Preservation
                        </button>
                    </h2>
                    <div id="preservationInfo" class="accordion-collapse collapse" aria-labelledby="rscPreservation" data-bs-parent="#serversInfo">
                        <div class="accordion-body">
                            <span class="d-block"><i class="fas fa-angle-right"></i> 1x XP rate</span>
                            <span class="d-block"><i class="fas fa-angle-right"></i> No QoL customizations</span>
                            <span class="d-block"><i class="fas fa-angle-right"></i> Staff moderated and no botting allowed</span>
                            <span class="d-block"><i class="fas fa-angle-right"></i> Authentic RSC based on RSC+ replay data</span>
                            <span class="d-block"><i class="fas fa-angle-right"></i> Uses the Open RuneScape Classic framework</span>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="rscCabbage">
                        <button class="text-primary accordion-button table-transparent collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#cabbageInfo" aria-expanded="false" aria-controls="cabbageInfo">
                            RSC Cabbage
                        </button>
                    </h2>
                    <div id="cabbageInfo" class="accordion-collapse collapse" aria-labelledby="rscCabbage" data-bs-parent="#serversInfo">
                        <div class="accordion-body">
                            <span class="d-block"><i class="fas fa-angle-right"></i> 1x or 5x XP rate</span>
                            <span class="d-block"><i class="fas fa-angle-right"></i> 30% faster in-game speed</span>
                            <span class="d-block"><i class="fas fa-angle-right"></i> Auction House</span>
                            <span class="d-block"><i class="fas fa-angle-right"></i> Clans and parties</span>
                            <span class="d-block"><i class="fas fa-angle-right"></i> Custom items, skills, monsters, and quests</span>
                            <span class="d-block"><i class="fas fa-angle-right"></i> Batched skilling activities</span>
                            <span class="d-block"><i class="fas fa-angle-right"></i> Regular Ironman, Hardcore Ironman, and Ultimate Ironman modes available</span>
                            <span class="d-block"><i class="fas fa-angle-right"></i> Staff moderated and no botting allowed</span>
                            <span class="d-block"><i class="fas fa-angle-right"></i> Uses the Open RuneScape Classic framework</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Statistics box -->
            <div class="text-left pl-3 pr-3">
                <div class="text-center container">
                    <span class="h5 text-white text-center">Statistics</span>
                </div>
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
    <div class="col w-50 text-center no-padding">

        <!-- News section -->
        <div class="text-left pl-3 pr-3 no-padding bg-black">
            <table id="List" class="container">
                <tr>
                    <td><img height="6" src="{{ asset('img/home/fm_topleft.gif') }}" width="6"></td>
                    <td style="background-image:url('/img/home/fm_top2.gif');"><img height="6" src="{{ asset('img/home/blank.gif') }}" width="1"></td>
                    <td><img height="6" src="{{ asset('img/home/fm_topright.gif') }}" width="6"></td>
                </tr>
                <tr>
                    <td style="background-image:url('/img/home/fm_left.gif');"><img height="1" src="{{ asset('img/home/blank.gif') }}" width="6"></td>
                    <td>
                        <div class="text-center container">
                            <span class="h5 text-white text-center">Latest News and Updates</span>
                        </div>
                        <table id="List" class="container">
                            <tr>
                                <td width="77px">
                                    <a href="{{ asset('news') }}"><img class="no-margin" src="{{ asset('img/home/mm_scroll.jpg') }}" border="0"></a>
                                </td>
                                <td class="valign-top">
                                    <table id="List" class="container">
                                        <!-- todo change to refer news possibly some text file -->
                                        <td class="clickable-row link-success underline" data-href="{{ route('online') }}">
                                            News text
                                            <span class="text-white float-right">
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
                        <div class="text-center container no-padding">
                            <p>To view a full list of news and updates, <a class="link-success underline" href="{{ asset('news') }}">Click Here</a></p>
                        </div>
                    </td>
                    <td style="background-image:url('/img/home/fm_right.gif');"><img height="1" src="{{ asset('img/home/blank.gif') }}" width="6"></td>
                </tr>
                <tr>
                    <td><img height="6" src="{{ asset('img/home/fm_bottomleft.gif') }}" width="6"></td>
                    <td style="background-image:url('/img/home/fm_bottom2.gif');"><img height="6" src="{{ asset('img/home/blank.gif') }}" width="1"></td>
                    <td><img height="6" src="{{ asset('img/home/fm_bottomright.gif') }}" width="6"></td>
                </tr>
            </table>
        </div>

    </div>

    <!-- Right column -->
    <div class="col w-25 float-right bg-black"
         style="min-width: 350px; max-width: 350px; margin-left: auto; margin-right: auto;">
        <div class="border-top border-info border-bottom pt-1 pb-1">

            <!-- Achievements box -->
            <div class="text-left pl-3 pr-3 border-info border-bottom pt-1 pb-1">
                <div class="text-center container">
                    <span class="h5 text-white text-center">Achievements</span>
                </div>
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
