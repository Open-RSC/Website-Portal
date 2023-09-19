@extends('template')

@section('content')
    <div class="col container">
        <h2 class="h2 text-center pt-5 pb-4 text-capitalize display-3">
            {{ ucfirst($bankitems->first()->username) }}'s Bank
        </h2>
        @if(url()->previous() != url()->current())
            <a href="{{ url()->previous() }}">Go back</a>
        @endif
        <div class="align-items-center pb-3">
            <div class="pb-0 table-transparent row justify-content-center text-primary">
                @if (File::exists(public_path('/img/avatars/' . ($db == 'preservation' ? 'openrsc' : $db) . '+' . $bankitems->first()->playerID . '.png')))
                    <div class="col-4 pt-2" style="width: 75px;">
                        <div class="rscfont d-block">
                            <!-- Due to legacy OpenRSC database not following regular naming scheme, we hardcode the db name openrsc -->
                            <img src="{{ asset('/img/avatars/' . ($db == 'preservation' ? 'openrsc' : $db) . '+' . $bankitems->first()->playerID . '.png') }}" alt="({{ $bankitems->first()->username }})"/>
                        </div>
                    </div>
                @endif
                <div class="pl-5 col-6">
					<div class="sm-stats text-info pt-3">
						Status:
						@if ($bankitems->first()->online == 1)
                            <span style="color: lime">
								<strong>Online</strong>
							</span>
                        @else
                            <span style="color: red">
								<strong>Offline</strong>
							</span>
                        @endif
					</div>
                    <div class="sm-stats text-info">
						Created: {{ Carbon\Carbon::parse($bankitems->first()->creation_date)->diffForHumans() }}
					</div>
                    <div class="sm-stats text-info">
						Last Online:
						@if ($bankitems->first()->login_date)
                            {{ Carbon\Carbon::parse($bankitems->first()->login_date)->diffForHumans() }}
                        @else
                            Never
                        @endif
					</div>
                    @if ($bankitems->first()->username == 'shar')
                        <div class="sm-stats pt-2">
						    Shar accepts player item donations for drop parties.
                            To donate in-game items to Shar, contact a staff member.
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- Extra large version -->
        <div class="row align-items-center d-none d-xl-block">
            <div class="col">
                <table>
                    @if ($bankitems->count() > 0)
                        <tr>
                            @foreach ($bankitems as $key=>$player)
                                <td class="pl-1 pr-1 clickable-row" data-toggle="tooltip"
                                    data-href="{{ route('ItemStatsItemList', ['db' => $db, 'itemID' => $player->catalogID]) }}"
                                    title="{{ ucfirst($player->itemName) }}"
                                    style="border: 1px solid black; background: rgba(255,255,255,0.2);">
                                    <div
                                        style="margin-top: 0; position: relative; color: limegreen; font-size: 13px;">
                                        {{ $player->number }}
                                    </div>
                                    <img class="mt-n2" src="{{ asset('img/items').'/'.$player->catalogID }}.png"
                                         alt="{{ $player->catalogID }}"/>
                                </td>
                                @if ($key % 10 == 9)
                        </tr>
                    @endif
                    @endforeach
                    @else
                        No items found.
                    @endif
                </table>
            </div>
        </div>

        <!-- Large version -->
        <div class="row align-items-center d-none d-md-none d-lg-block d-xl-none">
            <div class="col">
                <table>
                    @if ($bankitems->count() > 0)
                        <tr>
                            @foreach ($bankitems as $key=>$player)
                                <td class="pl-1 pr-1 clickable-row" data-toggle="tooltip"
                                    data-href="{{ route('ItemStatsItemList', ['db' => $db, 'itemID' => $player->catalogID]) }}"
                                    title="{{ ucfirst($player->itemName) }}"
                                    style="border: 1px solid black; background: rgba(255,255,255,0.2);">
                                    <div
                                        style="margin-top: 0; position: relative; color: limegreen; font-size: 13px;">
                                        {{ $player->number }}
                                    </div>
                                    <img class="mt-n2" src="{{ asset('img/items').'/'.$player->catalogID }}.png"
                                         alt="{{ $player->catalogID }}"/>
                                </td>
                                @if ($key % 9 == 8)
                        </tr>
                    @endif
                    @endforeach
                    @else
                        No items found.
                    @endif
                </table>
            </div>
        </div>

        <!-- Medium view version -->
        <div class="row align-items-center pl-5 pr-5 d-none d-md-block d-lg-none d-xl-none">
            <div class="col">
                <table>
                    @if ($bankitems->count() > 0)
                        <tr>
                            @foreach ($bankitems as $key=>$player)
                                <td class="pl-1 pr-1 clickable-row" data-toggle="tooltip"
                                    data-href="{{ route('ItemStatsItemList', ['db' => $db, 'itemID' => $player->catalogID]) }}"
                                    title="{{ ucfirst($player->itemName) }}"
                                    style="border: 1px solid black; background: rgba(255,255,255,0.2);">
                                    <div
                                        style="margin-top: 0; position: relative; color: limegreen; font-size: 13px;">
                                        {{ $player->number }}
                                    </div>
                                    <img class="mt-n2" src="{{ asset('img/items').'/'.$player->catalogID }}.png"
                                         alt="{{ $player->catalogID }}"/>
                                </td>
                                @if ($key % 8 == 7)
                        </tr>
                    @endif
                    @endforeach
                    @else
                        No items found.
                    @endif
                </table>
            </div>
        </div>

        <!-- Mobile view version -->
        <div class="row align-items-center pl-4 pr-4 d-sm d-md-none d-lg-none">
            <div class="col">
                <table>
                    @if ($bankitems->count() > 0)
                        <tr>
                            @foreach ($bankitems as $key=>$player)
                                <td class="pl-1 pr-1 clickable-row" data-toggle="tooltip"
                                    data-href="{{ route('ItemStatsItemList', ['db' => $db, 'itemID' => $player->catalogID]) }}"
                                    title="{{ ucfirst($player->itemName) }}"
                                    style="border: 1px solid black; background: rgba(255,255,255,0.2);">
                                    <div
                                        style="margin-top: 0; position: relative; color: limegreen; font-size: 13px;">
                                        {{ $player->number }}
                                    </div>
                                    <img class="mt-n2" src="{{ asset('img/items').'/'.$player->catalogID }}.png"
                                         alt="{{ $player->catalogID }}"/>
                                </td>
                                @if ($key % 6 == 5)
                        </tr>
                    @endif
                    @endforeach
                    @else
                        No items found.
                    @endif
                </table>
            </div>
        </div>
    </div>
    </div>
@endsection
