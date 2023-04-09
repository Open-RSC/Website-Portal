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
                <a class="c text-left" href="/playerexport">
                    <i class="fa fa-download"></i>&nbsp; Player Exports
                </a>
            </span>
        </span>
        <span class="flex-auto p-2 dropdown">
            <a class="c" href="#">Hiscores <i class="fas fa-caret-down"></i></a>
            <span class="p-2 dropdown-content nav-hiscores-dropdown">
                <a class="c text-left" href="/hiscores/preservation">RSC Preservation</a>
                <a class="c text-left" href="/hiscores/cabbage">RSC Cabbage</a>
                <a class="c text-left" href="/hiscores/2001scape">2001Scape</a>
                <a class="c text-left" href="/hiscores/openpk">Open PK</a>
                <a class="c text-left" href="/hiscores/uranium">RSC Uranium</a>
                <a class="c text-left" href="/hiscores/coleslaw">RSC Coleslaw</a>
                @if (config('openrsc.npc_hiscores_enabled'))
                    <a class="c text-left" style="border-top: 1px dotted #90c040;" href="/npchiscores/preservation">RSC Preservation NPCs</a>
                    <a class="c text-left" href="/npchiscores/cabbage">RSC Cabbage NPCs</a>
                    <!--<a class="c text-left" href="/npchiscores/2001scape">2001Scape NPCs</a>-->
                    <a class="c text-left" href="/npchiscores/openpk">Open PK NPCs</a>
                    <a class="c text-left" href="/npchiscores/uranium">RSC Uranium NPCs</a>
                    <a class="c text-left" href="/npchiscores/coleslaw">RSC Coleslaw NPCs</a>
                @endif    
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
                    <a class="c text-left" href="/worldmap/2001scape"><i
                                class="fas fa-map"></i> 2001scape</a>
                    <a class="c text-left" href="/worldmap/uranium"><i
                                class="fas fa-map"></i> RSC Uranium</a>
                    <a class="c text-left" href="/worldmap/coleslaw"><i
                                class="fas fa-map"></i> RSC Coleslaw</a>
                </span>
        </span>
        @guest
            {{-- There's currently nothing guest-specific that staff also shouldn't access. --}}
        @else
            @if(Gate::allows('admin', Auth::user()))
                <span class="flex-auto p-2 dropdown">
                    <a class="c" href="#">Server Item Stats <i class="fas fa-caret-down"></i></a>
                    <span class="p-2 dropdown-content" style="background:black; width:160px;">
                        <a class="c text-left" href="{{ route('StatisticsOverview', 'preservation') }}">RSC Preservation Stats</a>
                        <a class="c text-left" href="{{ route('StatisticsOverview', 'cabbage') }}">RSC Cabbage Stats</a>
                        <a class="c text-left" href="{{ route('StatisticsOverview', 'uranium') }}">RSC Uranium Stats</a>
                        <a class="c text-left" href="{{ route('StatisticsOverview', 'coleslaw') }}">RSC Coleslaw Stats</a>
                        <a class="c text-left" href="{{ route('StatisticsOverview', 'openpk') }}">OpenPK Stats</a>
                    </span>
                </span>
            @endif
        
            @if(Gate::allows('moderator', Auth::user()))
                <span class="flex-auto p-2 dropdown">
                    <a class="c" href="#">Chat Logs <i class="fas fa-caret-down"></i></a>
                    <span class="p-2 dropdown-content" style="background:black; width:160px;">
                        <a class="c text-left" href="{{ route('chat_logs', 'preservation') }}">RSC Preservation Chat Logs</a>
                        <a class="c text-left" href="{{ route('chat_logs', 'cabbage') }}">RSC Cabbage Chat Logs</a>
                        <a class="c text-left" href="{{ route('chat_logs', '2001scape') }}">2001scape Chat Logs</a>
                        <a class="c text-left" href="{{ route('chat_logs', 'uranium') }}">RSC Uranium Chat Logs</a>
                        <a class="c text-left" href="{{ route('chat_logs', 'coleslaw') }}">RSC Coleslaw Chat Logs</a>
                        <a class="c text-left" href="{{ route('chat_logs', 'openpk') }}">OpenPK Chat Logs</a>
                    </span>
                </span>
                <span class="flex-auto p-2 dropdown">
                    <a class="c" href="#">Global Chat Logs <i class="fas fa-caret-down"></i></a>
                    <span class="p-2 dropdown-content" style="background:black; width:160px;">
                        <a class="c text-left" href="{{ route('globalchat_logs', 'preservation') }}">RSC Preservation Global Chat Logs</a>
                        <a class="c text-left" href="{{ route('globalchat_logs', 'cabbage') }}">RSC Cabbage Global Chat Logs</a>
                        <a class="c text-left" href="{{ route('globalchat_logs', '2001scape') }}">2001scape Global Chat Logs</a>
                        <a class="c text-left" href="{{ route('globalchat_logs', 'uranium') }}">RSC Uranium Global Chat Logs</a>
                        <a class="c text-left" href="{{ route('globalchat_logs', 'coleslaw') }}">RSC Coleslaw Global Chat Logs</a>
                        <a class="c text-left" href="{{ route('globalchat_logs', 'openpk') }}">OpenPK Global Chat Logs</a>
                    </span>
                </span>
            @endif
            
            @if(Gate::allows('admin', Auth::user()))
                <span class="flex-auto p-2 dropdown">
                    <a class="c" href="#">PM Logs <i class="fas fa-caret-down"></i></a>
                    <span class="p-2 dropdown-content" style="background:black; width:160px;">
                        <a class="c text-left" href="{{ route('pm_logs', 'preservation') }}">RSC Preservation PM Logs</a>
                        <a class="c text-left" href="{{ route('pm_logs', 'cabbage') }}">RSC Cabbage PM Logs</a>
                        <a class="c text-left" href="{{ route('pm_logs', '2001scape') }}">2001scape PM Logs</a>
                        <a class="c text-left" href="{{ route('pm_logs', 'uranium') }}">RSC Uranium PM Logs</a>
                        <a class="c text-left" href="{{ route('pm_logs', 'coleslaw') }}">RSC Coleslaw PM Logs</a>
                        <a class="c text-left" href="{{ route('pm_logs', 'openpk') }}">OpenPK PM Logs</a>
                    </span>
                </span>
            @endif
            
            @if(Gate::allows('moderator', Auth::user()))
                <span class="flex-auto p-2 dropdown">
                    <a class="c" href="#">Trade Logs <i class="fas fa-caret-down"></i></a>
                    <span class="p-2 dropdown-content" style="background:black; width:160px;">
                        <a class="c text-left" href="{{ route('trade_logs', 'preservation') }}">RSC Preservation Trade Logs</a>
                        <a class="c text-left" href="{{ route('trade_logs', 'cabbage') }}">RSC Cabbage Trade Logs</a>
                        <a class="c text-left" href="{{ route('trade_logs', '2001scape') }}">2001scape Trade Logs</a>
                        <a class="c text-left" href="{{ route('trade_logs', 'uranium') }}">RSC Uranium Trade Logs</a>
                        <a class="c text-left" href="{{ route('trade_logs', 'coleslaw') }}">RSC Coleslaw Trade Logs</a>
                        <a class="c text-left" href="{{ route('trade_logs', 'openpk') }}">OpenPK Trade Logs</a>
                    </span>
                </span>
            
                <span class="flex-auto p-2 dropdown">
                    <a class="c" href="#">Auction Logs <i class="fas fa-caret-down"></i></a>
                    <span class="p-2 dropdown-content" style="background:black; width:160px;">
                        <a class="c text-left" href="{{ route('auction_logs', 'cabbage') }}">RSC Cabbage Auction Logs</a>
                        <a class="c text-left" href="{{ route('auction_logs', 'coleslaw') }}">RSC Auction Logs</a>
                        <a class="c text-left" href="{{ route('auction_logs', 'openpk') }}">OpenPK Shop Logs</a>
                    </span>
                </span>
                
                <span class="flex-auto p-2 dropdown">
                    <a class="c" href="#">Generic Logs <i class="fas fa-caret-down"></i></a>
                    <span class="p-2 dropdown-content" style="background:black; width:160px;">
                        <a class="c text-left" href="{{ route('generic_logs', 'preservation') }}">RSC Preservation Generic Logs</a>
                        <a class="c text-left" href="{{ route('generic_logs', 'cabbage') }}">RSC Cabbage Generic Logs</a>
                        <a class="c text-left" href="{{ route('generic_logs', '2001scape') }}">2001scape Generic Logs</a>
                        <a class="c text-left" href="{{ route('generic_logs', 'uranium') }}">RSC Uranium Generic Logs</a>
                        <a class="c text-left" href="{{ route('generic_logs', 'coleslaw') }}">RSC Coleslaw Generic Logs</a>
                        <a class="c text-left" href="{{ route('generic_logs', 'openpk') }}">OpenPK Generic Logs</a>
                    </span>
                </span>
            @endif
            
            @if(Gate::allows('player-moderator', Auth::user()))
                <span class="flex-auto p-2 dropdown">
                    <a class="c" href="#">Rename Logs <i class="fas fa-caret-down"></i></a>
                    <span class="p-2 dropdown-content" style="background:black; width:160px;">
                        <a class="c text-left" href="{{ route('rename_logs', 'preservation') }}">RSC Preservation Rename Logs</a>
                        <a class="c text-left" href="{{ route('rename_logs', 'cabbage') }}">RSC Cabbage Rename Logs</a>
                        <a class="c text-left" href="{{ route('rename_logs', '2001scape') }}">2001scape Rename Logs</a>
                        <a class="c text-left" href="{{ route('rename_logs', 'uranium') }}">RSC Uranium Rename Logs</a>
                        <a class="c text-left" href="{{ route('rename_logs', 'coleslaw') }}">RSC Coleslaw Rename Logs</a>
                        <a class="c text-left" href="{{ route('rename_logs', 'openpk') }}">OpenPK Rename Logs</a>
                    </span>
                </span>
            @endif
            
            @if(Gate::allows('admin', Auth::user()))
                <span class="flex-auto p-2 dropdown">
                    <a class="c" href="#">Staff Logs <i class="fas fa-caret-down"></i></a>
                    <span class="p-2 dropdown-content" style="background:black; width:160px;">
                        <a class="c text-left" href="{{ route('staff_logs', 'preservation') }}">RSC Preservation Staff Logs</a>
                        <a class="c text-left" href="{{ route('staff_logs', 'cabbage') }}">RSC Cabbage Staff Logs</a>
                        <a class="c text-left" href="{{ route('staff_logs', '2001scape') }}">2001scape Staff Logs</a>
                        <a class="c text-left" href="{{ route('staff_logs', 'uranium') }}">RSC Uranium Staff Logs</a>
                        <a class="c text-left" href="{{ route('staff_logs', 'coleslaw') }}">RSC Coleslaw Staff Logs</a>
                        <a class="c text-left" href="{{ route('staff_logs', 'openpk') }}">OpenPK Staff Logs</a>
                    </span>
                </span>
            @endif
            @if(Gate::allows('moderator', Auth::user()))
                <span class="flex-auto p-2 dropdown">
                    <a class="c" href="#">Players <i class="fas fa-caret-down"></i></a>
                    <span class="p-2 dropdown-content" style="background:black; width:160px;">
                        <a class="c text-left" href="{{ route('player_list', 'preservation') }}">RSC Preservation Players</a>
                        <a class="c text-left" href="{{ route('player_list', 'cabbage') }}">RSC Cabbage Players</a>
                        <a class="c text-left" href="{{ route('player_list', '2001scape') }}">2001scape Players</a>
                        <a class="c text-left" href="{{ route('player_list', 'uranium') }}">RSC Uranium Players</a>
                        <a class="c text-left" href="{{ route('player_list', 'coleslaw') }}">RSC Coleslaw Players</a>
                        <a class="c text-left" href="{{ route('player_list', 'openpk') }}">OpenPK Players</a>
                    </span>
                </span>
            @endif    
            @if(Gate::allows('admin', Auth::user()))
                <span class="flex-auto p-2 dropdown">
                    <a class="c" href="#">Logins <i class="fas fa-caret-down"></i></a>
                    <span class="p-2 dropdown-content" style="background:black; width:160px;">
                        <a class="c text-left" href="{{ route('login_list', 'preservation') }}">RSC Preservation Logins</a>
                        <a class="c text-left" href="{{ route('login_list', 'cabbage') }}">RSC Cabbage Logins</a>
                        <a class="c text-left" href="{{ route('login_list', '2001scape') }}">2001scape Logins</a>
                        <a class="c text-left" href="{{ route('login_list', 'uranium') }}">RSC Uranium Logins</a>
                        <a class="c text-left" href="{{ route('login_list', 'coleslaw') }}">RSC Coleslaw Logins</a>
                        <a class="c text-left" href="{{ route('login_list', 'openpk') }}">OpenPK Logins</a>
                    </span>
                </span>
            @endif
            
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