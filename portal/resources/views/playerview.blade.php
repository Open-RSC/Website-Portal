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
                <p>Rank: {{ str_replace('User', 'Player', ucwords(str_replace('_', ' ', array_search($player->group_id, config('group'), true)))) ?: 'Player' }}</p>
                @if(Gate::allows('moderator', Auth::user())) <p>Email: {{ $player->email ?? "None" }}</p> @endif
                <p>Creation Date: {{ \Illuminate\Support\Carbon::createFromTimestamp($player->creation_date)->format("Y-m-d H:i:s") }}</p>
                <p>Login Date: {{ \Illuminate\Support\Carbon::createFromTimestamp($player->login_date)->format("Y-m-d H:i:s") }}</p>
                <p>
                    Last Login:
                    @if ($player->login_date)
                        {{ Carbon\Carbon::parse($player->login_date)->diffForHumans() }}
                    @else
                        Never
                    @endif
                </p>
                @if(Gate::allows('admin', Auth::user()))
                    <p>Creation IP: <a href="https://ipinfo.io/{{ $player->creation_ip }}" target="_blank" rel="noopener noreferrer">{{ $player->creation_ip }}</a></p>
                @endif
                @if(Gate::allows('admin', Auth::user()))
                    <p>Login IP: <a href="https://ipinfo.io/{{ $player->login_ip }}" target="_blank" rel="noopener noreferrer">{{ $player->login_ip }}</a></p>
                @endif
                <p>Combat Level: {{ $player->combat }} </p>
                <p>Total Level: {{ $player->skill_total }} </p>
                <p>Quest Points: {{ $player->quest_points }} </p>
                <p>Time Played: {{ $timePlayed }}</p>
                <p>X: {{ $player->x }} </p>
                <p>Y: {{ $player->y }} </p>
                <p>Kills: {{ $player->kills }} </p>
                <p>Deaths: {{ $player->deaths }} </p>
                <p>
                    @if ((int) $player->muted === -1)
                        Muted: Permanently
                    @elseif ((int) $player->muted > 0)
                        @if (time() * 1000 < (int) $player->muted)
                            Muted until: {{ Carbon\Carbon::createFromTimestamp($player->muted / 1000)->format('Y-m-d H:i:s T') }}
                        @else
                            Previously muted until: {{ Carbon\Carbon::createFromTimestamp($player->muted / 1000)->format('Y-m-d H:i:s T') }}
                        @endif
                    @else
                       Muted: No
                    @endif
                </p>
                <p>
                    @if ((int) $player->banned === -1)
                       Banned: Permanently
                    @elseif ((int) $player->banned > 0)
                        @if (time() * 1000 < (int) $player->banned)
                            Banned until: {{ Carbon\Carbon::createFromTimestamp($player->banned / 1000)->format('Y-m-d H:i:s T') }}
                        @else
                            Previously banned until: {{ Carbon\Carbon::createFromTimestamp($player->banned / 1000)->format('Y-m-d H:i:s T') }}
                        @endif
                    @else
                        Banned: No
                    @endif
                </p>
                @if(Gate::allows('admin', Auth::user()))
                    <p>Bank Pin: {{ !empty($playerData['bank_pin']) ? "Yes" : "No" }} </p>
                @endif
                <p>Block Private: {{ $player->block_private === 1 ? "Yes" : "No" }} </p>
                <p>Block Chat: {{ $player->block_chat === 1 ? "Yes" : "No" }} </p>
                <p>Block Trade: {{ $player->block_trade === 1 ? "Yes" : "No" }} </p>
                <p>Block Duel: {{ $player->block_duel === 1 ? "Yes" : "No" }} </p>
                <p>
                    <a href="/player/{{$db}}/{{$player->username}}" target="_blank" rel="noopener noreferrer">View Stats</a>
                </p>
                @if (\App\Models\players::hasBank($db, $player->id))
                    <p>
                        <a href="/staff/player/{{$db}}/{{$player->username}}/bank" target="_blank" rel="noopener noreferrer">View Bank</a>
                    </p>
                @endif
                @if (\App\Models\players::hasInventory($db, $player->id))
                    <p>
                        <a href="/staff/player/{{$db}}/{{$player->username}}/inventory" target="_blank" rel="noopener noreferrer">View Inventory</a>
                    </p>
                @endif
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
    </script>
@endsection
