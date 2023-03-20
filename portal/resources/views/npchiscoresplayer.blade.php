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
        </div>
    @else
        <div class="text-center">
            <table class="hiscores-player-table" cellpadding="4" border="0" style="background-color: black;">
                <tr>
                    <td class="e">
                        <div class="text-center">
                            RuneScape NPC Hiscores for
                            @if ($players->first()->group_id < '10')
                                <span class="pl-1"></span>
                                <img class="inline mb-1" src="{{ asset('img') }}/{{ $players->first()->group_id }}.svg"
                                     alt="group {{ $players->first()->group_id }}" style="height: 11px; width: auto;"/>
                            @endif
                            <span class="rscfont" style="color:yellow;">
                                    {{ ucfirst($players->first()->username) }}
                            </span>
                        </div>
                        
                         <table>
                                <tr>
                                    <td colspan="3" align="left">
                                        <b>Rank</b>
                                    </td>
                                    <td width="80" align="right">
                                        <b>NPC Name</b>
                                    </td>
                                    <td width="80" align="right">
                                        <b>Kills</b>
                                    </td>
                                </tr>
                                @foreach ($players as $key=>$player)
                                    <tr>
                                        <td colspan="3" align="left">
                                            {{ ($hiscores->currentpage()-1) * $hiscores->perpage() + $key + 1 }}
                                        </td>
                                        <td align="right">
                                            {{ number_format($player->npcName) }}
                                        </td>
                                        <td align="right">
                                            {{ number_format($player->npcKills) }}
                                        </td>
                                    </tr>
                                @endforeach    
                         </table>
                    </td>
                </tr>
            </table>
        </div>

        <div class="p-2"></div>

        @isset($players->first()->username)
            <div class="row e" style="background-color: black;">
                <div class="col-4 pt-2" style="width: 75px;">
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
        @endif

        <div class="p-1"></div>
    @endif

@endsection
