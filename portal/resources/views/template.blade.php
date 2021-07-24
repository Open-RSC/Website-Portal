<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('includes.header')
<body>

<nav>
    <label for="drop" class="toggle">
        <i class="fas fa-bars"></i>
        Navigation
    </label>

    <!-- Left side of Navbar -->
    <input type="checkbox" id="drop" style="display: none !important;"/>
    <ul class="menu">
        <li><a href="{/{ route('home') }}">Home</a></li>
        <li>
            <label for="drop-1" class="toggle">Download <i class="fas fa-caret-down"></i></label>
            <a href="#">Download</a>
            <input type="checkbox" id="drop-1" style="display: none !important;"/>
            <ul>
                <li><a href="{{ asset('downloads/OpenRSC%20Launcher.exe') }}">Windows</a></li>
                <li><a href="{{ asset('downloads/OpenRSC.jar') }}">Mac / Linux</a></li>
                <li><a href="{{ asset('downloads/openrsc.apk') }}">Android App</a></li>
                <li>
                    <a href="https://gitlab.openrsc.com/open-rsc/Single-Player/-/releases">Single
                        Player</a></li>
                <li><a href="https://gitlab.openrsc.com/open-rsc/Game" target="_blank">Source Code</a></li>
            </ul>

        </li>
        <li>
            <label for="drop-2" class="toggle">Community <i class="fas fa-caret-down"></i></label>
            <a href="#">Community</a>
            <input type="checkbox" id="drop-2" style="display: none !important;"/>
            <ul>
                <li><a href="https://discord.gg/ABdFCqn" target="_blank">
                        <i class="fab fa-discord"></i>
                        Discord</a></li>
                <li><a href="https://orsc.dev" target="_blank">
                        <i class="fab fa-gitlab"></i>
                        Source Code</a></li>
                <li><a href="https://www.reddit.com/r/rsc" target="_blank">
                        <i class="fab fa-reddit-alien"></i>
                        Reddit</a></li>
            </ul>
        </li>
        <li><a href="/hiscores">Highscores</a></li>
        <li>
            <label for="drop-3" class="toggle">Information <i class="fas fa-caret-down"></i></label>
            <a href="#">Information</a>
            <input type="checkbox" id="drop-3" style="display: none !important;"/>
            <ul>
                <li><a href="{/{ route('Frequently Asked Questions') }}">FAQ</a></li>
                <li><a href="{/{ route('Rules') }}">Rules</a></li>
                <li><a href="{/{ route('/player/shar/bank') }}">Shar's Bank</a></li>
                <li><a href="{/{ route('Statistics') }}">Game Statistics</a></li>
            </ul>
        </li>
        <li>
            <label for="drop-4" class="toggle">Guides <i class="fas fa-caret-down"></i></label>
            <a href="#">Guides</a>
            <input type="checkbox" id="drop-4" style="display: none !important;"/>
            <ul>
                <li><a href="{/{ route('World Map') }}">World Map</a></li>
                <li><a href="{/{ route('Wilderness Map') }}">Wilderness Map</a></li>
                <li><a href="{/{ route('Quests') }}">Quest List</a></li>
                <li><a href="{/{ route('Mini Games') }}">Minigames</a></li>
                <li><a href="{/{ route('Items') }}">Item Database</a></li>
                <li><a href="{/{ route('Monster Database') }}">NPC Database</a></li>
            </ul>
        </li>
        <li>
            <label for="drop-5" class="toggle">Reports <i class="fas fa-caret-down"></i></label>
            <a href="#">Reports</a>
            <input type="checkbox" id="drop-5" style="display: none !important;"/>
            <ul>
                <li><a href="https://gitlab.openrsc.com/open-rsc/Game/issues" target="_blank">Bug Reports</a></li>
            </ul>
        </li>
        <li><a href="{/{ route('World Map') }}">Live Map</a></li>
        @if(Auth::user())
            <li>
                <label for="drop-5" class="toggle">Staff <i class="fas fa-caret-down"></i></label>
                <a href="#">Staff</a>
                <input type="checkbox" id="drop-5" style="display: none !important;"/>
                <ul>
                    <li><a href="{{ route('chat_logs') }}">Chat Logs</a></li>
                    <li><a href="{{ route('pm_logs') }}">PM Logs</a></li>
                    <li><a href="{{ route('trade_logs') }}">Trade Logs</a></li>
                    <li><a href="{{ route('generic_logs') }}">Generic Logs</a></li>
                    <li><a href="{{ route('shop_logs') }}">Shop Logs</a></li>
                @if(str_contains(url()->current(), '/hiscores/cabbage') || str_contains(url()->current(), '/hiscores/coleslaw')) <!-- fix this later -->
                    <li><a href="{{ route('auction_logs') }}">Auction Logs</a></li>
                    @endif
                    <li><a href="{{ route('live_feed_logs') }}">Live Feed Logs</a></li>
                    <li><a href="{{ route('player_cache_logs') }}">Player Cache Logs</a></li>
                    <li><a href="{{ route('report_logs') }}">Report Logs</a></li>
                    <li><a href="{{ route('staff_logs') }}">Staff Logs</a></li>
                </ul>
            </li>
        @endif
    </ul>

    <!-- Right side of Navbar -->
    <ul class="menu">
        <!-- Authentication Links -->
        @guest
            <li><a href="{/{ route('login') }}">{{ __('Staff Login') }}</a></li>
            @if (Route::has('staff_register'))
                <li><a href="{{ route('register') }}">{{ __('Register') }}</a></li>
            @endif
        @else
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
    </ul>
</nav>

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
                <a class="c text-left" href="{{ route('World Map') }}"><i class="fas fa-map"></i> Live World Map</a>
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
            <span class="flex-auto p-2">
                <a class="c" href="/login">Staff Login</a>
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
