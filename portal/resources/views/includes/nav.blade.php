<div class="navbar-expand-xxl pt-2">
    <div class="e text-center flex-row" style="background:black;">
        <span class="flex-auto p-2">
            <a class="c" href="/">Home</a>
        </span>
        <span class="flex-auto p-2 dropdown">
            <a class="c" href="/playnow">Play Now</a>
        </span>
        <span class="flex-auto p-2 dropdown">
            <a class="c" href="#">Community <i class="fas fa-caret-down"></i></a>
            <span class="p-2 dropdown-content" style="background:black; width:130px;">
                <a class="c text-left" href="/board">
                    <i class="far fa-comment-alt"></i> Forums
                </a>
                <a class="c text-left" href="https://discord.gg/ABdFCqn" target="_blank">
                    <i class="fab fa-discord"></i> Discord
                </a>
                <a class="c text-left" href="https://www.reddit.com/r/rsc" target="_blank">
                    <i class="fab fa-reddit-alien"></i> Reddit
                </a>
                <a class="c text-left" target="_blank" href="https://gitlab.com/open-runescape-classic/core">
                    <i class="fab fa-gitlab"></i>&nbsp; Source Code
                </a>
            </span>
        </span>
        <span class="flex-auto p-2 dropdown">
            <a class="c" href="#">Hiscores <i class="fas fa-caret-down"></i></a>
            <span class="p-2 dropdown-content nav-hiscores-dropdown">
                <a class="c text-left" href="/hiscores/preservation">RSC Preservation</a>
                <a class="c text-left" href="/hiscores/cabbage">RSC Cabbage</a>
                <a class="c text-left" href="/hiscores/2001scape">2001Scape</a>
                <!--<a class="c text-left" href="/hiscores/openpk">Open PK</a>-->
                <a class="c text-left" href="/hiscores/uranium">RSC Uranium</a>
                <a class="c text-left" href="/hiscores/coleslaw">RSC Coleslaw</a>
            </span>
        </span>
        <span class="flex-auto p-2 dropdown">
            <a class="c" href="#">Guides <i class="fas fa-caret-down"></i></a>
            <span class="p-2 dropdown-content nav-guides-dropdown">
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
        <span class="flex-auto p-2">
            <a href="https://gitlab.com/open-runescape-classic/core/-/issues" target="_blank" class="c">Bug Reports</a>
        </span>
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
        @guest
            {{-- There's currently nothing guest-specific that staff also shouldn't access. --}}
        @else
            <span class="flex-auto p-2 dropdown">
                <a class="c" href="#">Server Item Stats <i class="fas fa-caret-down"></i></a>
                <span class="p-2 dropdown-content" style="background:black; width:160px;">
                    <a class="c text-left" href="{{ route('StatisticsOverview', 'preservation') }}">RSC Preservation Stats</a>
                    <a class="c text-left" href="{{ route('StatisticsOverview', 'cabbage') }}">RSC Cabbage Stats</a>
                    <a class="c text-left" href="{{ route('StatisticsOverview', 'uranium') }}">RSC Uranium Stats</a>
                    <a class="c text-left" href="{{ route('StatisticsOverview', 'coleslaw') }}">RSC Coleslaw Stats</a>
                    <a class="c text-left" href="{{ route('StatisticsOverview', 'openpk') }}">OpenPK Stats</a>
                    <!--<a class="c text-left" href="{-- route('chat_logs') --}">Chat Logs</a>-->
                    <!--<a class="c text-left" href="{-- route('pm_logs') --}"PM Logs</a>-->
                    <!--<a class="c text-left" href="{-- route('trade_logs') --}">Trade Logs</a>-->
                    <!--<a class="c text-left" href="{-- route('generic_logs') --}">Generic Logs</a>-->
                    <!--<a class="c text-left" href="{-- route('shop_logs') --}">Shop Logs</a>-->
                    @if(str_contains(url()->current(), '/hiscores/cabbage') || str_contains(url()->current(), '/hiscores/coleslaw')) <!-- fix this later -->
                        <!--<a class="c text-left" href="{-- route('auction_logs') --}">Auction Logs</a>-->
                        @endif
                    <!--<a class="c text-left" href="{-- route('live_feed_logs') --}">Live Feed Logs</a>
                    <a class="c text-left" href="{-- route('player_cache_logs') --}">Player Cache Logs</a>
                    <a class="c text-left" href="{-- route('report_logs') --}">Report Logs</a>
                    <a class="c text-left" href="{-- route('staff_logs') --}">Staff Logs</a>-->
                    <input type="checkbox" id="drop-5" style="display: none !important;"/>
                </span>
            </span>
        
            <span class="flex-auto p-2 dropdown">
                <a class="c" href="#">Chat Logs <i class="fas fa-caret-down"></i></a>
                <span class="p-2 dropdown-content" style="background:black; width:160px;">
                    <a class="c text-left" href="{{ route('chat_logs', 'preservation') }}">RSC Preservation Chat Logs</a>
                    <a class="c text-left" href="{{ route('chat_logs', 'cabbage') }}">RSC Cabbage Chat Logs</a>
                    <a class="c text-left" href="{{ route('chat_logs', '2001scape') }}">2001scape Chat Logs</a>
                    <a class="c text-left" href="{{ route('chat_logs', 'uranium') }}">RSC Uranium Chat Logs</a>
                    <a class="c text-left" href="{{ route('chat_logs', 'coleslaw') }}">RSC Coleslaw Chat Logs</a>
                    <a class="c text-left" href="{{ route('chat_logs', 'openpk') }}">OpenPK Chat Logs</a>
                    <input type="checkbox" id="drop-5" style="display: none !important;"/>
                </span>
            </span>
        
            <span class="flex-auto p-2 dropdown">
                <a class="c" href="#">PM Logs <i class="fas fa-caret-down"></i></a>
                <span class="p-2 dropdown-content" style="background:black; width:160px;">
                    <a class="c text-left" href="{{ route('pm_logs', 'preservation') }}">RSC Preservation PM Logs</a>
                    <a class="c text-left" href="{{ route('pm_logs', 'cabbage') }}">RSC Cabbage PM Logs</a>
                    <a class="c text-left" href="{{ route('pm_logs', '2001scape') }}">2001scape PM Logs</a>
                    <a class="c text-left" href="{{ route('pm_logs', 'uranium') }}">RSC Uranium PM Logs</a>
                    <a class="c text-left" href="{{ route('pm_logs', 'coleslaw') }}">RSC Coleslaw PM Logs</a>
                    <a class="c text-left" href="{{ route('pm_logs', 'openpk') }}">OpenPK PM Logs</a>
                    <input type="checkbox" id="drop-5" style="display: none !important;"/>
                </span>
            </span>
        
            <span class="flex-auto p-2 dropdown">
                <a class="c" href="#">Trade Logs <i class="fas fa-caret-down"></i></a>
                <span class="p-2 dropdown-content" style="background:black; width:160px;">
                    <a class="c text-left" href="{{ route('trade_logs', 'preservation') }}">RSC Preservation Trade Logs</a>
                    <a class="c text-left" href="{{ route('trade_logs', 'cabbage') }}">RSC Cabbage Trade Logs</a>
                    <a class="c text-left" href="{{ route('trade_logs', '2001scape') }}">2001scape Trade Logs</a>
                    <a class="c text-left" href="{{ route('trade_logs', 'uranium') }}">RSC Uranium Trade Logs</a>
                    <a class="c text-left" href="{{ route('trade_logs', 'coleslaw') }}">RSC Coleslaw Trade Logs</a>
                    <a class="c text-left" href="{{ route('trade_logs', 'openpk') }}">OpenPK Trade Logs</a>
                    <input type="checkbox" id="drop-5" style="display: none !important;"/>
                </span>
            </span>

            <span class="flex-auto p-2 dropdown">
                <a class="c" href="#">{{ Auth::user()->username }} <i class="fas fa-caret-down"></i></a>
                <span class="p-2 dropdown-content" style="background:black;">
                    <a href="{{ route('logout') }}"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                          style="display: none;">
                        @csrf
                    </form>
                </span>
            </span>
        @endguest
    </div>
</div>