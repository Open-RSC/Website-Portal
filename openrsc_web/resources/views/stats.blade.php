@extends('template')

@section('content')
	<div class="text-info">
		<div class="container">
			<h2 class="h2 text-center pt-5 pb-4 text-capitalize display-3">
				Statistics
			</h2>

			<div class="row justify-content-center table-transparent">
				<div class="text-primary">
					<h4 class="pt-4 h3 text-white">Accounts</h4>
					<span class="d-block">
						<a class="text-info font-weight-bold" href="{{ route('online') }}">{{ $online }}</a> players currently logged in.
					</span>
					<span class="d-block">
						<a class="text-info font-weight-bold" href="{{ route('createdtoday') }}">{{ $createdToday }}</a> players have been registered today.
					</span>
					<span class="d-block">
						<a class="text-info font-weight-bold" href="{{ route('logins48') }}">{{ $logins48 }}</a> players logged in the last 48 hours.
					</span>
					<span class="d-block">
						<span class="text-info font-weight-bold">{{ $uniquePlayers }}</span> people have created
						<span class="text-info font-weight-bold">{{ $totalPlayers }}</span> players.
					</span>
					<span class="d-block">
						<span class="text-info font-weight-bold">{{ $totalTime }}</span> played.
					</span>

					<h4 class="pt-4 h3 text-white">Combat</h4>
					<span class="d-block">
						<span class="text-info font-weight-bold">{{ $combat30 }}</span> players over combat level 30.
					</span>
					<span class="d-block">
						<span class="text-info font-weight-bold">{{ $combat50 }}</span> players over combat level 50.
					</span>
					<span class="d-block">
						<span class="text-info font-weight-bold">{{ $combat80 }}</span> players over combat level 80.
					</span>
					<span class="d-block">
						<span class="text-info font-weight-bold">{{ $combat90 }}</span> players over combat level 90.
					</span>
					<span class="d-block">
						<span class="text-info font-weight-bold">{{ $combat100 }}</span> players over combat level 100.
					</span>
					<span class="d-block">
						<span class="text-info font-weight-bold">{{ $combat123 }}</span> players are combat level 123.
					</span>

					<h4 class="pt-4 h3 text-white">Quests</h4>
					<span class="d-block">
						<span class="text-info font-weight-bold">{{ $startedQuest }}</span> players have begun a quest.
					</span>

					<h4 class="pt-4 h3 text-white">Wealth</h4>
					<span class="d-block">
						<span class="text-info font-weight-bold">{{ number_format($sumgold) }}</span> gp total in-game.
					</span>
					<span class="d-block">
						<span class="text-info font-weight-bold">{{ number_format($gold30) }}</span> players have over 30K gp.
					</span>
					<span class="d-block">
						<span class="text-info font-weight-bold">{{ number_format($gold50) }}</span> players have over 50K gp.
					</span>
					<span class="d-block">
						<span class="text-info font-weight-bold">{{ number_format($gold80) }}</span> players have over 80K gp.
					</span>
					<span class="d-block">
						<span class="text-info font-weight-bold">{{ number_format($gold120) }}</span> players have over 120K gp.
					</span>
					<span class="d-block">
						<span class="text-info font-weight-bold">{{ number_format($gold400) }}</span> players have over 400K gp.
					</span>
					<span class="d-block">
						<span class="text-info font-weight-bold">{{ number_format($gold1m) }}</span> players have over 1M gp.
					</span>
					<span class="d-block">
						<span class="text-info font-weight-bold">{{ number_format($gold12m) }}</span> players have over 1.2M gp.
					</span>
					<span class="d-block">
						<span class="text-info font-weight-bold">{{ number_format($gold15m) }}</span> players have over 1.5M gp.
					</span>
					<span class="d-block">
						<span class="text-info font-weight-bold">{{ number_format($gold2m) }}</span> players have over 2M gp.
					</span>
					<span class="d-block">
						<span class="text-info font-weight-bold">{{ number_format($gold4m) }}</span> players have over 4M gp.
					</span>
					<span class="d-block">
						<span class="text-info font-weight-bold">{{ number_format($gold10m) }}</span> players have over 10M gp.
					</span>

					<h4 class="pt-4 h3 text-white">Important Items Summary</h4>
					<table>
						<tr>
							<td class="pl-1 pr-1 clickable-row" data-toggle="tooltip"
								data-href="{{ route('itemdef', '575') }}" title="Christmas Cracker"
								style="border: 1px solid black; background: rgba(255,255,255,0.2);">
								<div
									style="-webkit-text-fill-color: limegreen; -webkit-text-stroke-width: 1px; -webkit-text-stroke-color: black; margin-top: 0; position: relative; color: white; font-size: 13px; font-weight: 900;">
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
								data-href="{{ route('itemdef', '575') }}" title="Yellow Party Hat"
								style="border: 1px solid black; background: rgba(255,255,255,0.2);">
								<div
									style="-webkit-text-fill-color: limegreen; -webkit-text-stroke-width: 1px; -webkit-text-stroke-color: black; margin-top: 0; position: relative; color: white; font-size: 13px; font-weight: 900;">
									@if ($yellowphat)
										{{ number_format($yellowphat) }}
									@else
										0
									@endif
								</div>
								<img class="mt-n2" src="{{ asset('img/items') }}/577.png"
									 alt="Yellow Party Hat"/>
							</td>
							<td class="pl-1 pr-1 clickable-row" data-toggle="tooltip"
								data-href="{{ route('itemdef', '581') }}" title="White Party Hat"
								style="border: 1px solid black; background: rgba(255,255,255,0.2);">
								<div
									style="-webkit-text-fill-color: limegreen; -webkit-text-stroke-width: 1px; -webkit-text-stroke-color: black; margin-top: 0; position: relative; color: white; font-size: 13px; font-weight: 900;">
									@if ($whitephat)
										{{ number_format($whitephat) }}
									@else
										0
									@endif
								</div>
								<img class="mt-n2" src="{{ asset('img/items') }}/581.png"
									 alt="White Party Hat"/>
							</td>
							<td class="pl-1 pr-1 clickable-row" data-toggle="tooltip"
								data-href="{{ route('itemdef', '580') }}" title="Purple Party Hat"
								style="border: 1px solid black; background: rgba(255,255,255,0.2);">
								<div
									style="-webkit-text-fill-color: limegreen; -webkit-text-stroke-width: 1px; -webkit-text-stroke-color: black; margin-top: 0; position: relative; color: white; font-size: 13px; font-weight: 900;">
									@if ($purplephat)
										{{ number_format($purplephat) }}
									@else
										0
									@endif
								</div>
								<img class="mt-n2" src="{{ asset('img/items') }}/580.png"
									 alt="Purple Party Hat"/>
							</td>
							<td class="pl-1 pr-1 clickable-row" data-toggle="tooltip"
								data-href="{{ route('itemdef', '576') }}" title="Red Party Hat"
								style="border: 1px solid black; background: rgba(255,255,255,0.2);">
								<div
									style="-webkit-text-fill-color: limegreen; -webkit-text-stroke-width: 1px; -webkit-text-stroke-color: black; margin-top: 0; position: relative; color: white; font-size: 13px; font-weight: 900;">
									@if ($redphat)
										{{ number_format($redphat) }}
									@else
										0
									@endif
								</div>
								<img class="mt-n2" src="{{ asset('img/items') }}/576.png"
									 alt="Red Party Hat"/>
							</td>
							<td class="pl-1 pr-1 clickable-row" data-toggle="tooltip"
								data-href="{{ route('itemdef', '578') }}" title="Blue Party Hat"
								style="border: 1px solid black; background: rgba(255,255,255,0.2);">
								<div
									style="-webkit-text-fill-color: limegreen; -webkit-text-stroke-width: 1px; -webkit-text-stroke-color: black; margin-top: 0; position: relative; color: white; font-size: 13px; font-weight: 900;">
									@if ($bluephat)
										{{ number_format($bluephat) }}
									@else
										0
									@endif
								</div>
								<img class="mt-n2" src="{{ asset('img/items') }}/578.png"
									 alt="Blue Party Hat"/>
							</td>
							<td class="pl-1 pr-1 clickable-row" data-toggle="tooltip"
								data-href="{{ route('itemdef', '579') }}" title="Green Party Hat"
								style="border: 1px solid black; background: rgba(255,255,255,0.2);">
								<div
									style="-webkit-text-fill-color: limegreen; -webkit-text-stroke-width: 1px; -webkit-text-stroke-color: black; margin-top: 0; position: relative; color: white; font-size: 13px; font-weight: 900;">
									@if ($greenphat)
										{{ number_format($greenphat) }}
									@else
										0
									@endif
								</div>
								<img class="mt-n2" src="{{ asset('img/items') }}/579.png"
									 alt="Green Party Hat"/>
							</td>
						</tr>
						<tr>
							<td class="pl-1 pr-1 clickable-row" data-toggle="tooltip"
								data-href="{{ route('itemdef', '422') }}" title="Pumpkin"
								style="border: 1px solid black; background: rgba(255,255,255,0.2);">
								<div
									style="-webkit-text-fill-color: limegreen; -webkit-text-stroke-width: 1px; -webkit-text-stroke-color: black; margin-top: 0; position: relative; color: white; font-size: 13px; font-weight: 900;">
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
								data-href="{{ route('itemdef', '677') }}" title="Easter Egg"
								style="border: 1px solid black; background: rgba(255,255,255,0.2);">
								<div
									style="-webkit-text-fill-color: limegreen; -webkit-text-stroke-width: 1px; -webkit-text-stroke-color: black; margin-top: 0; position: relative; color: white; font-size: 13px; font-weight: 900;">
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
								data-href="{{ route('itemdef', '831') }}" title="Red Halloween Mask"
								style="border: 1px solid black; background: rgba(255,255,255,0.2);">
								<div
									style="-webkit-text-fill-color: limegreen; -webkit-text-stroke-width: 1px; -webkit-text-stroke-color: black; margin-top: 0; position: relative; color: white; font-size: 13px; font-weight: 900;">
									@if ($redmask)
										{{ number_format($redmask) }}
									@else
										0
									@endif
								</div>
								<img class="mt-n2" src="{{ asset('img/items') }}/831.png"
									 alt="Red Halloween Mask"/>
							</td>
							<td class="pl-1 pr-1 clickable-row" data-toggle="tooltip"
								data-href="{{ route('itemdef', '832') }}" title="Blue Halloween Mask"
								style="border: 1px solid black; background: rgba(255,255,255,0.2);">
								<div
									style="-webkit-text-fill-color: limegreen; -webkit-text-stroke-width: 1px; -webkit-text-stroke-color: black; margin-top: 0; position: relative; color: white; font-size: 13px; font-weight: 900;">
									@if ($bluemask)
										{{ number_format($bluemask) }}
									@else
										0
									@endif
								</div>
								<img class="mt-n2" src="{{ asset('img/items') }}/832.png"
									 alt="Blue Halloween Mask"/>
							</td>
							<td class="pl-1 pr-1 clickable-row" data-toggle="tooltip"
								data-href="{{ route('itemdef', '828') }}" title="Green Halloween Mask"
								style="border: 1px solid black; background: rgba(255,255,255,0.2);">
								<div
									style="-webkit-text-fill-color: limegreen; -webkit-text-stroke-width: 1px; -webkit-text-stroke-color: black; margin-top: 0; position: relative; color: white; font-size: 13px; font-weight: 900;">
									@if ($greenmask)
										{{ number_format($greenmask) }}
									@else
										0
									@endif
								</div>
								<img class="mt-n2" src="{{ asset('img/items') }}/828.png"
									 alt="Green Halloween Mask"/>
							</td>
							<td class="pl-1 pr-1 clickable-row" data-toggle="tooltip"
								data-href="{{ route('itemdef', '971') }}" title="Santa's Hat"
								style="border: 1px solid black; background: rgba(255,255,255,0.2);">
								<div
									style="-webkit-text-fill-color: limegreen; -webkit-text-stroke-width: 1px; -webkit-text-stroke-color: black; margin-top: 0; position: relative; color: white; font-size: 13px; font-weight: 900;">
									@if ($santahat)
										{{ number_format($santahat) }}
									@else
										0
									@endif
								</div>
								<img class="mt-n2" src="{{ asset('img/items') }}/971.png"
									 alt="Santa's Hat"/>
							</td>
							<td class="pl-1 pr-1 clickable-row" data-toggle="tooltip"
								data-href="{{ route('itemdef', '1156') }}" title="Bunny Ears"
								style="border: 1px solid black; background: rgba(255,255,255,0.2);">
								<div
									style="-webkit-text-fill-color: limegreen; -webkit-text-stroke-width: 1px; -webkit-text-stroke-color: black; margin-top: 0; position: relative; color: white; font-size: 13px; font-weight: 900;">
									@if ($bunnyears)
										{{ number_format($bunnyears) }}
									@else
										0
									@endif
								</div>
								<img class="mt-n2" src="{{ asset('img/items') }}/1156.png"
									 alt="Bunny Ears"/>
							</td>
						</tr>
						<tr>
							<td class="pl-1 pr-1 clickable-row" data-toggle="tooltip"
								data-href="{{ route('itemdef', '1289') }}" title="Scythe"
								style="border: 1px solid black; background: rgba(255,255,255,0.2);">
								<div
									style="-webkit-text-fill-color: limegreen; -webkit-text-stroke-width: 1px; -webkit-text-stroke-color: black; margin-top: 0; position: relative; color: white; font-size: 13px; font-weight: 900;">
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
								data-href="{{ route('itemdef', '1278') }}" title="Dragon Square Shield"
								style="border: 1px solid black; background: rgba(255,255,255,0.2);">
								<div
									style="-webkit-text-fill-color: limegreen; -webkit-text-stroke-width: 1px; -webkit-text-stroke-color: black; margin-top: 0; position: relative; color: white; font-size: 13px; font-weight: 900;">
									@if ($dsq)
										{{ number_format($dsq) }}
									@else
										0
									@endif
								</div>
								<img class="mt-n2" src="{{ asset('img/items') }}/1278.png"
									 alt="Dragon Square Shield"/>
							</td>
							<td class="pl-1 pr-1 clickable-row" data-toggle="tooltip"
								data-href="{{ route('itemdef', '795') }}" title="Dragon Medium Helmet"
								style="border: 1px solid black; background: rgba(255,255,255,0.2);">
								<div
									style="-webkit-text-fill-color: limegreen; -webkit-text-stroke-width: 1px; -webkit-text-stroke-color: black; margin-top: 0; position: relative; color: white; font-size: 13px; font-weight: 900;">
									@if ($dmed)
										{{ number_format($dmed) }}
									@else
										0
									@endif
								</div>
								<img class="mt-n2" src="{{ asset('img/items') }}/795.png"
									 alt="Dragon Medium Helmet"/>
							</td>
							<td class="pl-1 pr-1 clickable-row" data-toggle="tooltip"
								data-href="{{ route('itemdef', '597') }}" title="Dragon Amulet"
								style="border: 1px solid black; background: rgba(255,255,255,0.2);">
								<div
									style="-webkit-text-fill-color: limegreen; -webkit-text-stroke-width: 1px; -webkit-text-stroke-color: black; margin-top: 0; position: relative; color: white; font-size: 13px; font-weight: 900;">
									@if ($dammy)
										{{ number_format($dammy) }}
									@else
										0
									@endif
								</div>
								<img class="mt-n2" src="{{ asset('img/items') }}/597.png"
									 alt="Dragon Amulet"/>
							</td>
							<td class="pl-1 pr-1 clickable-row" data-toggle="tooltip"
								data-href="{{ route('itemdef', '594') }}" title="Dragon Axe"
								style="border: 1px solid black; background: rgba(255,255,255,0.2);">
								<div
									style="-webkit-text-fill-color: limegreen; -webkit-text-stroke-width: 1px; -webkit-text-stroke-color: black; margin-top: 0; position: relative; color: white; font-size: 13px; font-weight: 900;">
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
								data-href="{{ route('itemdef', '593') }}" title="Dragon Sword"
								style="border: 1px solid black; background: rgba(255,255,255,0.2);">
								<div
									style="-webkit-text-fill-color: limegreen; -webkit-text-stroke-width: 1px; -webkit-text-stroke-color: black; margin-top: 0; position: relative; color: white; font-size: 13px; font-weight: 900;">
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
								data-href="{{ route('itemdef', '18') }}" title="Cabbage"
								style="border: 1px solid black; background: rgba(255,255,255,0.2);">
								<div
									style="-webkit-text-fill-color: limegreen; -webkit-text-stroke-width: 1px; -webkit-text-stroke-color: black; margin-top: 0; position: relative; color: white; font-size: 13px; font-weight: 900;">
									@if ($cabbage)
										{{ number_format($cabbage) }}
									@else
										0
									@endif
								</div>
								<img class="mt-n2" src="{{ asset('img/items') }}/18.png"
									 alt="Cabbage"/>
							</td>
						</tr>
					</table>
				</div>
			</div>
		</div>
	</div>
@endsection
