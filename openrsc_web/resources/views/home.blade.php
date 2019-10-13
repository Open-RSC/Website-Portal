@extends('template')

@section('content')
	<div class="row">

		<!-- Left column -->
		<div class="col side-left text-info border-secondary border-right">
			<h4 class="pl-3 pr-3">Latest Achievements</h4>
			<div class="text-primary ml-3 mr-3" style="font-size: 13px;">
				@foreach ($activityfeed as $activity)
					<div class="row clickable-row" data-href="../player/{{ $activity->id }}">
						<div class="col-sm text-info font-weight-bold">
							<span class="small">{{ Carbon\Carbon::parse($activity->time)->diffForHumans() }}</span>
						</div>
						<div class="col-9 pr-1 pl-1">
							@if($activity->group_id != 10)
								<img class="mb-1" src="./img/{{ $activity->group_id }}.svg" width="15" height="15">
							@endif
							<img class="pr-2 float-left" src="./img/avatars/{{ $activity->id }}.png"
								 width="36" height="48">
							<span class="font-weight-bold">{{ ucfirst($activity->username) }}</span>
							{!! $activity->message !!}
						</div>
						<div class="border-top border-info mt-3"></div>
					</div>
				@endforeach
			</div>
		</div>

		<!-- Center column with title text -->
		<div class="col container text-center">
			<div class="d-block pt-4">
				<img src="{{ asset('img/logo.png') }}" class="img-fluid" alt="logo">
			</div>

			<div class="d-block pb-3">
				<div class="text-white-50">Striving for a replica RSC game and more</div>
			</div>

			<div class="d-block pt-1 pb-4">
				<div class="btn btn-md btn-secondary dropdown-toggle" data-toggle="dropdown"
					 aria-haspopup="true"
					 aria-expanded="false">
					Downloads
				</div>
				<div class="dropdown-menu bg-dark" style="padding: 0;">
					<a class="dropdown-item text-white-50 bg-dark"
					   href="{{ asset('downloads/OpenRSC%20Launcher.exe') }}">Windows</a>
					<a class="dropdown-item text-white-50 bg-dark" href="{{ asset('downloads/OpenRSC.jar') }}">Mac /
						Linux</a>
					<a class="dropdown-item text-white-50 bg-dark" href="{{ asset('downloads/openrsc.apk') }}">Android
						App</a>
					<a class="dropdown-item text-white-50 bg-dark"
					   href="https://gitlab.openrsc.com/open-rsc/Single-Player/-/releases">Single
						Player</a>
					<a class="dropdown-item text-white-50 bg-dark" href="https://gitlab.openrsc.com/open-rsc/Game"
					   target="_blank">Source Code</a>
				</div>
			</div>

			<div class="middle container-fluid border-top border-info">
				<div class="text-left text-primary">
					<br>
					<h4 class="text-info">Statistics</h4>
					<div>
						Players Online:
						<a href="{{ route('online') }}">
                    <span class="text-info float-right">
                        {{ $online }}
                    </span>
						</a>
					</div>
					<div>
						Server Status:
						<span class="float-right">
                    {!! $status !!}
                </span>
					</div>
					<div>
						Players Created Today:
						<a href="{{ route('createdtoday') }}">
                        <span class="text-info float-right">
                            {{ $registrations }}
                        </span>
						</a>
					</div>
					<div>
						Online Last 48 Hours:
						<a href="{{ route('logins48') }}">
                        <span class="text-info float-right">
                            {{ $logins }}
                        </span>
						</a>
					</div>
					<div>
						Unique Players:
						<a href="{{ route('stats') }}">
                        <span class="text-info float-right">
                            {{ $uniquePlayers }}
                        </span>
						</a>
					</div>
					<div>
						Total Players:
						<a href="{{ route('stats') }}">
                        <span class="text-info float-right">
                            {{ $totalPlayers }}
                        </span>
						</a>
					</div>
					<div>
						Sum Gold:
						<a href="{{ route('stats') }}">
                        <span class="text-info float-right">
							{{ number_format($sumgold) }}
							<img class="mt-n2 ml-n2" src="{{ asset('img/items/10.png') }}"
								 alt="coins" height="24px" width="32px"/>
                        </span>
						</a>
					</div>
					<div>
						Cumulative Play:
						<a href="{{ route('stats') }}">
                        <span class="text-info float-right">
                            {{ $totalTime }}
                        </span>
						</a>
					</div>
					<br>
				</div>
			</div>
		</div>
	</div>
@endsection
