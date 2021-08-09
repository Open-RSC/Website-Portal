@extends('template')
@section('content')

    <span class="d-block">
        Looking to download the <a href="/downloads/OpenRSC.jar">PC Launcher</a> or <a href="/downloads/openrsc.apk">Android APK</a>?
    </span>

    <div style="text-align: center;">
        <div style="text-align: center;">
            <table width=500 bgcolor=black cellpadding=4 border=0>
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
                                    <td align=center width=160>
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
                                                    <a href="/play/preservation/members"
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
                                            <tr>
                                                <td colspan=2>
                                                    <img align=absmiddle src=/img/usflag.gif
                                                         width=30 height=15 border=0>
                                                    RSC Cabbage
                                                </td>
                                            </tr>
                                            <tr>
                                                <td valign=center>
                                                    <a href="/play/cabbage/members"
                                                       target="_parent" class=c>World 1</a>
                                                </td>
                                                <td align=right style="padding-left: 10px;">
                                                    @if ($cabbage_online == 1)
                                                        {{ $cabbage_online }} player
                                                    @else
                                                        {{ $cabbage_online }} players
                                                    @endif
                                                </td>
                                            </tr>
                                        </table>
                                    </td>

                                    <!-- Center -->
                                    <td align=center width=161>
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
                                                    <a href="/play/uranium/members"
                                                       target="_parent" class="c">World
                                                        1</a>
                                                </td>
                                                <td align=right style="padding-left: 10px;">
                                                    @if ($uranium_online == 1)
                                                        {{ $uranium_online }} player
                                                    @else
                                                        {{ $uranium_online }} players
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2">&nbsp;</td>
                                            </tr>
                                            <tr>
                                                <td colspan=2>
                                                    <img align=absmiddle src=/img/usflag.gif
                                                         width=30 height=15 border=0>
                                                    RSC Coleslaw
                                                </td>
                                            </tr>
                                            <tr>
                                                <td valign=center>
                                                    <a href="/play/coleslaw/members"
                                                       target="_parent" class=c>World 1</a>
                                                </td>
                                                <td align=right style="padding-left: 10px;">
                                                    @if ($coleslaw_online == 1)
                                                        {{ $coleslaw_online }} player
                                                    @else
                                                        {{ $coleslaw_online }} players
                                                    @endif
                                                </td>
                                            </tr>
                                        </table>
                                    </td>

                                    <!-- Right side -->
                                    <td align=center width=180>
                                        <table>
                                            <tr>
                                                <td colspan=2>
                                                    <img align=absmiddle src=/img/usflag.gif
                                                         width=30 height=15 border=0>
                                                    2001scape
                                                </td>
                                            </tr>
                                            <tr>
                                                <td valign=center>
                                                    <a href="/play/2001scape/members"
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
                                            <tr>
                                                <td colspan=2>
                                                    <img align=absmiddle src=/img/usflag.gif
                                                         width=30 height=15 border=0>
                                                    Open PK
                                                </td>
                                            </tr>
                                            <tr>
                                                <td valign=center>
                                                    <a href="/play/openpk/members"
                                                       target="_parent" class=c>World 1</a>
                                                </td>
                                                <td align=right style="padding-left: 10px;">
                                                    @if ($openpk_online == 1)
                                                        {{ $openpk_online }} player
                                                    @else
                                                        {{ $openpk_online }} players
                                                    @endif
                                                </td>
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

    <table width=100% height=100% cellpadding=0 cellspacing=0>
        <tr>
            <td valign=middle>
                <div style="text-align: center;">
                    <table width=600 cellpadding=0 cellspacing=0 border=0 background=../img/background2.jpg>
                        <tr>
                            <td valign=bottom>
                                <DIV STYLE="LEFT: 0px; TOP: -45px; POSITION: relative;">
                                    <DIV STYLE="RIGHT: 0px; TOP: 0px; width:100%; POSITION: absolute;">
                                        <DIV STYLE="LEFT: 0px; TOP: 45px; POSITION: relative;">
                                            <DIV STYLE="RIGHT: 0px; TOP: 0px; width:100%; POSITION: absolute;">
                                                <center>
                                                    <table border=0 width=450>
                                                        <tr>
                                                            <td align=center>
                                                                <table width=150 bgcolor=black cellpadding=4>
                                                                    <tr>
                                                                        <td class=b bgcolor=#474747
                                                                            background='/img/stoneback.gif'>
                                                                            <div style="text-align: center;">
                                                                                <a href="/rules" class="c">
                                                                                    <b>Rules of conduct</b>
                                                                                </a>
                                                                                <span class="d-block">
                                                                                    Know the rules - don't risk being banned from the game
                                                                                </span>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                            <td align=center>
                                                                <table width=150 bgcolor=black cellpadding=4>
                                                                    <tr>
                                                                        <td class=b bgcolor=#474747
                                                                            background='/img/stoneback.gif'>
                                                                            <div style="text-align: center;">
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
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                            <td align=center>
                                                                <table width=150 bgcolor=black cellpadding=4>
                                                                    <tr>
                                                                        <td class=b bgcolor=#474747
                                                                            background='/img/stoneback.gif'>
                                                                            <div style="text-align: center;">
                                                                                <a href="/faq" class="c">
                                                                                    <b>Security tips</b>
                                                                                </a>
                                                                                <span class="d-block">
                                                                                    Protect your password and read this important information
                                                                                </span>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </center>
                                            </div>
                                        </div>
                                        <center>
                                            <table border=0 width=450>
                                                <tr>
                                                    <td width="150"></td>
                                                    <td width="150" align="center">
                                                        <img src="/img/swordarrow.gif" border="0" alt="">
                                                    </td>
                                                    <td width="150"></td>
                                                </tr>
                                            </table>
                                        </center>
                                    </div>
                                </div>

                                <div class="pt-5"></div>
                                <div class="pt-3"></div>

                            </td>
                        </tr>
                    </table>
                </div>
            </td>
        </tr>
    </table>

@endsection