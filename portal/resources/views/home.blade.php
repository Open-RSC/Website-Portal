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
                        <button class="text-primary accordion-button table-transparent collapsed" type="button"
                                data-bs-toggle="collapse" data-bs-target="#preservationInfo" aria-expanded="false"
                                aria-controls="preservationInfo">
                            RSC Preservation
                        </button>
                    </h2>
                    <div id="preservationInfo" class="accordion-collapse collapse" aria-labelledby="rscPreservation"
                         data-bs-parent="#serversInfo">
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
                        <button class="text-primary accordion-button table-transparent collapsed" type="button"
                                data-bs-toggle="collapse" data-bs-target="#cabbageInfo" aria-expanded="false"
                                aria-controls="cabbageInfo">
                            RSC Cabbage
                        </button>
                    </h2>
                    <div id="cabbageInfo" class="accordion-collapse collapse" aria-labelledby="rscCabbage"
                         data-bs-parent="#serversInfo">
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

        <!-- Alt Features -->
        <div class="text-left pl-3 pr-3 no-padding">
            <table id="List" class="container bg-black">
                <tr>
                    <td>
                        <img height="6" src="{{ asset('img/home/fm_topleft.gif') }}" width="6" alt="">
                    </td>
                    <td style="background-image:url('/img/home/fm_top2.gif');">
                        <img height="6" src="{{ asset('img/home/blank.gif') }}" width="1" alt="">
                    </td>
                    <td>
                        <img height="6" src="{{ asset('img/home/fm_topright.gif') }}" width="6" alt="">
                    </td>
                </tr>
                <tr>
                    <td style="background-image:url('/img/home/fm_left.gif'); width: 6px;">
                        <img height="1" src="{{ asset('img/home/blank.gif') }}" width="6" alt="">
                    </td>
                    <td>
                        <div class="text-center container">
                            <span class="h5 text-white text-center">Services</span>
                        </div>
                        <div>
                            <table id="List" class="container">
                                <tr>
                                    <td style="min-width: 48px; max-width: 77px;" class="text-center align-middle">
                                        <a href="{{ asset('login') }}"><img class="no-margin"
                                                                            src="{{ asset('img/home/mms_accman.jpg') }}"
                                                                            border="0"></a>
                                    </td>
                                    <td class="valign-top text-center align-middle">
                                        <a class="btn btn-jag-grey" href="{{ asset('login') }}" role="button">Account
                                            Management</a>
                                        <br>
                                        <p>Manage your Password and Recovery Details.<br><a
                                                    class="link-success underline" href="{{ asset('login') }}">Click
                                                Here</a></p>
                                    </td>
                                </tr>
                            </table>
                            <table id="List" class="container">
                                <tr>
                                    <td style="min-width: 48px; max-width: 77px;" class="text-center align-middle">
                                        <a href="{{ asset('login') }}">
                                            <img class="no-margin" src="{{ asset('img/home/mms_passwordsupport.jpg') }}"
                                                 alt="">
                                        </a>
                                    </td>
                                    <td class="valign-top text-center align-middle">
                                        <a class="btn btn-jag-grey" href="{{ asset('login') }}" role="button">
                                            Password Support
                                        </a>
                                        <p>
                                            If you lose/forget your password help is at hand.
                                            <a class="link-success underline" href="{{ asset('login') }}">
                                                Click Here
                                            </a>
                                        </p>
                                    </td>
                                </tr>
                            </table>
                            <table id="List" class="container">
                                <tr>
                                    <td style="min-width: 48px; max-width: 77px;" class="text-center align-middle">
                                        <a href="{{ asset('forums') }}">
                                            <img class="no-margin" src="{{ asset('img/home/mms_forums.jpg') }}" alt="">
                                        </a>
                                    </td>
                                    <td class="valign-top text-center align-middle">
                                        <a class="btn btn-jag-grey" href="{{ asset('forums') }}" role="button">
                                            Forums
                                        </a>
                                        <p>
                                            Discuss the game with fellow players!
                                            <a class="link-success underline" href="{{ asset('forums') }}">
                                                Click Here
                                            </a>
                                        </p>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </td>
                    <td style="background-image:url('/img/home/fm_right.gif'); width: 6px;">
                        <img height="1" src="{{ asset('img/home/blank.gif') }}" width="6" alt="">
                    </td>
                </tr>
                <tr>
                    <td>
                        <img height="6" src="{{ asset('img/home/fm_bottomleft.gif') }}" width="6" alt="">
                    </td>
                    <td style="background-image:url('/img/home/fm_bottom2.gif');">
                        <img height="6" src="{{ asset('img/home/blank.gif') }}" width="1" alt="">
                    </td>
                    <td>
                        <img height="6" src="{{ asset('img/home/fm_bottomright.gif') }}" width="6" alt="">
                    </td>
                </tr>
            </table>
        </div>

    </div>

    <!-- Center column -->
    <div class="col w-50 text-center no-padding">

        <!-- Main Features -->
        <div class="text-left pl-3 pr-3 no-padding">
            <table id="List" class="container bg-black">
                <tr>
                    <td>
                        <img height="6" src="{{ asset('img/home/fm_topleft.gif') }}" width="6" alt="">
                    </td>
                    <td style="background-image:url('/img/home/fm_top2.gif');">
                        <img height="6" src="{{ asset('img/home/blank.gif') }}" width="1" alt="">
                    </td>
                    <td>
                        <img height="6" src="{{ asset('img/home/fm_topright.gif') }}" width="6" alt="">
                    </td>
                </tr>
                <tr>
                    <td style="background-image:url('/img/home/fm_left.gif'); width: 6px;">
                        <img height="1" src="{{ asset('img/home/blank.gif') }}" width="6" alt="">
                    </td>
                    <td>
                        <div class="text-center container">
                            <span class="h5 text-white text-center">Main Features</span>
                        </div>
                        <div>
                            <table id="List" class="container">
                                <tr>
                                    <td style="min-width: 48px; max-width: 77px;" class="text-center align-middle">
                                        <a href="{{ asset('play') }}">
                                            <img class="no-margin" src="{{ asset('img/home/mms_rsclassic.jpg') }}"
                                                 alt="">
                                        </a>
                                    </td>
                                    <td class="valign-top text-center align-middle">
                                        <a class="btn btn-jag-red" href="{{ asset('play') }}" role="button">
                                            Play Game
                                            (Existing User)
                                        </a>
                                        <p>
                                            Play on our hosted Open RuneScape Classic servers now!
                                            <a class="link-success underline" href="{{ asset('play') }}">
                                                Click Here
                                            </a>
                                        </p>
                                    </td>
                                </tr>
                            </table>
                            <table id="List" class="container">
                                <tr>
                                    <td style="min-width: 48px; max-width: 77px;" class="text-center align-middle">
                                        <a href="{{ asset('register') }}">
                                            <img class="no-margin" src="{{ asset('img/home/mm_player.jpg') }}" alt="">
                                        </a>
                                    </td>
                                    <td class="valign-top text-center align-middle">
                                        <a class="btn btn-jag-red" href="{{ asset('register') }}" role="button">
                                            Create Account
                                            (New User)
                                        </a>
                                        <p>
                                            Create a free account for both the game & website.
                                            <a class="link-success underline" href="{{ asset('register') }}">
                                                Click Here
                                            </a>
                                        </p>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </td>
                    <td style="background-image:url('/img/home/fm_right.gif'); width: 6px;">
                        <img height="1" src="{{ asset('img/home/blank.gif') }}" width="6" alt="">
                    </td>
                </tr>
                <tr>
                    <td>
                        <img height="6" src="{{ asset('img/home/fm_bottomleft.gif') }}" width="6" alt="">
                    </td>
                    <td style="background-image:url('/img/home/fm_bottom2.gif');">
                        <img height="6" src="{{ asset('img/home/blank.gif') }}" width="1" alt="">
                    </td>
                    <td>
                        <img height="6" src="{{ asset('img/home/fm_bottomright.gif') }}" width="6" alt="">
                    </td>
                </tr>
            </table>
        </div>

        <!-- News section -->
        <div class="text-left pl-3 pr-3 no-padding">
            <table id="List" class="container bg-black">
                <tr>
                    <td>
                        <img height="6" src="{{ asset('img/home/fm_topleft.gif') }}" width="6" alt="">
                    </td>
                    <td style="background-image:url('/img/home/fm_top2.gif');">
                        <img height="6" src="{{ asset('img/home/blank.gif') }}" width="1" alt="">
                    </td>
                    <td>
                        <img height="6" src="{{ asset('img/home/fm_topright.gif') }}" width="6" alt="">
                    </td>
                </tr>
                <tr>
                    <td style="background-image:url('/img/home/fm_left.gif'); width: 6px;">
                        <img height="1" src="{{ asset('img/home/blank.gif') }}" width="6" alt="">
                    </td>
                    <td>
                        <div class="text-center container">
                            <span class="h5 text-white text-center">News and Updates</span>
                        </div>
                        <table id="List" class="container">
                            <tr>
                                <td style="min-width: 48px; max-width: 77px;">
                                    <a href="{{ asset('news') }}">
                                        <img class="no-margin" src="{{ asset('img/home/mm_scroll.jpg') }}" alt="">
                                    </a>
                                </td>
                                <td class="valign-top">
                                    <table id="List" class="container">
                                        @foreach ($news_feed as $news)
                                            <tr>
                                                <td class="clickable-row pb-3 w-75"
                                                    data-href="http://board.localhost/viewtopic.php?f={{ $news->forum_id }}&p={{ $news->post_id }}">
                                                    <span class="text-white">
                                                        {{ $news->post_subject }}
                                                    </span>
                                                    <span class="d-block">
                                                        @php
                                                            echo Str::limit(strip_tags($news->post_text), 150);
                                                        @endphp
                                                        <a class="text-success underline" href="http://board.localhost/viewtopic.php?f={{ $news->forum_id }}&p={{ $news->post_id }}">
                                                            Read More...
                                                        </a>
                                                    </span>
                                                </td>
                                                <td class="w-25">
                                                    <span class="text-white float-right">
                                                        @php
                                                            $timestamp = $news->post_time;
                                                            $dt = new DateTime();
                                                            echo $dt->setTimestamp( $timestamp )->format("d-M-Y ");
                                                        @endphp
                                                    </span>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </table>
                                </td>
                            </tr>
                        </table>
                        <div class="text-center container no-padding">
                            <p>To view a full list of news and updates,
                                <a class="link-success underline"
                                   target="_blank" href="http://board.localhost/viewforum.php?f={{ $news->forum_id }}">
                                    Click Here
                                </a>
                            </p>
                        </div>
                    </td>
                    <td style="background-image:url('/img/home/fm_right.gif'); width: 6px;">
                        <img height="1" src="{{ asset('img/home/blank.gif') }}" width="6" alt="">
                    </td>
                </tr>
                <tr>
                    <td>
                        <img height="6" src="{{ asset('img/home/fm_bottomleft.gif') }}" width="6" alt="">
                    </td>
                    <td style="background-image:url('/img/home/fm_bottom2.gif');">
                        <img height="6" src="{{ asset('img/home/blank.gif') }}" width="1" alt="">
                    </td>
                    <td>
                        <img height="6" src="{{ asset('img/home/fm_bottomright.gif') }}" width="6" alt="">
                    </td>
                </tr>
            </table>
        </div>

        <!-- Game Information -->
        <div class="text-left pl-3 pr-3 no-padding">
            <table id="List" class="container bg-black">
                <tr>
                    <td>
                        <img height="6" src="{{ asset('img/home/fm_topleft.gif') }}" width="6" alt="">
                    </td>
                    <td style="background-image:url('/img/home/fm_top2.gif');">
                        <img height="6" src="{{ asset('img/home/blank.gif') }}" width="1" alt="">
                    </td>
                    <td>
                        <img height="6" src="{{ asset('img/home/fm_topright.gif') }}" width="6" alt="">
                    </td>
                </tr>
                <tr>
                    <td style="background-image:url('/img/home/fm_left.gif'); width: 6px;">
                        <img height="1" src="{{ asset('img/home/blank.gif') }}" width="6" alt="">
                    </td>
                    <td>
                        <div class="text-center container">
                            <span class="h5 text-white text-center">Game Information</span>
                        </div>
                        <div>
                            <table id="List" class="container">
                                <tr>
                                    <td style="min-width: 48px; max-width: 77px;" class="text-center align-middle">
                                        <a href="http://rsc.wiki">
                                            <img class="no-margin" src="{{ asset('img/home/mm_rscwiki.png') }}" alt="">
                                        </a>
                                    </td>
                                    <td class="valign-top text-center align-middle">
                                        <a class="btn btn-jag-grey" href="http://rsc.wiki" role="button">RSC Wiki</a>
                                        <p>Everything you need to know to play RuneScape Classic
                                            <a class="link-success underline" href="http://rsc.wiki">
                                                Click Here
                                            </a>
                                        </p>
                                    </td>
                                </tr>
                            </table>
                            <table id="List" class="container">
                                <tr>
                                    <td style="min-width: 48px; max-width: 77px;" class="text-center align-middle">
                                        <a href="{{ asset('highscores') }}">
                                            <img class="no-margin" src="{{ asset('img/home/mm_chalice.jpg') }}" alt="">
                                        </a>
                                    </td>
                                    <td class="valign-top text-center align-middle">
                                        <a class="btn btn-jag-grey" href="{{ asset('highscores') }}" role="button">
                                            Full Hiscores
                                        </a>
                                        <p>Is your character in the top 100,000?
                                            <a class="link-success underline" href="{{ asset('highscores') }}">
                                                Click Here
                                            </a>
                                        </p>
                                    </td>
                                </tr>
                            </table>
                            <table id="List" class="container">
                                <tr>
                                    <td style="min-width: 48px; max-width: 77px;" class="text-center align-middle">
                                        <a href="{{ asset('worldmap') }}">
                                            <img class="no-margin" src="{{ asset('img/home/mm_worldmap.jpg') }}" alt="">
                                        </a>
                                    </td>
                                    <td class="valign-top text-center align-middle">
                                        <a class="btn btn-jag-grey" href="{{ asset('worldmap') }}" role="button">
                                            World Map
                                        </a>
                                        <p>Great for finding your way around.
                                            <a class="link-success underline" href="{{ asset('worldmap') }}">
                                                Click Here
                                            </a>
                                        </p>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </td>
                    <td style="background-image:url('/img/home/fm_right.gif'); width: 6px;">
                        <img height="1" src="{{ asset('img/home/blank.gif') }}" width="6" alt="">
                    </td>
                </tr>
                <tr>
                    <td>
                        <img height="6" src="{{ asset('img/home/fm_bottomleft.gif') }}" width="6" alt="">
                    </td>
                    <td style="background-image:url('/img/home/fm_bottom2.gif');">
                        <img height="6" src="{{ asset('img/home/blank.gif') }}" width="1" alt="">
                    </td>
                    <td>
                        <img height="6" src="{{ asset('img/home/fm_bottomright.gif') }}" width="6" alt="">
                    </td>
                </tr>
            </table>
        </div>

    </div>

    <!-- Right column -->
    <div class="col w-25 float-right"
         style="min-width: 350px; max-width: 350px; margin-left: auto; margin-right: auto;">
        <div class="border-top border-info border-bottom pt-1 pb-1">

            <!-- Achievements box -->
            <div class="text-left pl-3 pr-3 border-info border-bottom pt-1 pb-1 bg-black">
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

            <!-- Other Features -->
            <div class="text-left pl-3 pr-3 no-padding">
                <table id="List" class="container bg-black">
                    <tr>
                        <td>
                            <img height="6" src="{{ asset('img/home/fm_topleft.gif') }}" width="6" alt="">
                        </td>
                        <td style="background-image:url('/img/home/fm_top2.gif');">
                            <img height="6" src="{{ asset('img/home/blank.gif') }}" width="1" alt="">
                        </td>
                        <td>
                            <img height="6" src="{{ asset('img/home/fm_topright.gif') }}" width="6" alt="">
                        </td>
                    </tr>
                    <tr>
                        <td style="background-image:url('/img/home/fm_left.gif'); width: 6px;">
                            <img height="1" src="{{ asset('img/home/blank.gif') }}" width="6" alt="">
                        </td>
                        <td>
                            <div class="text-center container">
                                <span class="h5 text-white text-center">Other Features</span>
                            </div>
                            <div>
                                <table id="List" class="container">
                                    <tr>
                                        <td style="min-width: 48px; max-width: 77px;" class="text-center align-middle">
                                            <a href="{{ asset('login') }}">
                                                <img class="no-margin" src="{{ asset('img/home/mms_inbox.jpg') }}"
                                                     alt="">
                                            </a>
                                        </td>
                                        <td class="valign-top text-center align-middle">
                                            <a class="btn btn-jag-grey" href="{{ asset('login') }}" role="button">Message
                                                Centre</a>
                                            <p>Your messages from our staff.
                                                <a class="link-success underline" href="{{ asset('login') }}">
                                                    Click Here
                                                </a>
                                            </p>
                                        </td>
                                    </tr>
                                </table>
                                <table id="List" class="container">
                                    <tr>
                                        <td style="min-width: 48px; max-width: 77px;" class="text-center align-middle">
                                            <a href="{{ asset('faq') }}">
                                                <img class="no-margin" src="{{ asset('img/home/mms_faq.jpg') }}" alt="">
                                            </a>
                                        </td>
                                        <td class="valign-top text-center align-middle">
                                            <a class="btn btn-jag-grey" href="{{ asset('faq') }}"
                                               role="button">F.A.Q.</a>
                                            <p>
                                                Answers to Frequently Asked Questions.
                                                <a class="link-success underline" href="{{ asset('faq') }}">
                                                    Click Here
                                                </a>
                                            </p>
                                        </td>
                                    </tr>
                                </table>
                                <table id="List" class="container">
                                    <tr>
                                        <td style="min-width: 48px; max-width: 77px;" class="text-center align-middle">
                                            <a href="{{ asset('login') }}">
                                                <img class="no-margin" src="{{ asset('img/home/mms_support.jpg') }}"
                                                     alt="">
                                            </a>
                                        </td>
                                        <td class="valign-top text-center align-middle">
                                            <a class="btn btn-jag-grey" href="{{ asset('login') }}" role="button">
                                                Support
                                            </a>
                                            <p>
                                                Questions or Comments?
                                                Contact our staff.
                                                <a class="link-success underline" href="{{ asset('login') }}">
                                                    Click Here
                                                </a>
                                            </p>
                                        </td>
                                    </tr>
                                </table>
                                <table id="List" class="container">
                                    <tr>
                                        <td style="min-width: 48px; max-width: 77px;" class="text-center align-middle">
                                            <a href="https://2009scape.org/">
                                                <img class="no-margin" src="{{ asset('img/home/mm_sword.jpg') }}"
                                                     alt="">
                                            </a>
                                        </td>
                                        <td class="valign-top text-center align-middle">
                                            <a class="btn btn-jag-grey" href="https://2009scape.org/" role="button">
                                                2009Scape
                                            </a>
                                            <p>
                                                Experience RS2 in its peak (2009)
                                                <a class="link-success underline" href="https://2009scape.org/">
                                                    Click Here
                                                </a>
                                            </p>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </td>
                        <td style="background-image:url('/img/home/fm_right.gif'); width: 6px;">
                            <img height="1" src="{{ asset('img/home/blank.gif') }}" width="6" alt="">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <img height="6" src="{{ asset('img/home/fm_bottomleft.gif') }}" width="6" alt="">
                        </td>
                        <td style="background-image:url('/img/home/fm_bottom2.gif');">
                            <img height="6" src="{{ asset('img/home/blank.gif') }}" width="1" alt="">
                        </td>
                        <td>
                            <img height="6" src="{{ asset('img/home/fm_bottomright.gif') }}" width="6" alt="">
                        </td>
                    </tr>
                </table>
            </div>

        </div>
    </div>
@endsection
