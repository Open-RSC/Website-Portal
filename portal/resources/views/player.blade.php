@extends('template')

@section('content')

    <div style="text-align: center;">
        <table bgcolor=black cellpadding=4 border=0>
            <tr>
                <td class=e>
                    <div style="text-align:center;">
                        RuneScape Hiscores for
                        <span style="color:yellow">
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
                                <td>
                                    &nbsp;
                                </td>
                                <td>
                                    &nbsp;
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
                                            <img src="{{ asset('img/skill_icons').'/'.strtolower($skill) }}.gif" valign="bottom"
                                                 width=16 height=16 alt="{{ strtolower($skill) }}"/>
                                        @endif
                                    </td>
                                    <td>
                                        &nbsp;
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
        <span class="text-info">
            Status:
            @if ($players->first()->online == 1)
                <span style="color: lime">
                <strong>Online</strong>
            </span>
            @else
                <span style="color: red">
                <strong>Offline</strong>
            </span>
            @endif
        </span>
        <span class="text-info">
            Created: {{ Carbon\Carbon::parse($players->first()->creation_date)->diffForHumans() }}
        </span>
        <span class="text-info">
            Last Online:
            @if ($players->first()->login_date)
                {{ Carbon\Carbon::parse($players->first()->login_date)->diffForHumans() }}
            @else
                Never
            @endif
        </span>
    @endif

    <div class="p-2"></div>

@endsection
