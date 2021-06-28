@extends('template')

@section('content')
    <div class="container">
        <div class="hiscores row">
            <div class="hiscore-links"><h4><span>Select hiscore table</span></h4>
                <div class="hiscores-panel">
                    @foreach ($skill_array as $skill)
                        <a class="hiscores-link" href="/hiscores/{{ $skill }}">
                            @if($skill == 'hits')
                                Fighting
                            @elseif($skill == 'skill_total')
                                Overall
                            @else
                                {{ ucwords(preg_replace("/[^A-Za-z0-9 ]/", " ", $skill)) }}
                            @endif
                        </a>
                    @endforeach
                </div>
            </div>
            <div class="hiscore-table">
                <h4>
                    @if($subpage ?? '' == null)
                        <b>Overall Hiscores</b>
                    @elseif($subpage ?? '' == 'hits')
                        <b>Fighting Hiscores</b>
                    @else
                        <b>{{ ucfirst($subpage ?? '') }} Hiscores</b>
                    @endif
                </h4>
                <div class="hiscores-panel"><a class="page-link"
                                               href="/hiscores/?highlight=0&amp;skill={{ $subpage ?? '' }}&amp;rank=10"
                                               title="View higher ranks">&lt;</a>
                    <table>
                        <thead>
                        <tr class="row text-info">
                            <th class="col-1 text-right">Rank</th>
                            <th class="col-sm-4 text-left">Name</th>
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
                                <!--Total Level-->
                                <td class="col-1 text-right">
                                <span>
                                    {{ number_format($player->skill_total) }}
                                </span>
                                </td>
                                <!--Total XP-->
                                <td class="col-sm-3 text-left">
                                <span>
                                    {{ number_format($player->total_xp) }}
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
                    <a class="page-link" href="/hiscores/?highlight=0&amp;skill=attack&amp;rank=50"
                       title="View lower ranks">&gt;</a>
                </div>
            </div>
        </div>
        <span class="d-block">
            <small>{{ $hiscores->links('pagination::simple-tailwind') }}</small>
        </span>

        <div class="hiscore-search">
            <div class="search-box search-rank">
                <form method="POST" role="search"><input type="hidden" name="_csrf" value="{{ csrf_token() }}">
                    <label for="rank">Search by rank</label><input id="rank" name="rank" type="text"
                                                                   required="required">
                    <input type="submit" value="Search" aria-label="Search by rank">
                </form>
            </div>
            <div class="search-box search-name">
                <form method="POST" role="search">
                    <input type="hidden" name="_csrf" value="{{ csrf_token() }}">
                    <label for="name">Search by name</label><input id="name" name="name" type="text"
                                                                   required="required">
                    <input type="submit" value="Search" aria-label="Search by username">
                </form>
            </div>
        </div>
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
