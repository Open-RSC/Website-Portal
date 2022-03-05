@extends('template')
@section('content')

    <table cellspacing="2" cellpadding="2" bgcolor="#aaaaaa" border="0">
        <tbody>
        <tr>
            <td width="500" bgcolor="#000000">
                <b>The following {{$onlineCount}} players are currently playing {{$world}}:</b>
                <br>
                <table width="650">
                    <tbody>
                    <tr align="left">
                        <th>Player name</th>
                        <th>Playing time</th>
                        <th>Character age</th>
                        <th>Player name</th>
                        <th>Playing time</th>
                        <th>Character age</th></tr>
                    <tr>
                    @foreach ($playersLeftCol as $index => $playerLeft)
                        <tr>
                            <td>{{ $playerLeft->username }}</td>
                            <td>
                                @if ($playerLeft->login_date)
                                    {{ App\Http\OnlineController::formattedTimeSince($playerLeft->login_date) }}
                                @else
                                    Never
                                @endif
                            </td>
                            <td>
                                @if ($playerLeft->creation_date)
                                    {{ App\Http\OnlineController::formattedTimeSince($playerLeft->creation_date) }}
                                @else
                                    Never
                                @endif
                            </td>
                            @if (count($playersRightCol) == 0 || count($playersRightCol) < $index + 1)
                                <td></td>
                                <td></td>
                                <td></td>
                            @else
                                @if ($playerRight = $playersRightCol->get($index))
                                    <td>{{ $playerRight->username }}</td>
                                    <td>
                                        @if ($playerRight->login_date)
                                            {{ App\Http\OnlineController::formattedTimeSince($playerRight->login_date) }}
                                        @else
                                            Never
                                        @endif
                                    </td>
                                    <td>
                                        @if ($playerRight->creation_date)
                                            {{ App\Http\OnlineController::formattedTimeSince($playerRight->creation_date) }}
                                        @else
                                            Never
                                        @endif
                                    </td>
                                @endif
                            @endif
                        </tr>
                    @endforeach
                </table>
            </td>
        </tr>
        </tbody>
    </table>

@endsection