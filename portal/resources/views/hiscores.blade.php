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
                                    <img src="{{ asset('img/skill_icons').'/'.$skill }}.gif" alt="{{ $skill }}"/>
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
                        <div class="text-right" style="width:30px;"><b>Level</b></div>
                        <div class="text-right" style="width:100px;"><b>XP</b></div>
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
                                href="/player/{{ $db }}/{{ $player->id }}">{{ ucfirst($player->username) }}</a>
                            </div>
                            <!--Total Level-->
                            <div class="text-right" style="padding-right:15px; width:30px;">
                                {{ number_format($player->skill_total) }}
                            </div>
                            <!--Total XP-->
                            <div class="text-right" style="padding-left:10px; width:100px;">
                                {{ number_format($player->total_xp) }}
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
                <form method="POST" role="search" action="{{url('searchByName')}}">
                    @csrf <!-- {{ csrf_field() }} -->
                    <input type="hidden" name="db" value="<?= $db ?>">
                    <label for="name">Search by name</label>
                    <input id="name" name="name" type="text" required="required" style="width:100px;"
                        class="bg-white text-black mt-1">
                    <input type="submit" value="Search" aria-label="Search by username" class="text-black pl-1 pr-1">
                </form>
            </div>
        </div>
    </div>
@endsection