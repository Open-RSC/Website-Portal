@extends('template')

@section('content')

    <span class="fw-bold text-center pb-2">
        There have been {{$onlineCount}} online over the last 48 hours in
        <span style="color: yellow;">
            {{$world}}
        </span>
    </span>
    <table class="e" style="width: 500px; background: black">
        <tr>
            <th></th>
            <th class="fw-bold pt-3 pl-1 pr-3 text-left">Name</th>
            <th class="fw-bold pt-3 text-left pr-3">Last Login</th>
            <th class="fw-bold pt-3 text-left pr-3">Created</th>
            <th class="fw-bold pt-3 text-left pr-1">Total Play</th>
        </tr>
        @foreach ($players as $index => $player)
            <tr>
                <td class="pl-1">
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
                <td class="pl-3 pr-3 text-left">
                    @if ($player->online)
                        <a class="c" style="color: #01fe00;" href="/player/{{ $db }}/{{ $player->username }}">{{ $player->username }}</a>
                    @else
                        <a class="c" style="color: #ff0101;" href="/player/{{ $db }}/{{ $player->username }}">{{ $player->username }}</a>
                    @endif
                </td>
                <td class="text-left pr-3">
                    @if ($player->login_date)
                        {{ Carbon\Carbon::parse($player->login_date)->diffForHumans() }}
                    @else
                        Never
                    @endif
                </td>
                <td class="text-left pr-3">
                    {{ Carbon\Carbon::parse($player->creation_date)->diffForHumans() }}
                </td>
                <td class="text-left pr-1">
                    {{ App\Http\OnlineController::formattedCumTime($player->value/1000, $player->login_date) }}
                </td>
            </tr>
        @endforeach
    </table>
@endsection