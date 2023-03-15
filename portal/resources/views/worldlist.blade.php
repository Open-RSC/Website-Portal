@extends('template')
@section('content')

    <div class="pt-2"></div>

    <span class="orsc-download-links d-block">
        Looking to download the <a href="/downloads/OpenRSC.jar">PC Launcher</a> or <a href="/downloads/openrsc.apk">Android APK</a>?
    </span>

    <table bgcolor=black cellpadding=4 border=0 class="playable-worlds-table">
        <tr>
            <td class="e">
                <table>
                    <div class="pt-2"></div>
                    <!--World list-->
                    <div class="pt-2 d-block text-center">
                            <span class="fw-bold">
                                Everyone is a Member and can use the worlds below
                            </span>
                        <span class="d-block">
                            Each world can hold up to 2000 players
                            </span>
                    </div>

                    <div class="pt-2 pb-2"></div>

                    <div class="pr-5 pl-5">
                        <div class="d-flex justify-content-between pb-3">
                            @foreach($worlds as $world)
                                @if(!$world["dev"] && $world["webclient"])
                                    <div class="d-block">
                                        <img src="/img/usflag.gif" width=30 height=15 alt="US">
                                        {{$world["name"]}}
                                        <span class="d-block">
                                            <a class="c pr-3"
                                               href="/play/{{$world['alias']}}/members"
                                               target="_parent">
                                                World 1
                                            </a>
                                            <span class="text-white">
                                                {{$world["online"]}} {{$world["type"]}}
                                            </span>
                                    </span>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                    <div class="pb-1"></div>
                </table>
            </td>
        </tr>
    </table>

    <div class="promo-tiles-and-sword-table">
        <div class="promo-tiles-table-main">
            <div class="promo-tile-col">
                <div class="promo-tile-col-inner b">
                    <a href="/rules" class="c">
                        <b>Rules of conduct</b>
                    </a>
                    <span class="d-block">
                        Know the rules - don't risk being banned from the game
                    </span>
                </div>
            </div>
            <div class="promo-tile-col">
                <div class="promo-tile-col-inner b">
                    <a href="https://gitlab.com/open-runescape-classic/core"
                       class="c" target="_parent">
                        <span style="color: #ffbb22; ">
                            <b>
                                Contribute Fixes
                            </b>
                        </span>
                    </a>
                    <span class="d-block">
                        Report bugs and submit merge requests to help out!
                    </span>
                </div>
            </div>
            <div class="promo-tile-col">
                <div class="promo-tile-col-inner b">
                    <a href="/faq" class="c">
                        <b>Security tips</b>
                    </a>
                    <span class="d-block">
                        Protect your password and read this important information
                    </span>
                </div>
            </div>
        </div>
    </div>

@endsection