<nav>
    <label for="drop" class="toggle">
        <i class="fas fa-bars"></i>
        Navigation
    </label>

    <!-- Left side of Navbar -->
    <input type="checkbox" id="drop" style="display: none !important;"/>
    <ul class="menu">
        <li><a href="{{ route('home') }}">Home</a></li>
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
        <li><a href="{{ asset('highscores') }}">Highscores</a></li>
        <li>
            <label for="drop-3" class="toggle">Information <i class="fas fa-caret-down"></i></label>
            <a href="#">Information</a>
            <input type="checkbox" id="drop-3" style="display: none !important;"/>
            <ul>
                <li><a href="{{ asset('faq') }}">FAQ</a></li>
                <li><a href="{{ asset('rules') }}">Rules</a></li>
                <li><a href="{{ asset('/player/shar/bank') }}">Shar's Bank</a></li>
                <li><a href="{{ asset('stats') }}">Game Statistics</a></li>
            </ul>
        </li>
        <li>
            <label for="drop-4" class="toggle">Guides <i class="fas fa-caret-down"></i></label>
            <a href="#">Guides</a>
            <input type="checkbox" id="drop-4" style="display: none !important;"/>
            <ul>
                <li><a href="{{ asset('quest_list') }}">Quest List</a></li>
                <li><a href="{{ asset('minigame_list') }}">Minigames</a></li>
                <li><a href="{{ asset('wilderness') }}">Wilderness Map</a></li>
                <li><a href="{{ route('items') }}">Item Database</a></li>
                <li><a href="{{ asset('npcs') }}">NPC Database</a></li>
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
        <li><a href="{{ asset('worldmap') }}">Live Map</a></li>
        @if(Auth::user())
            <li>
                <label for="drop-5" class="toggle">Staff <i class="fas fa-caret-down"></i></label>
                <a href="#">Staff</a>
                <input type="checkbox" id="drop-5" style="display: none !important;"/>
                <ul>
                    <li><a href="{{ asset('chat_logs') }}">Chat Logs</a></li>
                    <li><a href="{{ asset('pm_logs') }}">PM Logs</a></li>
                    <li><a href="{{ asset('trade_logs') }}">Trade Logs</a></li>
                    <li><a href="{{ asset('generic_logs') }}">Generic Logs</a></li>
                    <li><a href="{{ asset('shop_logs') }}">Shop Logs</a></li>
                    @if (Config::get('app.authentic') == false)
                        <li><a href="{{ asset('auction_logs') }}">Auction Logs</a></li>
                    @endif
                    <li><a href="{{ asset('live_feed_logs') }}">Live Feed Logs</a></li>
                    <li><a href="{{ asset('player_cache_logs') }}">Player Cache Logs</a></li>
                    <li><a href="{{ asset('report_logs') }}">Report Logs</a></li>
                    <li><a href="{{ asset('staff_logs') }}">Staff Logs</a></li>
                </ul>
            </li>
        @endif
    </ul>

    <!-- Right side of Navbar -->
    <ul class="menu">
        <!-- Authentication Links -->
        @guest
            <li><a href="{{ route('login') }}">{{ __('Staff Login') }}</a></li>
            @if (Route::has('staff_register'))
                <li><a href="{{ route('register') }}">{{ __('Register') }}</a></li>
            @endif
        @else
            <li>
                <label for="drop-5" class="toggle">{{ Auth::user()->username }} <i class="fas fa-caret-down"></i></label>
                <a href="#">{{ Auth::user()->username }}</a>
                <input type="checkbox" id="drop-5" style="display: none !important;"/>
                <ul>
                    <li><a href="{{ route('logout') }}"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                    </li>
                </ul>
                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                      style="display: none;">
                    @csrf
                </form>
            </li>
        @endguest
    </ul>
</nav>
