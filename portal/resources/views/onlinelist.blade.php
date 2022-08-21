@extends('template')

@section('content')

    <span class="fw-bold text-center pb-2">
        There are {{$onlineCount}} players logged in to
        <span style="color: yellow;">
            {{$world}}
        </span>
    </span>
    <table class="e" style="width: 450px; background: black">
        <tr>
            <th></th>
            <th class="fw-bold pt-3 pl-6 pr-3 text-left">Name</th>
            <th class="fw-bold pt-3 text-left">Logged In</th>
            <th class="fw-bold pt-3 pl-6 pr-6 text-left">Cumulative Play</th>
        </tr>
        @foreach ($players as $index => $player)
            <tr>
                <td class="pl-3">
                    @if($db== 'preservation')
                        <div class="ml-3 pb-1">
                            <div class="rounded-circle" style="height: 64px; width: 64px; overflow: hidden;">
                                <a class="c" href="/player/{{ $db }}/{{ $player->username }}">
                                    <!-- Due to legacy OpenRSC database not following regular naming scheme -->
                                    <img src="{{ asset('/img/avatars').'/'.'openrsc'.'+'.$player->id }}.png"
                                         alt="({{ $player->username }})" onerror="this.style.display='none'"
                                         style="margin-top: -32px; padding-top: 35px; background-color: #0A0A0A;"/>
                                </a>
                            </div>
                        </div>
                    @else
                        <div class="ml-3 pb-1">
                            <div class="rounded-circle" style="height: 64px; width: 64px; overflow: hidden;">
                                <a class="c" href="/player/{{ $db }}/{{ $player->username }}">
                                    <img src="{{ asset('/img/avatars').'/'.$db.'+'.$player->id }}.png"
                                         alt="({{ $player->username }})" onerror="this.style.display='none'"
                                         style="margin-top: -32px; padding-top: 35px; background-color: #0A0A0A;"/>
                                </a>
                            </div>
                        </div>
                    @endif
                </td>
                <td class="pl-6 pr-3 text-left">
                    <a class="c" href="/player/{{ $db }}/{{ $player->username }}">{{ $player->username }}</a>
                </td>
                <td class="text-left">
                    {{ App\Http\OnlineController::formattedTimeSince($player->login_date) }}
                </td>
                <td class="pl-6 pr-6 text-left">
                    {{ App\Http\OnlineController::formattedCumTime($player->value/1000, $player->login_date) }}

                </td>
            </tr>
        @endforeach
    </table>
@endsection