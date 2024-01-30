@extends('template')

@section('content')

    @if (!$players->first() || !isset($players->first()->id) || !isset($players->first()->username))
        <div class="text-center" style="background-color: black;">
            <table>
                <tr>
                    <td class="e p-5">
                        Account <span class="rscfont" style="color:yellow">{{ ucfirst($subpage) }}</span> does not exist
                    </td>
                </tr>
            </table>
            <div class="p-2">
                <a class="c" href="javascript:history.back()">
                    Back to hiscores
                </a>
            </div>
        </div>
    @else
        <div class="text-center">
            <table class="hiscores-player-table" cellpadding="4" border="0" style="background-color: black;">
                <tr>
                    <td class="e">
                        <div class="text-center d-flex align-items-center">
                            RS Hiscores {!!  (($db === "cabbage" || $db === "coleslaw") && ($players->first()->iron_man === 1 || $players->first()->iron_man === 2 || $players->first()->iron_man === -1)) ? '<span class="mr-1 ml-1">for</span>' : 'for' !!}
                            @if(($db === "cabbage" || $db === "coleslaw") && $players->first()->iron_man == 1)
                                <img src="{{ asset('img/iron.png') }}" alt="Ironman">
                            @elseif(($db === "cabbage" || $db === "coleslaw") && $players->first()->iron_man == 2)
                                <img src="{{ asset('img/uim.png') }}" alt="Ultimate Ironman">
                            @elseif(($db === "cabbage" || $db === "coleslaw") && $players->first()->iron_man == -1)
                                <img src="{{ asset('img/hcim.png') }}" alt="Hardcore Ironman">
                            @endif
                            @if ($players->first()->group_id < '10')
                                <span class="pl-1"></span>
                                <img class="inline mb-1" src="{{ asset('img') }}/{{ $players->first()->group_id }}.svg"
                                     alt="group {{ $players->first()->group_id }}" style="height: 11px; width: auto;"/>
                            @endif
                            <span class="rscfont" style="color:yellow;">
                                <span class="ml-1"></span>{{ ucfirst($players->first()->username) }}
                            </span>
                        </div>
                        @if ($db === "openpk")
                         <table>
                                <tr>
                                    <td colspan="3" align="left">
                                        <b>Rank</b>
                                    </td>
                                    <td width="80" align="right">
                                        <b>Kills</b>
                                    </td>
                                    <td width="80" align="right">
                                        <b>Deaths</b>
                                    </td>
                                    <td width="80" align="right">
                                        <b>KDR</b>
                                    </td>
                                </tr>
                                @foreach ($players as $key=>$player)
                                    <tr>
                                        <td colspan="3" align="left">
                                            {{ ($hiscores->currentpage()-1) * $hiscores->perpage() + $key + 1 }}
                                        </td>
                                        <td align="right">
                                            {{ number_format($player->kills) }}
                                        </td>
                                        <td align="right">
                                            {{ number_format($player->deaths) }}
                                        </td>
                                        <td align="right">
                                            @if ($player->deaths > 0)
                                                {{ number_format($player->kills / $player->deaths, 2) }}
                                            @else
                                                @if ($player->kills > 0)
                                                    {{ number_format($player->kills, 2) }}
                                                @else
                                                    0.00
                                                @endif
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                         </table>
                        @else
                            <table>
                                <tr>
                                    <td colspan="3" width="120" align="left">
                                        <b>Skill</b>
                                    </td>
                                    <td width="80" align="right">
                                        <b>Rank</b>
                                    </td>
                                    <td width="80" align="right">
                                        <b>Level</b>
                                    </td>
                                    <td width="80" align="right">
                                        <b>XP</b>
                                    </td>
                                </tr>
                                @foreach ($players as $key=>$player)
                                    <tr>
                                        <td>&nbsp;
                                        </td>
                                        <td>&nbsp;
                                        </td>
                                        <td align="left">
                                            <a class="c" href="/hiscores/{{ $db }}">
                                                Overall
                                            </a>
                                        </td>
                                        <td align="right">
                                            {{ number_format($rank_overall->first()->rank+1) }}
                                        </td>
                                        <td align="right">
                                            {{ number_format($player->skill_total) }}
                                        </td>
                                        <td align="right">
                                            {{ number_format($player->total_xp) }}
                                        </td>
                                    </tr>
                                    @foreach ($skill_array as $skill)
                                        <tr>
                                            <td>
                                                @if($skill == 'skill_total')
                                                @else
                                                    <img src="{{ asset('/img/skill_icons').'/'.strtolower($skill) }}.gif"
                                                         valign="bottom"
                                                         width=16 height=16 alt="{{ strtolower($skill) }}"/>
                                                @endif
                                            </td>
                                            <td>&nbsp;
                                            </td>
                                            <td align="left">
                                                <a class="c" href="/hiscores/{{ $db }}/{{ $skill }}">
                                                    @if($skill == 'skill_total')
                                                        Overall
                                                    @elseif($skill =='hits')
                                                        Fighting
                                                    @elseif($skill == 'woodcut')
                                                        Woodcutting
                                                    @elseif($skill == 'runecraft')
                                                        Runecrafting
                                                    @else
                                                        {{ ucwords(preg_replace("/[^A-Za-z0-9 ]/", " ", $skill)) }}
                                                    @endif
                                                </a>
                                            </td>
                                            <td align="right">
                                                {{  (new App\Http\PlayerController)->rank($db, $subpage, $skill)+1 }}
                                            </td>
                                            <td align="right">
                                                {{ number_format((new App\Http\HiscoresController)->experienceToLevel($player->$skill/4.0)) }}
                                            </td>
                                            <td align="right">
                                                {{ number_format($player->$skill/4.0) }}
                                            </td>
                                        </tr>
                                    @endforeach
                                @endforeach
                            </table>
                        @endif
                    </td>
                </tr>
            </table>
        </div>

        <div class="p-2"></div>

        @isset($players->first()->username)
            <div class="row e" style="background-color: black;">
                @if (File::exists(public_path('/img/avatars/' . ($db == 'preservation' ? 'openrsc' : $db) . '+' . $players->first()->id . '.png')))
                    <div class="col-4 pt-2" style="width: 75px;">
                        <div class="rscfont d-block">
                            <!-- Due to legacy OpenRSC database not following regular naming scheme, we hardcode the db name openrsc -->
                            <img src="{{ asset('/img/avatars/' . ($db == 'preservation' ? 'openrsc' : $db) . '+' . $players->first()->id . '.png') }}" alt="({{ $players->first()->username }})"/>
                        </div>
                    </div>
                @endif
                <div class="col-8 text-left" style="width: 200px;">
                <span class="rscfont d-block">
                    Status:
                    @if ($players->first()->online == 1)
                        <span style="color: #01fe00;">
                            Online
                        </span>
                    @else
                        <span style="color: #ff0101;">
                            Offline
                        </span>
                    @endif
                </span>
                    <span class="rscfont d-block">
                    Created: {{ Carbon\Carbon::parse($players->first()->creation_date)->diffForHumans() }}
                </span>
                    <span class="rscfont d-block">
                        Last Online:
                        @if ($players->first()->login_date)
                            {{ Carbon\Carbon::parse($players->first()->login_date)->diffForHumans() }}
                        @else
                            Never
                        @endif
                    </span>
                    <span class="rscfont d-block">
                    Player ID: {{ $players->first()->id }}
                </span>
                </div>
            </div>
        @endisset

        <div class="p-1"></div>
    @endif

@endsection
