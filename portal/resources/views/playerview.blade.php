@extends('template')

@section('content')
    <div class="col container">
        <h2 class="h2 text-center text-gray-400 pt-5 pb-4 text-capitalize display-3">
            Player {{ $player->username }} on {{ $db }}
        </h2>
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <a href="{{ route('player_list', $db) }}">Return to list</a>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-6 text-gray-400 pr-5 pl-5 pt-3 pb-3 bg-black">
                @if ($player->login_date)
                    <img class="display-glow float-center pt-2"
                         src="{{ asset('img/avatars') }}/{{ $player->id }}.png" height="100px" width="auto"
                         alt="{{ $player->username }}"/>
                @endif
                <p>
                    Status: 
                    @if ($player->online == 1)
                        <span style="color: lime">
                            <strong>Online</strong>
                        </span>
                    @else
                        <span style="color: red">
                            <strong>Offline</strong>
                        </span>
                    @endif
                </p>
                <p>Player ID: {{ $player->id }}</p>
                <p>Username: {{ $player->username }}</p>
                @if(Gate::allows('admin', Auth::user())) <p>Email: {{ $player->email ?? "None" }}</p> @endif
                <p>Creation Date: {{ \Illuminate\Support\Carbon::createFromTimestamp($player->creation_date)->format("Y-m-d H:i:s") }}</p>
                <p>Login Date: {{ \Illuminate\Support\Carbon::createFromTimestamp($player->login_date)->format("Y-m-d H:i:s") }}</p>
                <p>    
                    Last Online:
                    @if ($player->login_date)
                        {{ Carbon\Carbon::parse($player->login_date)->diffForHumans() }}
                    @else
                        Never
                    @endif
                </p>
                @if(Gate::allows('admin', Auth::user())) <p>Creation IP: {{ $player->creation_ip }}</p> @endif
                @if(Gate::allows('admin', Auth::user())) <p>Login IP: {{ $player->login_ip }}</p> @endif
                <p>Combat Level: {{ $player->combat }} </p>
                <p>Total Level: {{ $player->skill_total }} </p>
                <p>Quest Points: {{ $player->quest_points }} </p>
                <p>Kills: {{ $player->kills }} </p>
                <p>Deaths: {{ $player->deaths }} </p>
                <p>Muted: @if(((int)$player->muted) === -1) Permanently @elseif(((int)$player->muted) > 0) {{ Carbon\Carbon::now()->subSeconds($player->muted)->diffForHumans() }} @else No @endif  </p>
                <p>Banned: @if(((int)$player->banned) === -1) Permanently @elseif(((int)$player->banned) > 0) {{ Carbon\Carbon::now()->subSeconds($player->banned)->diffForHumans() }} @else No @endif  </p>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
    </script>
@endsection