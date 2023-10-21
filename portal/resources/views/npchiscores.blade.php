@extends('template')
@section('content')
    <div class="hiscores-page">
        <div class="hiscores-list-container">
            <div class="hiscores-skill-list" style="width:200px">
                <div class="hiscores-list-label">
                    <b>Select hiscore table</b>
                </div>
                <div class="e bg-black p-2" style="outline: black;">
                    @foreach ($npcs as $npcId => $npcName)
                        <div class="d-flex" style="padding-left:15px; padding-bottom:2px;">
                            <div style="width:5px;">
                            </div>
                            <div style="width:40px;">
                                <ul style="padding-left: 0; margin-bottom: 0">
                                    <li style="list-style: disc; width: 140px;"><a class="c" class="col-3" href="/npchiscores/{{ $db }}/{{ $npcId }}">
                                        {{ $npcName }}
                                    </a></li>
                                </ul>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="hiscores-player-list">
                <div class="hiscores-list-label">
                    <b>{{ \App\Helpers\uc_worlds($db) ?? "Preservation" }} {{ $npc_name !== "Overall" ? $npc_name : "Overall NPC" }} Hiscores</b>
                </div>
                <div class="e bg-black p-2" style="outline: black;">
                    <div class="d-flex">
                        <div class="text-right" style="width:40px;"><b>Rank</b></div>
                        <div class="text-left" style="padding-left:10px; width:160px;"><b>Player Name</b></div>
                        <div class="text-right" {!! $npc_id === "odyssey" ? "style='width:100px;'" : "style='width:40px;'" !!}><b>{{ $npc_id === "odyssey" ? "Completions" : "Kills" }}</b></div>
                    </div>
                    @foreach ($hiscores as $key=>$player)
                        <div class="d-flex">
                            <!--Rank-->
                            <div class="text-right" style="width:40px;">
                                {{ ($hiscores->currentpage()-1) * $hiscores->perpage() + $key + 1 }}
                            </div>
                            <!--Player-->
                            <div class="text-left d-flex align-items-center" style="padding-left:10px; width:160px;">
                                @if(($db === "cabbage" || $db === "coleslaw") && $player->iron_man == 1)
                                    <img src="{{ asset('img/iron.png') }}" alt="Ironman">
                                @elseif(($db === "cabbage" || $db === "coleslaw") && $player->iron_man == 2)
                                    <img src="{{ asset('img/uim.png') }}" alt="Ultimate Ironman">
                                @elseif(($db === "cabbage" || $db === "coleslaw") && $player->iron_man == 3)
                                    <img src="{{ asset('img/hcim.png') }}" alt="Hardcore Ironman">
                                @endif
                                &nbsp;<a class="c" href="/npchiscores/{{ $db }}/player/{{ $player->username }}">{{ ucfirst($player->username) }}</a>
                            </div>
                            <!--Kills-->
                            <div class="text-right" style="padding-right:15px; width:100px;">
                                {{ number_format($player->killCount) }}
                            </div>
                        </div>
                    @endforeach
                    {{ $hiscores->links('pagination::tailwind') }}
                </div>
            </div>
        </div>
        <div class="p-2"></div>
        <div class="d-flex hiscores-search-bar">
            <div class="b search-box search-rank"
                style="border-color:#474747; background-image: url('{{ asset("/img/stoneback.gif") }}');">
                <form method="POST" role="search" action="{{url('searchNpcHiscoresByPlayerName')}}">
                    @csrf <!-- {{ csrf_field() }} -->
                    <input type="hidden" name="db" value="{{$db}}">
                    <label for="name">Search by Player name</label>
                    <input id="name" name="name" type="text" required="required" style="width:100px;"
                        class="bg-white text-black mt-1">
                    <input type="submit" value="Search" aria-label="Search by username" class="text-black pl-1 pr-1">
                </form>
            </div>
            <div class="b search-box search-rank ml-4"
                style="border-color:#474747; background-image: url('{{ asset("/img/stoneback.gif") }}');">
                <form method="POST" role="search" action="{{url('searchNpcHiscoresByNpcName')}}">
                    @csrf <!-- {{ csrf_field() }} -->
                    <input type="hidden" name="db" value="{{$db}}">
                    <label for="name">Search by NPC name</label>
                    <input id="name" name="name" type="text" required="required" style="width:100px;"
                        class="bg-white text-black mt-1">
                    <input type="submit" value="Search" aria-label="Search by username" class="text-black pl-1 pr-1">
                </form>
            </div>
        </div>
    </div>
@endsection
