@extends('template')

@section('content')
	<div class="text-info">
		<div class="container">
			<h2 class="h2 text-center pt-5 pb-4 text-capitalize display-3">
				{{ ucfirst($banks->first()->username) }}'s Bank
			</h2>

			<div class="align-items-center pb-3">
				<div class="pb-0 table-transparent row justify-content-center text-primary">
					<img class="pl-5" src="{{ asset('img/avatars').'/'.$banks->first()->playerID }}.png"
						 style="height: 125px;" alt="{{ $banks->first()->username }}">
					<div class="pl-5 col-6">
					<span class="sm-stats text-info pt-3">
						Status:
						@if ($banks->first()->online == 1)
							<span style="color: lime">
								<strong>Online</strong>
							</span>
						@else
							<span style="color: red">
								<strong>Offline</strong>
							</span>
						@endif
					</span>
						<span class="sm-stats text-info">
						Created: {{ Carbon\Carbon::parse($banks->first()->creation_date)->diffForHumans() }}
					</span>
						<span class="sm-stats text-info">
						Last Online:
						@if ($banks->first()->login_date)
								{{ Carbon\Carbon::parse($banks->first()->login_date)->diffForHumans() }}
							@else
								Never
							@endif
					</span>
						@if ($banks->first()->username == 'shar')
							<span class="sm-stats pt-2">
						Shar accepts player item donations for drop parties.
					</span>
							<span class="sm-stats">
						To donate in-game items to Shar, contact a staff member.
					</span>
						@endif
					</div>
				</div>
			</div>

			<!-- Extra large version -->
			<div class="row align-items-center d-none d-xl-block">
				<div class="col">
					<table>
						@if ($banks->count() > 0)
							<tr>
								@foreach ($banks as $key=>$player)
									<td class="pl-1 pr-1 clickable-row" data-toggle="tooltip"
										data-href="{{ route('itemdef', $player->id) }}"
										title="{{ ucfirst($player->name) }}"
										style="border: 1px solid black; background: rgba(255,255,255,0.2);">
										<div
											style="-webkit-text-fill-color: limegreen; -webkit-text-stroke-width: 1px; -webkit-text-stroke-color: black; margin-top: 0; position: relative; color: white; font-size: 13px; font-weight: 900;">
											{{ $player->number }}
										</div>
										<img class="mt-n2" src="{{ asset('img/items').'/'.$player->id }}.png"
											 alt="{{ $player->id }}"/>
									</td>
									@if ($key % 18 == 17)
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
						@if ($banks->count() > 0)
							<tr>
								@foreach ($banks as $key=>$player)
									<td class="pl-1 pr-1 clickable-row" data-toggle="tooltip"
										data-href="{{ route('itemdef', $player->id) }}"
										title="{{ ucfirst($player->name) }}"
										style="border: 1px solid black; background: rgba(255,255,255,0.2);">
										<div
											style="-webkit-text-fill-color: limegreen; -webkit-text-stroke-width: 1px; -webkit-text-stroke-color: black; margin-top: 0; position: relative; color: white; font-size: 13px; font-weight: 900;">
											{{ $player->number }}
										</div>
										<img class="mt-n2" src="{{ asset('img/items').'/'.$player->id }}.png"
											 alt="{{ $player->id }}"/>
									</td>
									@if ($key % 14 == 13)
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
						@if ($banks->count() > 0)
							<tr>
								@foreach ($banks as $key=>$player)
									<td class="pl-1 pr-1 clickable-row" data-toggle="tooltip"
										data-href="{{ route('itemdef', $player->id) }}"
										title="{{ ucfirst($player->name) }}"
										style="border: 1px solid black; background: rgba(255,255,255,0.2);">
										<div
											style="-webkit-text-fill-color: limegreen; -webkit-text-stroke-width: 1px; -webkit-text-stroke-color: black; margin-top: 0; position: relative; color: white; font-size: 13px; font-weight: 900;">
											{{ $player->number }}
										</div>
										<img class="mt-n2" src="{{ asset('img/items').'/'.$player->id }}.png"
											 alt="{{ $player->id }}"/>
									</td>
									@if ($key % 11 == 10)
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
						@if ($banks->count() > 0)
							<tr>
								@foreach ($banks as $key=>$player)
									<td class="pl-1 pr-1 clickable-row" data-toggle="tooltip"
										data-href="{{ route('itemdef', $player->id) }}"
										title="{{ ucfirst($player->name) }}"
										style="border: 1px solid black; background: rgba(255,255,255,0.2);">
										<div
											style="-webkit-text-fill-color: limegreen; -webkit-text-stroke-width: 1px; -webkit-text-stroke-color: black; margin-top: 0; position: relative; color: white; font-size: 13px; font-weight: 900;">
											{{ $player->number }}
										</div>
										<img class="mt-n2" src="{{ asset('img/items').'/'.$player->id }}.png"
											 alt="{{ $player->id }}"/>
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
		</div>
	</div>
	</div>
@endsection
