<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('includes.header')
<body>

<div class="navbar-expand-xxl pt-2 mr-1">
    <div class="e text-center flex-row" style="background:black; width:596px;">
        <span class="flex-auto p-2">
            <a class="c" href="/">Home</a>
        </span>
        <span class="flex-auto p-2 dropdown">
            <a class="c" href="#">Play Now <i class="fas fa-caret-down"></i></a>
            <span class="p-2 dropdown-content" style="background:black; width:140px;">
                <a class="c text-left" href="{{ asset('downloads/OpenRSC.jar') }}">
                    <i class="fas fa-download"></i>&nbsp; Game Launcher
                </a>
                <a class="c text-left" href="{{ asset('downloads/openrsc.apk') }}">
                    <i class="fab fa-android"></i>&nbsp; Android
                </a>
                <a class="c text-left" target="_blank" href="https://gitlab.com/open-runescape-classic/core">
                    <i class="fab fa-gitlab"></i>&nbsp; Source Code
                </a>
            </span>
        </span>
        <span class="flex-auto p-2 dropdown">
            <a class="c" href="#">Community <i class="fas fa-caret-down"></i></a>
            <span class="p-2 dropdown-content" style="background:black; width:130px;">
                <a class="c text-left" href="/board"><i class="far fa-comment-alt"></i> Forums</a>
                <a class="c text-left" href="https://discord.gg/ABdFCqn" target="_blank"><i class="fab fa-discord"></i> Discord</a>
                <a class="c text-left" href="https://www.reddit.com/r/rsc" target="_blank"><i
                            class="fab fa-reddit-alien"></i> Reddit</a>
            </span>
        </span>
        <span class="flex-auto p-2 dropdown">
            <a class="c" href="#">Hiscores <i class="fas fa-caret-down"></i></a>
            <span class="p-2 dropdown-content" style="background:black; width:130px;">
                <a class="c text-left" href="/hiscores/preservation">RSC Preservation</a>
                <a class="c text-left" href="/hiscores/cabbage">RSC Cabbage</a>
                <a class="c text-left" href="/hiscores/uranium">RSC Uranium</a>
                <a class="c text-left" href="/hiscores/coleslaw">RSC Coleslaw</a>
                <!--<a class="c text-left" href="/hiscores/openpk">Open PK</a>-->
                <!--<a class="c text-left" href="/hiscores/2001scape">2001Scape</a>-->
            </span>
        </span>
        <span class="flex-auto p-2 dropdown">
            <a class="c" href="#">Guides <i class="fas fa-caret-down"></i></a>
            <span class="p-2 dropdown-content" style="background:black; width:150px;">
                <a class="c text-left" href="{{ route('Wilderness Map') }}"><i
                            class="fas fa-map"></i> Wilderness Map</a>
                <a class="c text-left" href="{{ route('Monster Database') }}"><i class="fas fa-book"></i> Monster Database</a>
                <a class="c text-left" href="{{ route('Items') }}"><i class="fas fa-book"></i> Item Database</a>
                <a class="c text-left" href="{{ route('Quests') }}"><i class="fas fa-question"></i> Quests</a>
                <a class="c text-left" href="{{ route('Mini Games') }}"><i class="fas fa-question"></i> Mini Games</a>
                <a class="c text-left" target="_blank" href="https://classic.runescape.wiki">
                    <i class="fab fa-wikipedia-w"></i> RSC Wiki
                </a>
                <a class="c text-left" href="/wiki">
                    <i class="fab fa-wikipedia-w"></i> OpenRSC Wiki
                </a>
            </span>
        </span>
        <span class="flex-auto p-2"><a href="https://gitlab.com/open-runescape-classic/core/-/issues" target="_blank">Bug Reports</a>
        </span>
        @guest
            <span class="flex-auto p-2 dropdown">
                <a class="c" href="#">Live Maps <i class="fas fa-caret-down"></i></a>
                    <span class="p-2 dropdown-content" style="background:black; width:150px;">
                        <a class="c text-left" href="/worldmap/preservation"><i
                                    class="fas fa-map"></i> RSC Preservation</a>
                        <a class="c text-left" href="/worldmap/cabbage"><i
                                    class="fas fa-map"></i> RSC Cabbage</a>
                        <a class="c text-left" href="/worldmap/uranium"><i
                                    class="fas fa-map"></i> RSC Uranium</a>
                        <a class="c text-left" href="/worldmap/coleslaw"><i
                                    class="fas fa-map"></i> RSC Coleslaw</a>
                    </span>
            </span>
        @else
            <span class="flex-auto p-2 dropdown">
            <a class="c" href="#">Staff Links <i class="fas fa-caret-down"></i></a>
                <span class="p-2 dropdown-content" style="background:black; width:150px;">
                    <a class="c text-left" href="{{ route('chat_logs') }}">Chat Logs</a>
                    <a class="c text-left" href="{{ route('pm_logs') }}">PM Logs</a>
                    <a class="c text-left" href="{{ route('trade_logs') }}">Trade Logs</a>
                    <a class="c text-left" href="{{ route('generic_logs') }}">Generic Logs</a>
                    <a class="c text-left" href="{{ route('shop_logs') }}">Shop Logs</a>
                    @if(str_contains(url()->current(), '/hiscores/cabbage') || str_contains(url()->current(), '/hiscores/coleslaw')) <!-- fix this later -->
                        <a class="c text-left" href="{{ route('auction_logs') }}">Auction Logs</a>
                        @endif
                    <a class="c text-left" href="{{ route('live_feed_logs') }}">Live Feed Logs</a>
                    <a class="c text-left" href="{{ route('player_cache_logs') }}">Player Cache Logs</a>
                    <a class="c text-left" href="{{ route('report_logs') }}">Report Logs</a>
                    <a class="c text-left" href="{{ route('staff_logs') }}">Staff Logs</a>
                    <input type="checkbox" id="drop-5" style="display: none !important;"/>
                    <a class="c text-left" href="{{ route('Logout') }}"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                    <form id="logout-form" action="{{ route('Logout') }}" method="POST"
                          style="display: none;">
                        @csrf
                    </form>
                </span>
            </span>

            <li>
                <label for="drop-5" class="toggle">{{ Auth::user()->username }} <i
                            class="fas fa-caret-down"></i></label>
                <a href="#">{{ Auth::user()->username }}</a>
                <input type="checkbox" id="drop-5" style="display: none !important;"/>
                <ul>
                    <li><a href="{/{ route('logout') }}"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                    </li>
                </ul>
                <form id="logout-form" action="{/{ route('logout') }}" method="POST"
                      style="display: none;">
                    @csrf
                </form>
            </li>
        @endguest
    </div>
</div>

@if(Route::currentRouteName() == 'World Map')
    <table style="width: 250px; background: black; padding: 4px;">
        <tbody>
        <tr>
            <td class=e>
                <div class="text-center">
                    @if(Route::currentRouteName())
                        <b>{{ preg_replace("/[^A-Za-z0-9 ]/", " ", Route::currentRouteName()) }}</b>
                    @else
                        {{ ucfirst($subpage) }}
                    @endif
                    <span class="d-block">
                        <a class="c" href="{{ route('Home') }}">Main menu</a>
                    </span>
                </div>
            </td>
        </tr>
        </tbody>
    </table>
    <div class="pt-2"></div>
    @yield('content')

@elseif(Route::currentRouteName() == 'Wilderness Map')
    <table style="width: 250px; background: black; padding: 4px;">
        <tbody>
        <tr>
            <td class=e>
                <div class="text-center">
                    @if(Route::currentRouteName())
                        <b>{{ preg_replace("/[^A-Za-z0-9 ]/", " ", Route::currentRouteName()) }}</b>
                    @else
                        {{ ucfirst($subpage) }}
                    @endif
                    <span class="d-block">
                        <a class="c" href="{{ route('Home') }}">Main menu</a>
                    </span>
                </div>
            </td>
        </tr>
        </tbody>
    </table>
    <div class="pt-2"></div>
    @yield('content')

@else
    <main>
        <section class="top-border">
            <div class="top-left-border"></div>
            <div class="top-middle-border"></div>
            <div class="top-right-border"></div>
        </section>

        <section class="middle">
            <div class="mid-left-border"></div>
            <div class="middle-content">
                @if(Route::currentRouteName() != 'Home')
                    <table style="width: 250px; background: black; padding: 4px;">
                        <tbody>
                        <tr>
                            <td class=e>
                                <div class="text-center">
                                    @if(str_contains(url()->current(), '/player'))
                                        <b>RuneScape Hiscores</b>
                                    @elseif(Route::currentRouteName())
                                        <b>{{ preg_replace("/[^A-Za-z0-9 ]/", " ", Route::currentRouteName()) }}</b>
                                    @elseif(in_array($subpage, array('skill_total', 'attack', 'defense', 'strength', 'hits', 'ranged', 'prayer', 'magic', 'cooking', 'fletching', 'fishing', 'firemaking', 'crafting', 'smithing', 'mining', 'agility', 'thieving', 'runecraft', 'harvesting')))
                                        <b>RuneScape Hiscores</b>
                                    @else
                                        <b>{{ ucfirst($subpage) }}</b>
                                    @endif
                                    <div class="d-block">
                                        @if(str_contains(url()->current(), '/player'))
                                            <a class="c" href="{{ route('Home') }}">
                                                Main menu
                                            </a> -
                                            <a class="c" href="/hiscores/{{ $db ?? 'preservation' }}">
                                                All Hiscores
                                            </a>
                                        @else
                                            <a class="c" href="{{ route('Home') }}">Main menu</a>
                                        @endif
                                    </div>
                                    @if(str_contains(url()->current(), '/hiscores/cabbage') || str_contains(url()->current(), '/hiscores/coleslaw'))
                                        @if(in_array($subpage ?? '', array('skill_total', 'attack', 'defense', 'strength', 'hits', 'ranged', 'prayer', 'magic', 'cooking', 'fletching', 'fishing', 'firemaking', 'crafting', 'smithing', 'mining', 'agility', 'thieving', 'runecraft', 'harvesting')) || route('RuneScape Hiscores',$db))
                                            <div class="d-block">
                                                @if($subpage ?? '' == 'skill_total')
                                                    <a class="c" href="/hiscores/{{ $db ?? 'preservation' }}">All</a> |
                                                    <a class="c"
                                                       href="/hiscores/{{ $db ?? 'preservation' }}/{{ $subpage ?? '' }}/1">Ironman</a>
                                                    |
                                                    <a class="c"
                                                       href="/hiscores/{{ $db ?? 'preservation' }}/{{ $subpage ?? '' }}/2">Hardcore</a>
                                                    |
                                                    <a class="c"
                                                       href="/hiscores/{{ $db ?? 'preservation' }}/{{ $subpage ?? '' }}/3">Ultimate</a>
                                                @else
                                                    <a class="c" href="/hiscores/{{ $db ?? 'preservation' }}">All</a> |
                                                    <a class="c"
                                                       href="/hiscores/{{ $db ?? 'preservation' }}/skill_total/1">Ironman</a>
                                                    |
                                                    <a class="c"
                                                       href="/hiscores/{{ $db ?? 'preservation' }}/skill_total/2">Hardcore</a>
                                                    |
                                                    <a class="c"
                                                       href="/hiscores/{{ $db ?? 'preservation' }}/skill_total/3">Ultimate</a>
                                                @endif
                                            </div>
                                        @endif
                                    @endif
                                </div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                    <div class="pt-3"></div>
                @endif
                @yield('content')
            </div>
            <div class="pt-2"></div>
            <div class="mid-right-border"></div>
        </section>
        <section class="bottom-border">
            <div class="bottom-left-border"></div>
            <div class="bottom-middle">
                <div class="copyright pt-2">
                    Open RuneScape Classic is not affiliated with RuneScape Classic nor JaGeX.<br>
                    To use our service you must agree to our
                    <a class="c" href="{{ route('Terms and Conditions') }}">Terms+Conditions</a>
                    +
                    <a class="c" href="{{ route('Privacy Policy') }}">Privacy policy</a>
                </div>
                <div class="bottom-middle-border"></div>
            </div>
            <div class="bottom-right-border"></div>
        </section>
    </main>
@endif

@include('includes.footerscripts')
</body>
</html>
