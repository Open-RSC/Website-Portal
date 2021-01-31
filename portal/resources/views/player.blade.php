@extends('template')

@section('content')
		<div class="col container">
			<h2 class="h2 text-center pt-5 pb-4 text-capitalize display-3">
				@if ($players->first()->group_id < '10')
					<img class="mb-3" src="{{ asset('img') }}/{{ $players->first()->group_id }}.svg" height="34px"
						 width="auto" alt="group {{ $players->first()->group_id }}"/>
				@endif
				<span class="ml-n3">{{ ucfirst($players->first()->username) }}</span>
			</h2>

			<div class="sm-stats pl-3 pr-3">
				<div class="pb-0 stats row justify-content-center text-primary">
					<img class="pl-5" src="{{ asset('img/avatars').'/'.$players->first()->id }}.png"
						 style="height: 125px;" alt="{{ $players->first()->username }}">
					<div class="pl-5 col-6">
					<span class="sm-stats text-info pt-3">
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
						<span class="sm-stats text-info">
						Created: {{ Carbon\Carbon::parse($players->first()->creation_date)->diffForHumans() }}
					</span>
						<span class="sm-stats text-info">
						Last Online:
						@if ($players->first()->login_date)
								{{ Carbon\Carbon::parse($players->first()->login_date)->diffForHumans() }}
							@else
								Never
							@endif
					</span>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
