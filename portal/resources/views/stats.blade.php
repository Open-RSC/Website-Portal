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

					</table>
				</div>
			</div>
		</div>
	</div>
@endsection
