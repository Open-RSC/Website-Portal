@extends('template')
@section('content')
    <div class="hiscores-page">
        <div class="hiscores-list-container">
            <div class="hiscores-skill-list">
                <div class="hiscores-list-label">
                    <b>Select hiscore table</b>
                </div>
                <div class="e bg-black p-2" style="outline: black;">
                    @foreach ($skill_array as $skill)
                        <div class="d-flex" style="padding-left:20px; padding-bottom:2px;">
                            <div style="width:24px;">
                                @if($skill == 'skill_total')
                                @else
                                    <img src="{{ asset('img/skill_icons').'/'.strtolower($skill) }}.gif" alt="{{ strtolower($skill) }}"/>
                                @endif
                            </div>
                            <div style="width:40px;">
                                @if($skill == 'skill_total')
                                    <a class="c" class="col-3" href="/hiscores/{{ $db }}">
                                        @else
                                            <a class="c" class="col-3" href="/hiscores/{{ $db }}/{{ $skill }}">
                                                @endif
                                                @if($skill == 'skill_total')
                                                    Overall
                                                @elseif($skill =='hits')
                                                    Fighting
                                                @elseif($skill == 'woodcut')
                                                    Woodcutting
                                                @elseif($skill == 'herblaw')
                                                    Herblore
                                                @elseif($skill == 'runecraft')
                                                    Runecrafting
                                                @else
                                                    {{ ucwords(preg_replace("/[^A-Za-z0-9 ]/", " ", $skill)) }}
                                                @endif
                                            </a>
                                    </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="hiscores-player-list">
                <div class="hiscores-list-label">
                    <b>Overall Hiscores</b>
                </div>
                <div class="e bg-black p-2" style="outline: black;">
                    <div class="d-flex">
                        <div class="text-right" style="width:40px;"><b>Rank</b></div>
                        <div class="text-left" style="padding-left:10px; width:130px;"><b>Name</b></div>
                        <div class="text-right" style="width:30px;"><b>@if ($db === "openpk") Kills @else Level @endif</b></div>
                        <div class="text-right" style="width:100px;"><b>@if ($db === "openpk") Deaths @else XP @endif</b></div>
                        @if ($db === "openpk")
                            <div class="text-right" style="margin-left: 10px; width:30px;"><b>KDR</b></div>
                        @endif
                    </div>
                    @foreach ($hiscores as $key=>$player)
                        <div class="d-flex">
                            <!--Rank-->
                            <div class="text-right" style="width:40px;">
                                {{ ($hiscores->currentpage()-1) * $hiscores->perpage() + $key + 1 }}
                            </div>
                            <!--Player-->
                            <div class="text-left" style="padding-left:10px; width:130px;">
                                <a class="c"
                                   href="/player/{{ $db }}/{{ $player->username }}">{{ ucfirst($player->username) }}</a>
                            </div>
                            <!--Total Level-->
                            <div class="text-right" style="padding-right:15px; width:30px;">
                                {{ $db === "openpk" ? number_format($player->kills) : number_format($player->skill_total) }}
                            </div>
                            <!--Total XP-->
                            <div class="text-right" style="padding-left:10px; width:100px;">
                                {{ $db === "openpk" ? number_format($player->deaths) : number_format($player->total_xp) }}
                            </div>
                            @if ($db === "openpk")
                                <div class="text-right" style="margin-left: 10px; width:30px;">
                                    @if ($player->deaths > 0) 
                                        {{ number_format($player->kills / $player->deaths, 2) }}
                                    @else 
                                        @if ($player->kills > 0) 
                                            {{ number_format($player->kills, 2) }}
                                        @else
                                            0.00
                                        @endif    
                                    @endif    
                                </div>
                            @endif
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
                <form method="POST" role="search" action="{{url('searchByName')}}">
                    @csrf <!-- {{ csrf_field() }} -->
                    <input type="hidden" name="db" value="{{$db}}">
                    <label for="name">Search by name</label>
                    <input id="name" name="name" type="text" required="required" style="width:100px;"
                        class="bg-white text-black mt-1">
                    <input type="submit" value="Search" aria-label="Search by username" class="text-black pl-1 pr-1">
                </form>
            </div>
        </div>
    </div>
@endsection