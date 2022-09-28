@extends('template')

@section('content')

    @if (!$players->first() || !isset($players->first()->id) || !isset($players->first()->username))
        <div style="text-align: center;">
            <table bgcolor=black cellpadding=4 border=0>
                <tr>
                    <td class=e>
                        <div style="text-align:center;">
                            Account <span style="color:yellow"><?= $subpage ?></span> does not exist
                        </div>
                    </td>
                </tr>
            </table>
        </div>
    @else
        <div style="text-align: center;">
            <table class="hiscores-player-table" bgcolor="black" cellpadding="4" border="0">
                <tr>
                    <td class="e">
                        <div style="text-align:center;">
                            RuneScape Hiscores for
                            <span class="rscfont" style="color:yellow">
                            @isset($players->first()->username)
                                    {{ ucfirst($players->first()->username) }}
                                @endif
                        </span>
                        </div>
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
                                                @elseif($skill == 'herblaw')
                                                    Herblore
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
                    </td>
                </tr>
            </table>
        </div>

        <div class="p-2"></div>

        @isset($players->first()->username)
            <div class="row e" style="background-color: black;">
                <div class="col-4">
                    <div class="rscfont d-block">
                        @if($db== 'preservation')
                            <!-- Due to legacy OpenRSC database not following regular naming scheme -->
                            <img src="{{ asset('/img/avatars').'/'.'openrsc'.'+'.$players->first()->id }}.png"
                                 alt="({{ $players->first()->username }})"/>
                        @else
                            <img src="{{ asset('/img/avatars').'/'.$db.'+'.$players->first()->id }}.png"
                                 alt="({{ $players->first()->username }})"/>
                        @endif
                    </div>
                </div>
                <div class="col-8 text-left">
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
        @endif

        <div class="p-1"></div>
    @endif

@endsection
