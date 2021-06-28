@extends('template')
@section('content')
    <div style="width:450px;">
        <div class="row">

            <div style="width:170px;">
                <div style="padding-left: 10px;">
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
                                <a class="col-3" href="/hiscores/{{ $skill }}">
                                    @if($skill == 'skill_total')
                                        Overall
                                    @elseif($skill =='hits')
                                        Hitpoints
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
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <div style="width:300px;">
                <div style="padding-left: 75px;">
                    @if($subpage ?? '' == null)
                        <b>Overall Hiscores</b>
                    @elseif($subpage ?? '' == 'hits')
                        <b>Hitpoints Hiscores</b>
                    @elseif($subpage ?? '' == 'woodcut')
                        <b>Woodcutting Hiscores</b>
                    @elseif($subpage ?? '' == 'herblaw')
                        <b>Herblore Hiscores</b>
                    @elseif($subpage ?? '' == 'runecraft')
                        <b>Runecrafting Hiscores</b>
                    @else
                        <b>{{ ucfirst($subpage ?? '') }} Hiscores</b>
                    @endif
                </div>
                <div class="e bg-black p-2" style="outline: black;">
                    <div class="d-flex">
                        <div class="text-right" style="width:40px;"><b>Rank</b></div>
                        <div class="text-left" style="padding-left:10px; width:130px;"><b>Name</b></div>
                        <div class="text-right" style="width:30px;"><b>Level</b></div>
                        <div class="text-right" style="width:100px;"><b>XP</b></div>
                    </div>
                    @foreach ($hiscores as $key=>$player)
                        <div class="d-flex clickable-row" data-href="{{ route('player', $player->id) }}">
                            <!--Rank-->
                            <div class="text-right" style="width:40px;">
                                {{ ($hiscores->currentpage()-1) * $hiscores->perpage() + $key + 1 }}
                            </div>
                            <!--Player-->
                            <div class="text-left" style="padding-left:10px; width:130px;">
                                <a href="/player/{{ $player->id }}">{{ ucfirst($player->username) }}</a>
                            </div>
                            <!--Total Level-->
                            <div class="text-right" style="padding-right:15px; width:30px;">
                                {{ number_format((new App\Http\HiscoresController)->experienceToLevel($player->$subpage/4.0)) }}
                            </div>
                            <!--Total XP-->
                            <div class="text-left" style="padding-left:10px; width:100px;">
                                {{ number_format($player->$subpage/4.0) }}
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <!--{/{ $hiscores->links('pagination::simple-tailwind') }}-->
    </div>

    <div class="p-2"></div>

    <div class="d-flex justify-content-center pl-4">
        <div class="col hiscore-search">
            <div class="search-box search-rank">
                <form method="POST" role="search"><input type="hidden" name="_csrf" value="{{ csrf_token() }}">
                    <label for="rank">Search by rank</label>
                    <input id="rank" name="rank" type="text" required="required" style="width:100px;"
                           class="bg-white text-black mt-1">
                    <input type="submit" value="Search" aria-label="Search by rank" class="text-black pl-1 pr-1">
                </form>
            </div>
        </div>

        <div class="col">
            <div class="search-box search-name" style="background-image:url("{{ asset('img/stoneback.gif') }}");">
            <form method="POST" role="search">
                <input type="hidden" name="_csrf" value="{{ csrf_token() }}">
                <label for="name">Search by name</label>
                <input id="name" name="name" type="text" required="required" style="width:100px;"
                       class="bg-white text-black mt-1">
                <input type="submit" value="Search" aria-label="Search by username" class="text-black pl-1 pr-1">
            </form>
        </div>
    </div>
    </div>
@endsection