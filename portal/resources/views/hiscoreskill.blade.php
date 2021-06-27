@extends('template')

@section('content')
    <div class="col container">
        <h2 class="h2 text-center pt-5 pb-4 text-capitalize display-3">Hiscores</h2>
        <div class="row no-gutters">

            <!-- placeholder left column -->
            <div class="col"></div>

            <!-- center column -->
            <div class="col-auto" style="width: 600px;">
                <div class="float-left h3 text-white">{{ ucfirst($subpage) }}</div>

                <div class="float-right">
                    <nav>
                        <ul class="menu skill-dropdown">
                            <li>
                                <label for="drop-skills" class="toggle">Skills ▾</label>
                                <a href="#" style="padding-top: 0; padding-bottom: 0;">
                                    Skills
                                </a>
                                <input type="checkbox" id="drop-skills"/>
                                <ul style="margin-top: -15px; margin-left: -6px;">
                                    <li>
                                        @foreach ($skill_array as $skill)
                                            <a class="dropdown-item text-secondary"
                                               href="/hiscores/{{ $skill }}">
                                                <img src="{{ asset('img/skill_icons').'/'.$skill }}.svg"
                                                     alt="{{ $skill }}" height="20px"/>
                                                {{ ucwords(preg_replace("/[^A-Za-z0-9 ]/", " ", $skill)) }}
                                            </a>
                                        @endforeach
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                </div>

                <table id="List"
                       class="container-fluid table-striped table-hover text-primary table-transparent">
                    <thead class="border-bottom border-info thead-dark">
                    <tr class="row text-info">
                        <th class="col-1 text-right">Rank</th>
                        <th class="col-sm-4 text-left">Player</th>
                        <th class="col-1 text-right">Level</th>
                        <th class="col-sm-3 text-left">XP</th>
                        <th class="col-sm-3 text-right">Last Login</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($hiscores as $key=>$player)
                        <tr class="row clickable-row" data-href="{{ route('player', $player->id) }}">
                            <!--Rank-->
                            <td class="col-1 text-right">
                                <span>
                                    {{ ($hiscores->currentpage()-1) * $hiscores->perpage() + $key + 1 }}
                                </span>
                            </td>
                            <!--Player-->
                            <td class="col-sm-4 text-left">
                                <span>
                                    {{ ucfirst($player->username) }}
                                </span>
                            </td>
                            <!--Level-->
                            <td class="col-1 text-right">
                                <span>
                                    {{ number_format((new App\Http\HiscoresController)->experienceToLevel($player->$subpage/4.0)) }}
                                </span>
                            </td>
                            <!--XP-->
                            <td class="col-sm-3 text-left">
									<span>
										{{ number_format($player->$subpage/4.0) }}
									</span>
                            </td>
                            <!--Last Login-->
                            <td class="col-sm-3 text-right">
                                @if($player->login_date != 0)
                                    <span>
                                        {{ Carbon\Carbon::parse($player->login_date)->diffForHumans() }}
                                    </span>
                                @else
                                    <span>Never</span>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{ $hiscores->links('pagination::bootstrap-4') }}
            </div>

            <!-- right column -->
            <div class="col">
                <div class="text-center">
                    <label for="inputBox"></label>
                    <input type="text" class="text-center" id="inputBox" onkeyup="search()"
                           placeholder="Search this page" style="height: 33px;">
                </div>
            </div>
        </div>
    </div>
@endsection
