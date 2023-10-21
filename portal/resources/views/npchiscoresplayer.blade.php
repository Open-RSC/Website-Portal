@extends('template')

@section('content')

    @if (!$player || !isset($player->id) || !isset($player->username))
        <div class="text-center" style="background-color: black;">
            <table>
                <tr>
                    <td class="e p-5">
                        Account <span class="rscfont" style="color:yellow">{{ ucfirst($subpage) }}</span> does not exist
                    </td>
                </tr>
            </table>
        </div>
    @else
        <div class="text-center">
            <table class="hiscores-player-table" cellpadding="4" border="0" style="background-color: black;">
                <tr>
                    <td class="e">
                        <div class="text-center d-flex align-items-center">
                            {{ \App\Helpers\uc_worlds($db) ?? "Preservation" }} NPC Hiscores {!! (($db === "cabbage" || $db === "coleslaw") && ($player->iron_man === 1 || $player->iron_man === 2 || $player->iron_man === -1)) ? '<span class="mr-1 ml-1">for</span>' : 'for' !!}
                            @if(($db === "cabbage" || $db === "coleslaw") && $player->iron_man === 1)
                                <img src="{{ asset('img/iron.png') }}" alt="Ironman">
                            @elseif(($db === "cabbage" || $db === "coleslaw") && $player->iron_man === 2)
                                <img src="{{ asset('img/uim.png') }}" alt="Ultimate Ironman">
                            @elseif(($db === "cabbage" || $db === "coleslaw") && $player->iron_man === -1)
                                <img src="{{ asset('img/hcim.png') }}" alt="Hardcore Ironman">
                            @endif
                            @if ($player->group_id < '10')
                                <span class="pl-1"></span>
                                <img class="inline mb-1" src="{{ asset('img') }}/{{ $player->group_id }}.svg"
                                     alt="group {{ $player->group_id }}" style="height: 11px; width: auto;"/>
                            @endif
                            <span class="rscfont" style="color:yellow;">
                                <span class="ml-1"></span>{{ ucfirst($player->username) }}
                            </span>
                        </div>

                         <table>
                                <tr>
                                    <td colspan="3" align="left">
                                        <b>Rank</b>
                                    </td>
                                    <td width="130" align="right">
                                        <b>NPC Name</b>
                                    </td>
                                    <td width="80" align="right">
                                        <b>Kills</b>
                                    </td>
                                </tr>
                                @foreach ($hiscores as $key=>$player)
                                    <tr>
                                        <td colspan="3" align="left">
                                            {{-- TODO: fix player rank somehow... --}}
                                            {{ $player->rank }}
                                        </td>
                                        <td align="right">
                                            <a class="c" href="/npchiscores/{{$db}}/{{$player->npcID}}">{{ $npcs[$player->npcID] }}</a>
                                        </td>
                                        <td align="right">
                                            {{ number_format($player->killCount) }}
                                        </td>
                                    </tr>
                                @endforeach
                         </table>
                    </td>
                </tr>
            </table>
        </div>

        <div class="p-2">
            <a class="c" href="/npchiscores/{{$db}}/{{ $db === "2001scape" ? 137 : 477 }}">
                Back to NPC hiscores
            </a>
        </div>
        <div class="p-1"></div>
    @endif

@endsection
