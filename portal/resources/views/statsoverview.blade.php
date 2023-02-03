@extends('template')

@section('content')
    <div class="col container">
        <h2 class="h2 text-center text-gray-400 pt-5 pb-4 text-capitalize display-3">
            Statistics (current) for {{ $db }}
        </h2>
        
        <div class="row justify-content-center">
            <div class="col-lg-6 text-gray-400 pr-5 pl-5 pt-3 pb-3 bg-black">
                <div class="">
                    <a href="{{ route('StatisticsList', $db) }}">Return to list</a>
                    <h4 class="pt-4 text-danger">Accounts</h4>
                    <span class="d-block">
						<a class="text-primary" href="{{ route('Online list') }}">{{ $online }}</a> players currently logged in.
					</span>
                    <span class="d-block">
						<a class="text-primary" href="{{ route('Players Created Today') }}">{{ $createdToday }}</a> players have been registered today.
					</span>
                    <span class="d-block">
						<a class="text-primary" href="{{ route('Logins in the last 48 hours') }}">{{ $logins48 }}</a> players logged in the last 48 hours.
					</span>
                    <span class="d-block">
						<span class="text-primary">{{ $uniquePlayers }}</span> people have created
						<span class="text-primary">{{ $totalPlayers }}</span> players.
					</span>

                    <h4 class="pt-4 text-danger">Wealth</h4>
                    <span class="d-block">
						<span class="text-primary">{{ number_format($sumgold) }}</span> gp total in-game.
					</span>
                    <span class="d-block">
						<span class="text-primary">{{ number_format($gold1m) }}</span> players have over 1M gp.
					</span>
                    <span class="d-block">
						<span class="text-primary">{{ number_format($gold5m) }}</span> players have over 5M gp.
					</span>
                    <span class="d-block">
						<span class="text-primary">{{ number_format($gold10m) }}</span> players have over 10M gp.
					</span>

                    <div class="pt-4 text-danger">Important Items Summary</div>
                    <table>

                        <tr>
                            <td class="pl-1 pr-1 clickable-row" data-toggle="tooltip"
                                data-href="{{ route('Item Information', '422') }}" title="Pumpkin"
                                style="border: 1px solid black; background: rgba(255,255,255,0.2);">
                                <div style="-webkit-text-fill-color: limegreen; -webkit-text-stroke-width: 1px; -webkit-text-stroke-color: black; margin-top: 0; position: relative; color: white; font-size: 13px; font-weight: 900;">
                                    @if ($pumpkin)
                                        {{ number_format($pumpkin) }}
                                    @else
                                        0
                                    @endif
                                </div>
                                <img class="mt-n2" src="{{ asset('img/items') }}/422.png"
                                     alt="Pumpkin"/>
                            </td>
                            <td class="pl-1 pr-1 clickable-row" data-toggle="tooltip"
                                data-href="{{ route('Item Information', '575') }}" title="Christmas Cracker"
                                style="border: 1px solid black; background: rgba(255,255,255,0.2);">
                                <div style="-webkit-text-fill-color: limegreen; -webkit-text-stroke-width: 1px; -webkit-text-stroke-color: black; margin-top: 0; position: relative; color: white; font-size: 13px; font-weight: 900;">
                                    @if ($cracker)
                                        {{ number_format($cracker) }}
                                    @else
                                        0
                                    @endif
                                </div>
                                <img class="mt-n2" src="{{ asset('img/items') }}/575.png"
                                     alt="Christmas Cracker"/>
                            </td>
                            <td class="pl-1 pr-1 clickable-row" data-toggle="tooltip"
                                data-href="{{ route('Item Information', '576') }}" title="Red Partyhat"
                                style="border: 1px solid black; background: rgba(255,255,255,0.2);">
                                <div style="-webkit-text-fill-color: limegreen; -webkit-text-stroke-width: 1px; -webkit-text-stroke-color: black; margin-top: 0; position: relative; color: white; font-size: 13px; font-weight: 900;">
                                    @if ($redphat)
                                        {{ number_format($redphat) }}
                                    @else
                                        0
                                    @endif
                                </div>
                                <img class="mt-n2" src="{{ asset('img/items') }}/576.png"
                                     alt="Red Partyhat"/>
                            </td>
                            <td class="pl-1 pr-1 clickable-row" data-toggle="tooltip"
                                data-href="{{ route('Item Information', '577') }}" title="Yellow Partyhat"
                                style="border: 1px solid black; background: rgba(255,255,255,0.2);">
                                <div style="-webkit-text-fill-color: limegreen; -webkit-text-stroke-width: 1px; -webkit-text-stroke-color: black; margin-top: 0; position: relative; color: white; font-size: 13px; font-weight: 900;">
                                    @if ($yellowphat)
                                        {{ number_format($yellowphat) }}
                                    @else
                                        0
                                    @endif
                                </div>
                                <img class="mt-n2" src="{{ asset('img/items') }}/577.png"
                                     alt="Yellow Partyhat"/>
                            </td>
                        </tr>
                        <tr>
                            <td class="pl-1 pr-1 clickable-row" data-toggle="tooltip"
                                data-href="{{ route('Item Information', '578') }}" title="Blue Partyhat"
                                style="border: 1px solid black; background: rgba(255,255,255,0.2);">
                                <div style="-webkit-text-fill-color: limegreen; -webkit-text-stroke-width: 1px; -webkit-text-stroke-color: black; margin-top: 0; position: relative; color: white; font-size: 13px; font-weight: 900;">
                                    @if ($bluephat)
                                        {{ number_format($bluephat) }}
                                    @else
                                        0
                                    @endif
                                </div>
                                <img class="mt-n2" src="{{ asset('img/items') }}/578.png"
                                     alt="Blue Partyhat"/>
                            </td>
                            <td class="pl-1 pr-1 clickable-row" data-toggle="tooltip"
                                data-href="{{ route('Item Information', '579') }}" title="Green Partyhat"
                                style="border: 1px solid black; background: rgba(255,255,255,0.2);">
                                <div style="-webkit-text-fill-color: limegreen; -webkit-text-stroke-width: 1px; -webkit-text-stroke-color: black; margin-top: 0; position: relative; color: white; font-size: 13px; font-weight: 900;">
                                    @if ($greenphat)
                                        {{ number_format($greenphat) }}
                                    @else
                                        0
                                    @endif
                                </div>
                                <img class="mt-n2" src="{{ asset('img/items') }}/579.png"
                                     alt="Green Partyhat"/>
                            </td>
                            <td class="pl-1 pr-1 clickable-row" data-toggle="tooltip"
                                data-href="{{ route('Item Information', '580') }}" title="Pink Partyhat"
                                style="border: 1px solid black; background: rgba(255,255,255,0.2);">
                                <div style="-webkit-text-fill-color: limegreen; -webkit-text-stroke-width: 1px; -webkit-text-stroke-color: black; margin-top: 0; position: relative; color: white; font-size: 13px; font-weight: 900;">
                                    @if ($pinkphat)
                                        {{ number_format($pinkphat) }}
                                    @else
                                        0
                                    @endif
                                </div>
                                <img class="mt-n2" src="{{ asset('img/items') }}/580.png"
                                     alt="Pink Partyhat"/>
                            </td>
                            <td class="pl-1 pr-1 clickable-row" data-toggle="tooltip"
                                data-href="{{ route('Item Information', '581') }}" title="White Partyhat"
                                style="border: 1px solid black; background: rgba(255,255,255,0.2);">
                                <div style="-webkit-text-fill-color: limegreen; -webkit-text-stroke-width: 1px; -webkit-text-stroke-color: black; margin-top: 0; position: relative; color: white; font-size: 13px; font-weight: 900;">
                                    @if ($whitephat)
                                        {{ number_format($whitephat) }}
                                    @else
                                        0
                                    @endif
                                </div>
                                <img class="mt-n2" src="{{ asset('img/items') }}/581.png"
                                     alt="White Partyhat"/>
                            </td>
                        </tr>
                        <tr>
                            <td class="pl-1 pr-1 clickable-row" data-toggle="tooltip"
                                data-href="{{ route('Item Information', '677') }}" title="Easter Egg"
                                style="border: 1px solid black; background: rgba(255,255,255,0.2);">
                                <div style="-webkit-text-fill-color: limegreen; -webkit-text-stroke-width: 1px; -webkit-text-stroke-color: black; margin-top: 0; position: relative; color: white; font-size: 13px; font-weight: 900;">
                                    @if ($easteregg)
                                        {{ number_format($easteregg) }}
                                    @else
                                        0
                                    @endif
                                </div>
                                <img class="mt-n2" src="{{ asset('img/items') }}/677.png"
                                     alt="Easter Egg"/>
                            </td>
                            <td class="pl-1 pr-1 clickable-row" data-toggle="tooltip"
                                data-href="{{ route('Item Information', '831') }}" title="Red Mask"
                                style="border: 1px solid black; background: rgba(255,255,255,0.2);">
                                <div style="-webkit-text-fill-color: limegreen; -webkit-text-stroke-width: 1px; -webkit-text-stroke-color: black; margin-top: 0; position: relative; color: white; font-size: 13px; font-weight: 900;">
                                    @if ($redmask)
                                        {{ number_format($redmask) }}
                                    @else
                                        0
                                    @endif
                                </div>
                                <img class="mt-n2" src="{{ asset('img/items') }}/831.png"
                                     alt="Red Mask"/>
                            </td>
                            <td class="pl-1 pr-1 clickable-row" data-toggle="tooltip"
                                data-href="{{ route('Item Information', '832') }}" title="Blue Mask"
                                style="border: 1px solid black; background: rgba(255,255,255,0.2);">
                                <div style="-webkit-text-fill-color: limegreen; -webkit-text-stroke-width: 1px; -webkit-text-stroke-color: black; margin-top: 0; position: relative; color: white; font-size: 13px; font-weight: 900;">
                                    @if ($bluemask)
                                        {{ number_format($bluemask) }}
                                    @else
                                        0
                                    @endif
                                </div>
                                <img class="mt-n2" src="{{ asset('img/items') }}/832.png"
                                     alt="Blue Mask"/>
                            </td>
                            <td class="pl-1 pr-1 clickable-row" data-toggle="tooltip"
                                data-href="{{ route('Item Information', '828') }}" title="Green Mask"
                                style="border: 1px solid black; background: rgba(255,255,255,0.2);">
                                <div style="-webkit-text-fill-color: limegreen; -webkit-text-stroke-width: 1px; -webkit-text-stroke-color: black; margin-top: 0; position: relative; color: white; font-size: 13px; font-weight: 900;">
                                    @if ($greenmask)
                                        {{ number_format($greenmask) }}
                                    @else
                                        0
                                    @endif
                                </div>
                                <img class="mt-n2" src="{{ asset('img/items') }}/828.png"
                                     alt="Green Mask"/>
                            </td>
                        </tr>
                        <tr>
                            <td class="pl-1 pr-1 clickable-row" data-toggle="tooltip"
                                data-href="{{ route('Item Information', '971') }}" title="Santa Hat"
                                style="border: 1px solid black; background: rgba(255,255,255,0.2);">
                                <div style="-webkit-text-fill-color: limegreen; -webkit-text-stroke-width: 1px; -webkit-text-stroke-color: black; margin-top: 0; position: relative; color: white; font-size: 13px; font-weight: 900;">
                                    @if ($santahat)
                                        {{ number_format($santahat) }}
                                    @else
                                        0
                                    @endif
                                </div>
                                <img class="mt-n2" src="{{ asset('img/items') }}/971.png"
                                     alt="Santa Hat"/>
                            </td>
                            <td class="pl-1 pr-1 clickable-row" data-toggle="tooltip"
                                data-href="{{ route('Item Information', '1289') }}" title="Scythe"
                                style="border: 1px solid black; background: rgba(255,255,255,0.2);">
                                <div style="-webkit-text-fill-color: limegreen; -webkit-text-stroke-width: 1px; -webkit-text-stroke-color: black; margin-top: 0; position: relative; color: white; font-size: 13px; font-weight: 900;">
                                    @if ($scythe)
                                        {{ number_format($scythe) }}
                                    @else
                                        0
                                    @endif
                                </div>
                                <img class="mt-n2" src="{{ asset('img/items') }}/1289.png"
                                     alt="Scythe"/>
                            </td>
                            <td class="pl-1 pr-1 clickable-row" data-toggle="tooltip"
                                data-href="{{ route('Item Information', '1278') }}" title="Dragon Sq Shield"
                                style="border: 1px solid black; background: rgba(255,255,255,0.2);">
                                <div style="-webkit-text-fill-color: limegreen; -webkit-text-stroke-width: 1px; -webkit-text-stroke-color: black; margin-top: 0; position: relative; color: white; font-size: 13px; font-weight: 900;">
                                    @if ($dsq)
                                        {{ number_format($dsq) }}
                                    @else
                                        0
                                    @endif
                                </div>
                                <img class="mt-n2" src="{{ asset('img/items') }}/1278.png"
                                     alt="Dragon Sq Shield"/>
                            </td>
                            <td class="pl-1 pr-1 clickable-row" data-toggle="tooltip"
                                data-href="{{ route('Item Information', '795') }}" title="Dragon Med Helm"
                                style="border: 1px solid black; background: rgba(255,255,255,0.2);">
                                <div style="-webkit-text-fill-color: limegreen; -webkit-text-stroke-width: 1px; -webkit-text-stroke-color: black; margin-top: 0; position: relative; color: white; font-size: 13px; font-weight: 900;">
                                    @if ($dmed)
                                        {{ number_format($dmed) }}
                                    @else
                                        0
                                    @endif
                                </div>
                                <img class="mt-n2" src="{{ asset('img/items') }}/795.png"
                                     alt="Dragon Med Helm"/>
                            </td>
                        </tr>
                        <tr>
                            <td class="pl-1 pr-1 clickable-row" data-toggle="tooltip"
                                data-href="{{ route('Item Information', '522') }}" title="Dragonstone Amulet"
                                style="border: 1px solid black; background: rgba(255,255,255,0.2);">
                                <div style="-webkit-text-fill-color: limegreen; -webkit-text-stroke-width: 1px; -webkit-text-stroke-color: black; margin-top: 0; position: relative; color: white; font-size: 13px; font-weight: 900;">
                                    @if ($dammy)
                                        {{ number_format($dammy) }}
                                    @else
                                        0
                                    @endif
                                </div>
                                <img class="mt-n2" src="{{ asset('img/items') }}/522.png"
                                     alt="Dragonstone Amulet"/>
                            </td>
                            <td class="pl-1 pr-1 clickable-row" data-toggle="tooltip"
                                data-href="{{ route('Item Information', '594') }}" title="Dragon Axe"
                                style="border: 1px solid black; background: rgba(255,255,255,0.2);">
                                <div style="-webkit-text-fill-color: limegreen; -webkit-text-stroke-width: 1px; -webkit-text-stroke-color: black; margin-top: 0; position: relative; color: white; font-size: 13px; font-weight: 900;">
                                    @if ($dbattle)
                                        {{ number_format($dbattle) }}
                                    @else
                                        0
                                    @endif
                                </div>
                                <img class="mt-n2" src="{{ asset('img/items') }}/594.png"
                                     alt="Dragon Axe"/>
                            </td>
                            <td class="pl-1 pr-1 clickable-row" data-toggle="tooltip"
                                data-href="{{ route('Item Information', '593') }}" title="Dragon Sword"
                                style="border: 1px solid black; background: rgba(255,255,255,0.2);">
                                <div style="-webkit-text-fill-color: limegreen; -webkit-text-stroke-width: 1px; -webkit-text-stroke-color: black; margin-top: 0; position: relative; color: white; font-size: 13px; font-weight: 900;">
                                    @if ($dlong)
                                        {{ number_format($dlong) }}
                                    @else
                                        0
                                    @endif
                                </div>
                                <img class="mt-n2" src="{{ asset('img/items') }}/593.png"
                                     alt="Dragon Sword"/>
                            </td>
                            <td class="pl-1 pr-1 clickable-row" data-toggle="tooltip"
                                data-href="{{ route('Item Information', '81') }}" title="Rune 2H Sword"
                                style="border: 1px solid black; background: rgba(255,255,255,0.2);">
                                <div style="-webkit-text-fill-color: limegreen; -webkit-text-stroke-width: 1px; -webkit-text-stroke-color: black; margin-top: 0; position: relative; color: white; font-size: 13px; font-weight: 900;">
                                    @if ($rune2h)
                                        {{ number_format($rune2h) }}
                                    @else
                                        0
                                    @endif
                                </div>
                                <img class="mt-n2" src="{{ asset('img/items') }}/81.png"
                                     alt="Rune 2H Sword"/>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
