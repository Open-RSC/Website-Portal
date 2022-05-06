@extends('template')
@section('content')

    <span class="orsc-download-links d-block">
        Looking to download the <a href="/downloads/OpenRSC.jar">PC Launcher</a> or <a href="/downloads/openrsc.apk">Android APK</a>?
    </span>

    <div style="text-align: center;">
        <div style="text-align: center;">
            <table bgcolor=black cellpadding=4 border=0 class="playable-worlds-table">
                <tr>
                    <td class="e">

                        <div class="pt-2"></div>

                        <div style="text-align: center;">
                            <b>Everyone is a Member and can use the worlds below</b>
                            <span class="d-block">
                                Each world can hold up to 2000 players
                            </span>

                            <div class="pt-3"></div>

                            <table>
                                <tr valign="top" class="pt-2">

                                    <!-- Left side -->
                                    <td align=center class="worlds-table-left-column">
                                        <table>
                                            <tr>
                                                <td colspan=2>
                                                    <img align=absmiddle src=/img/usflag.gif
                                                         width=30 height=15 border=0>
                                                    RSC Preservation
                                                </td>
                                            </tr>
                                            <tr>
                                                <td valign=center>
                                                    <a href="http://game.openrsc.com/play/preservation/members"
                                                       target="_parent" class=c>World 1</a>
                                                </td>
                                                <td align=right style="padding-left: 10px;">
                                                    @if ($preservation_online == 1)
                                                        {{ $preservation_online }} player
                                                    @else
                                                        {{ $preservation_online }} players
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2">&nbsp;</td>
                                            </tr>
                                        </table>
                                    </td>

                                    <!-- Center -->
                                    <td align=center class="worlds-table-middle-column">
                                        <table>
                                            <tr>
                                                <td colspan=2>
                                                    <img align=absmiddle src=/img/usflag.gif
                                                         width=30 height=15 border=0>
                                                    RSC Uranium
                                                </td>
                                            </tr>
                                            <tr>
                                                <td valign=center>
                                                    <a href="http://game.openrsc.com/play/uranium/members"
                                                       target="_parent" class="c">World
                                                        1</a>
                                                </td>
                                                <td align=right style="padding-left: 10px;">
                                                    @if ($uranium_online == 1)
                                                        {{ $uranium_online }} cyborg
                                                    @else
                                                        {{ $uranium_online }} cyborgs
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2">&nbsp;</td>
                                            </tr>
                                        </table>
                                    </td>

                                    <!-- Right side -->
                                    <td align=center class="worlds-table-right-column">
                                        <table>
                                            <tr>
                                                <td colspan=2>
                                                    <img align=absmiddle src=/img/usflag.gif
                                                         width=30 height=15 border=0>
                                                    2001Scape
                                                </td>
                                            </tr>
                                            <tr>
                                                <td valign=center>
                                                    <a href="http://game.openrsc.com/play/2001scape/members"
                                                       target="_parent" class=c>World 1</a>
                                                </td>
                                                <td align=right style="padding-left: 10px;">
                                                    @if ($retro_online == 1)
                                                        {{ $retro_online }} player
                                                    @else
                                                        {{ $retro_online }} players
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2">&nbsp;</td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </td>
                </tr>
            </table>
        </div>
    </div>
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