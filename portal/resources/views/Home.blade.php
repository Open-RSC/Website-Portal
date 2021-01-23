@extends('template')
@section('content')

    <div class="logo" role="banner"></div>
    <span class="online-count" style="font-size: 14px;">
        There are currently {{ $online_count }} people playing!
    </span>
    <div class="pt-3"></div>
    <table class="table">
        <tbody>
        <tr>
            <td>
                <!--stones border top-->
                <table style="padding: 0; background: black;">
                    <tbody>
                    <tr>
                        <td>
                            <img src="{{ asset('img/fm_top.gif') }}" alt="">
                        </td>
                    </tr>
                    </tbody>
                </table>
                <!--stones content-->
                <table style="padding: 0; border: 0; width: 500px; background-repeat:no-repeat; background-color: black;">
                    <tbody>
                    <tr>
                        <td style="width: 7px;" background="{{ asset('img/fm_middle.gif') }}"></td>
                        <td>
                            <span class="font-weight-bold d-block text-center">Latest News and Updates</span><br>
                            <table style="padding: 0; background: black;">
                                <tbody>
                                <tr class="align-top">
                                    <td class="text-center w-25">
                                        <a href="http://board.localhost/viewforum.php?f=2">
                                            <img src="{{ asset('img/mm_scroll.jpg') }}" alt="">
                                        </a>
                                    </td>
                                    <td style="width: 350px">
                                        <table id="List" class="container">
                                            @foreach ($news_feed as $news)
                                                <tr>
                                                    <td class="w-75">
                                                        <!-- News subject -->
                                                        <a class="c"
                                                           href="http://board.localhost/viewtopic.php?f={{ $news->forum_id }}&p={{ $news->post_id }}">
                                                            @php
                                                                echo Str::limit(strip_tags($news->post_subject), 40);
                                                            @endphp
                                                        </a>
                                                    </td>
                                                    <td class="w-25">
                                                            <span class="text-white float-right">
                                                                @php
                                                                    $timestamp = $news->post_time;
                                                                    $dt = new DateTime();
                                                                    echo $dt->setTimestamp( $timestamp )->format("d-M-Y ");
                                                                @endphp
                                                            </span>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                </tr>
                                </tbody>
                            </table>
                            <div class="text-center">To view a full list of news and updates,
                                <a href="http://board.localhost/viewforum.php?f=2" class="c">
                                    click here
                                </a>.
                            </div>
                        </td>
                        <td width="7" background="img/fm_middle.gif"></td>
                    </tr>
                    </tbody>
                </table>
                <!--stones border bottom-->
                <table cellspacing="0" cellpadding="0">
                    <tbody>
                    <tr>
                        <td colspan="3"><img src="img/fm_bottom.gif"></td>
                    </tr>
                    </tbody>
                </table>

                <br>
                <!--stones border top-->
                <table cellspacing="0" cellpadding="0" bgcolor="black">
                    <tbody>
                    <tr>
                        <td><img src="img/fm_top.gif"></td>
                    </tr>
                    </tbody>
                </table>
                <!--stones content-->
                <table background="img/fm_middle.gif" cellspacing="0"
                       cellpadding="0" border="0" width="500"
                       style="background-repeat:no-repeat;" bgcolor="black">
                    <tbody>
                    <tr>
                        <td width="7" background="img/fm_middle.gif"></td>
                        <td valign="bottom">
                            <center>
                                <br>
                                <!--table to contain options-->
                                <table>
                                    <tbody>
                                    <tr valign="top">
                                        <td align="center" width="100"><a
                                                    href="http://web.archive.org/web/20040324014226/http://ww.runescape.com/playgame.html"><img
                                                        src="img/mm_sword.jpg"
                                                        border="0"></a></td>
                                        <td width="120">
                                            <div style="LEFT: 0; TOP: 0; POSITION: relative;">
                                                <div style="LEFT: 0; TOP: 0; POSITION: absolute;">
                                                    <a href="http://web.archive.org/web/20040324014226/http://ww.runescape.com/playgame.jpgl"><img
                                                                src="img/blank.gif"
                                                                height="45" border="0"
                                                                width="100"></a>
                                                </div>
                                            </div>
                                            <table height="45" cellpadding="2"
                                                   bgcolor="black" width="100">
                                                <tbody>
                                                <tr>
                                                    <td class="b2"
                                                        background="img/shinystonered.jpg"
                                                        bgcolor="#570700">
                                                        <center><b>Play<br>Game</b></center>
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                            Play RuneScape right now!<br>
                                            <a href="http://web.archive.org/web/20040324014226/http://ww.runescape.com/playgame.jpgl"
                                               class="c">Click here</a></td>
                                        <td width="10"></td>
                                        <td align="center" width="100"><a
                                                    href="../create/index.html"
                                                    class="c"><img
                                                        src="img/mm_player.jpg"
                                                        border="0"></a></td>
                                        <td width="120">
                                            <div style="LEFT: 0; TOP: 0; POSITION: relative;">
                                                <div style="LEFT: 0; TOP: 0; POSITION: absolute;">
                                                    <a href="../create/index.html"
                                                       class="c"><img
                                                                src="img/blank.gif"
                                                                height="45" border="0"
                                                                width="100"></a>
                                                </div>
                                            </div>
                                            <table cellpadding="2" bgcolor="black"
                                                   width="100">
                                                <tbody>
                                                <tr>
                                                    <td class="b2"
                                                        background="img/shinystonered.jpg"
                                                        bgcolor="#570700">
                                                        <center><b>Create Account</b>
                                                        </center>
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                            Create an account for both the game and our
                                            website.<br>
                                            <a href="../create/index.html" class="c">Click
                                                Here</a></td>
                                    </tr>
                                    <tr>
                                        <td colspan="5"></td>
                                    </tr>
                                    <tr valign="top">
                                        <td align="center" width="100"><a
                                                    href="whychoosers.htm" class="c"><img
                                                        src="img/mm_whyrs.jpg"
                                                        border="0"></a></td>
                                        <td width="120">
                                            <div style="LEFT: 0; TOP: 0; POSITION: relative;">
                                                <div style="LEFT: 0; TOP: 0; POSITION: absolute;">
                                                    <a href="whychoosers.htm" class="c"><img
                                                                src="img/blank.gif"
                                                                height="45" border="0"
                                                                width="100"></a>
                                                </div>
                                            </div>
                                            <table height="45" cellpadding="2"
                                                   bgcolor="black" width="100">
                                                <tbody>
                                                <tr>
                                                    <td class="b"
                                                        background="img/stoneback.gif"
                                                        bgcolor="#474747">
                                                        <center><b>Why Choose RuneScape?</b>
                                                        </center>
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                            See why our game is right for you!<br>
                                            <a href="whychoosers.htm" class="c">Click
                                                Here</a></td>
                                        <td width="10"></td>
                                        <td align="center" width="100"><a
                                                    href="../members/members.html"
                                                    class="c"><img
                                                        src="img/mm_members.jpg"
                                                        border="0"></a></td>
                                        <td width="120">
                                            <div style="LEFT: 0; TOP: 0; POSITION: relative;">
                                                <div style="LEFT: 0; TOP: 0; POSITION: absolute;">
                                                    <a href="../members/members.html"
                                                       class="c"><img
                                                                src="img/blank.gif"
                                                                height="45" border="0"
                                                                width="100"></a>
                                                </div>
                                            </div>
                                            <table height="45" cellpadding="2"
                                                   bgcolor="black" width="100">
                                                <tbody>
                                                <tr>
                                                    <td class="b"
                                                        background="img/stoneback.gif"
                                                        bgcolor="#474747">
                                                        <center><b>RuneScape Members</b>
                                                        </center>
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                            Get the Premium version of the game!<br>
                                            <a href="../members/members.html" class="c">Click
                                                Here</a></td>
                                    </tr>
                                    <tr>
                                        <td colspan="5"></td>
                                    </tr>
                                    <tr valign="top">
                                        <td align="center" width="100"><a
                                                    href="/hiscores"
                                                    class="c"><img
                                                        src="img/mm_chalice.jpg"
                                                        border="0"></a></td>
                                        <td width="120">
                                            <div style="LEFT: 0; TOP: 0; POSITION: relative;">
                                                <div style="LEFT: 0; TOP: 0; POSITION: absolute;">
                                                    <a href="/hiscores"
                                                       class="c"><img
                                                                src="img/blank.gif"
                                                                height="45" border="0"
                                                                width="100"></a>
                                                </div>
                                            </div>
                                            <table height="45" cellpadding="2"
                                                   bgcolor="black" width="100">
                                                <tbody>
                                                <tr>
                                                    <td class="b"
                                                        background="img/stoneback.gif"
                                                        bgcolor="#474747">
                                                        <center><b>Hiscore Tables</b>
                                                        </center>
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                            Is your character in the top 250,000?<br>
                                            <a href="/hiscores" class="c">Click
                                                Here</a></td>
                                        <td width="10"></td>
                                        <td align="center" width="100"><a
                                                    href="betaplaygame/RS2Notes.htm"
                                                    class="c"><img
                                                        src="img/mm2_rs2b.jpg"
                                                        border="0"></a></td>
                                        <td width="120">
                                            <div style="LEFT: 0; TOP: 0; POSITION: relative;">
                                                <div style="LEFT: 0; TOP: 0; POSITION: absolute;">
                                                    <a href="betaplaygame/RS2Notes.htm"
                                                       class="c"><img
                                                                src="img/blank.gif"
                                                                height="45" border="0"
                                                                width="100"></a>
                                                </div>
                                            </div>
                                            <table height="45" cellpadding="2"
                                                   bgcolor="black" width="100">
                                                <tbody>
                                                <tr>
                                                    <td class="b"
                                                        background="img/stoneback.gif"
                                                        bgcolor="#474747">
                                                        <center><b>Play RS2 Beta</b>
                                                        </center>
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                            Try the new version <br>of the game!<br>
                                            <a href="betaplaygame/RS2Notes.htm" class="c">Click
                                                Here</a></td>
                                    </tr>
                                    </tbody>
                                </table>
                                <!--end options container-->
                            </center>
                            <br>
                        </td>
                        <td width="7" background="img/fm_middle.gif"></td>
                    </tr>
                    </tbody>
                </table>
                <!--stones border bottom-->
                <table cellspacing="0" cellpadding="0">
                    <tbody>
                    <tr>
                        <td colspan="3"><img src="img/fm_bottom.gif"></td>
                    </tr>
                    </tbody>
                </table>

                <br>
                <!--stones border top-->
                <table cellspacing="0" cellpadding="0" bgcolor="black">
                    <tbody>
                    <tr>
                        <td><img src="img/fm_top.gif"></td>
                    </tr>
                    </tbody>
                </table>
                <!--stones content-->
                <table background="img/fm_middle.gif" cellspacing="0"
                       cellpadding="0" border="0" width="500"
                       style="background-repeat:no-repeat;" bgcolor="black">
                    <tbody>
                    <tr>
                        <td width="7" background="img/fm_middle.gif"></td>
                        <td valign="bottom">
                            <center>
                                <img src="img/blank.gif" height="7"
                                     width="1"><br>
                                <b>Latest Poll</b><br>
                                <table cellspacing="0" cellpadding="0" bgcolor="black">
                                    <tbody>
                                    <tr valign="top">
                                        <td align="center" width="100"><a
                                                    href="../polls/allpolls.htm"><img
                                                        src="img/mms_vote.jpg"
                                                        border="0"></a></td>
                                        <td width="350">
                                            <iframe src="img/latestpoll.jpg"
                                                    scrolling="no" border="0"
                                                    frameborder="no" height="120"
                                                    width="350"></iframe>
                                        </td>
                                    </tr>
                                    <tr>
                                    </tr>
                                    </tbody>
                                </table>
                                <br>
                            </center>
                        </td>
                        <td width="7" background="img/fm_middle.gif"></td>
                    </tr>
                    </tbody>
                </table>
                <!--stones border bottom-->
                <table cellspacing="0" cellpadding="0">
                    <tbody>
                    <tr>
                        <td colspan="3"><img src="img/fm_bottom.gif"></td>
                    </tr>
                    </tbody>
                </table>

                <br>

                <!--stones border top-->
                <table cellspacing="0" cellpadding="0" bgcolor="black">
                    <tbody>
                    <tr>
                        <td><img src="img/fm_top.gif"></td>
                    </tr>
                    </tbody>
                </table>
                <!--stones content-->
                <table background="img/fm_middle.gif" cellspacing="0"
                       cellpadding="0" border="0" width="500"
                       style="background-repeat:no-repeat;" bgcolor="black">
                    <tbody>
                    <tr>
                        <td width="7" background="img/fm_middle.gif"></td>
                        <td valign="bottom">
                            <center>
                                <img src="img/blank.gif" height="7"
                                     width="1"><br>
                                <b>Secure Services</b><br>
                                <br>
                                <!--table to contain options-->
                                <table>
                                    <tbody>
                                    <tr valign="top">
                                        <td align="center" width="100"><a
                                                    href="../securemenu/securemenu.html"
                                                    class="c"><img
                                                        src="img/mm_subscribe.jpg"
                                                        height="120" border="0" width="77"></a>
                                        </td>
                                        <td width="120">
                                            <div style="LEFT: 0; TOP: 0; POSITION: relative;">
                                                <div style="LEFT: 0; TOP: 0; POSITION: absolute;">
                                                    <a href="../securemenu/securemenu.html"
                                                       class="c"><img
                                                                src="img/blank.gif"
                                                                height="45" border="0"
                                                                width="100"></a>
                                                </div>
                                            </div>
                                            <table height="45" cellpadding="2"
                                                   bgcolor="black" width="100">
                                                <tbody>
                                                <tr>
                                                    <td class="b"
                                                        background="img/stoneback.gif"
                                                        bgcolor="#474747">
                                                        <center><b>Subscribe</b></center>
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                            Start or continue your subscription<br>
                                            <a href="../securemenu/securemenu.html"
                                               class="c">Click Here</a></td>
                                        <td width="10"></td>
                                        <td align="center" width="100"><a
                                                    href="../unsubscribe/unsubscribe.html"
                                                    class="c"><img
                                                        src="img/mm_unsubscribe.jpg"
                                                        height="120" border="0" width="77"></a>
                                        </td>
                                        <td width="120">
                                            <div style="LEFT: 0; TOP: 0; POSITION: relative;">
                                                <div style="LEFT: 0; TOP: 0; POSITION: absolute;">
                                                    <a href="../unsubscribe/unsubscribe.html"
                                                       class="c"><img
                                                                src="img/blank.gif"
                                                                height="45" border="0"
                                                                width="100"></a>
                                                </div>
                                            </div>
                                            <table height="45" cellpadding="2"
                                                   bgcolor="black" width="100">
                                                <tbody>
                                                <tr>
                                                    <td class="b"
                                                        background="img/stoneback.gif"
                                                        bgcolor="#474747">
                                                        <center><b>Unsubscribe</b></center>
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                            Cancel your subscription<br>
                                            <a href="../unsubscribe/unsubscribe.html"
                                               class="c">Click Here</a></td>
                                    </tr>
                                    <tr>
                                        <td colspan="5"></td>
                                    </tr>
                                    <tr valign="top">
                                        <td align="center" width="100"><a
                                                    href="../customersupport/customersupport.html"><img
                                                        src="img/mm_support.jpg"
                                                        height="120" border="0" width="77"></a>
                                        </td>
                                        <td width="120">
                                            <div style="LEFT: 0; TOP: 0; POSITION: relative;">
                                                <div style="LEFT: 0; TOP: 0; POSITION: absolute;">
                                                    <a href="../customersupport/customersupport.html"><img
                                                                src="img/blank.gif"
                                                                height="45" border="0"
                                                                width="100"></a>
                                                </div>
                                            </div>
                                            <table height="45" cellpadding="2"
                                                   bgcolor="black" width="100">
                                                <tbody>
                                                <tr>
                                                    <td class="b"
                                                        background="img/stoneback.gif"
                                                        bgcolor="#474747">
                                                        <center><b>Customer Support</b>
                                                        </center>
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                            Questions?<br>Contact our staff<br>
                                            <a href="../customersupport/customersupport.html"
                                               class="c">Click Here</a></td>
                                        <td width="10"></td>
                                        <td align="center" width="100"><a
                                                    href="../securemenu/securemenu.html"
                                                    class="c"><img
                                                        src="img/mm_inbox.jpg"
                                                        height="120" border="0" width="77"></a>
                                        </td>
                                        <td width="120">
                                            <div style="LEFT: 0; TOP: 0; POSITION: relative;">
                                                <div style="LEFT: 0; TOP: 0; POSITION: absolute;">
                                                    <a href="../securemenu/securemenu.html"
                                                       class="c"><img
                                                                src="img/blank.gif"
                                                                height="45" border="0"
                                                                width="100"></a>
                                                </div>
                                            </div>
                                            <table height="45" cellpadding="2"
                                                   bgcolor="black" width="100">
                                                <tbody>
                                                <tr>
                                                    <td class="b"
                                                        background="img/stoneback.gif"
                                                        bgcolor="#474747">
                                                        <center><b>Message Centre</b>
                                                        </center>
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                            Your messages<br>from our staff<br><a
                                                    href="../securemenu/securemenu.html"
                                                    class="c">Click Here</a></td>
                                    </tr>
                                    <tr>
                                        <td colspan="5"></td>
                                    </tr>
                                    <tr valign="top">
                                        <td align="center" width="100"><a
                                                    href="../securemenu/securemenu.html"
                                                    class="c"><img
                                                        src="img/mms_forums.jpg"
                                                        height="120" border="0" width="77"></a>
                                        </td>
                                        <td width="120">
                                            <div style="LEFT: 0; TOP: 0; POSITION: relative;">
                                                <div style="LEFT: 0; TOP: 0; POSITION: absolute;">
                                                    <a href="../securemenu/securemenu.html"
                                                       class="c"><img
                                                                src="img/blank.gif"
                                                                height="45" border="0"
                                                                width="100"></a>
                                                </div>
                                            </div>
                                            <table height="45" cellpadding="2"
                                                   bgcolor="black" width="100">
                                                <tbody>
                                                <tr>
                                                    <td class="b"
                                                        background="img/stoneback.gif"
                                                        bgcolor="#474747">
                                                        <center><b>Forums</b></center>
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                            Discuss the game with fellow players!<br><a
                                                    href="../securemenu/securemenu.html"
                                                    class="c">Click Here</a></td>
                                        <td width="10"></td>
                                        <td align="center" width="100"><a
                                                    href="../securemenu/securemenu.html"
                                                    class="c"><img
                                                        src="img/mms_accman.jpg"
                                                        height="120" border="0" width="77"></a>
                                        </td>
                                        <td width="120">
                                            <div style="LEFT: 0; TOP: 0; POSITION: relative;">
                                                <div style="LEFT: 0; TOP: 0; POSITION: absolute;">
                                                    <a href="../securemenu/securemenu.html"
                                                       class="c"><img
                                                                src="img/blank.gif"
                                                                height="45" border="0"
                                                                width="100"></a>
                                                </div>
                                            </div>
                                            <table height="45" cellpadding="2"
                                                   bgcolor="black" width="100">
                                                <tbody>
                                                <tr>
                                                    <td class="b"
                                                        background="img/stoneback.gif"
                                                        bgcolor="#474747">
                                                        <center><b>Account Management</b>
                                                        </center>
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                            Manage your Password and Recovery Details<br><a
                                                    href="../securemenu/securemenu.html"
                                                    class="c">Click Here</a></td>
                                    </tr>
                                    </tbody>
                                </table>
                                <!--end options container-->
                            </center>
                            <br>
                        </td>
                        <td width="7" background="img/fm_middle.gif"></td>
                    </tr>
                    </tbody>
                </table>
                <!--stones border bottom-->
                <table cellspacing="0" cellpadding="0">
                    <tbody>
                    <tr>
                        <td colspan="3"><img src="img/fm_bottom.gif"></td>
                    </tr>
                    </tbody>
                </table>


                <br>


                <!--stones border top-->
                <table cellspacing="0" cellpadding="0" bgcolor="black">
                    <tbody>
                    <tr>
                        <td><img src="img/fm_top.gif"></td>
                    </tr>
                    </tbody>
                </table>
                <!--stones content-->
                <table background="img/fm_middle.gif" cellspacing="0"
                       cellpadding="0" border="0" width="500"
                       style="background-repeat:no-repeat;" bgcolor="black">
                    <tbody>
                    <tr>
                        <td width="7" background="img/fm_middle.gif"></td>
                        <td valign="bottom">
                            <center>
                                <img src="img/blank.gif" height="7"
                                     width="1"><br>
                                <b>Manual</b><br>
                                <br>

                                <!--table to contain options-->
                                <table>
                                    <tbody>
                                    <tr valign="top">
                                        <td align="center" width="100">
                                            <a href="../howtoplay.html" class="c"><img
                                                        src="img/mm_howtoplay.jpg"
                                                        height="120" border="0" width="77"></a>
                                        </td>
                                        <td width="120">
                                            <div style="LEFT: 0; TOP: 0; POSITION: relative;">
                                                <div style="LEFT: 0; TOP: 0; POSITION: absolute;">
                                                    <a href="../howtoplay.html"
                                                       class="c"><img
                                                                src="img/blank.gif"
                                                                height="45" border="0"
                                                                width="100"></a>
                                                </div>
                                            </div>
                                            <table height="45" cellpadding="2"
                                                   bgcolor="black" width="100">
                                                <tbody>
                                                <tr>
                                                    <td class="b"
                                                        background="img/stoneback.gif"
                                                        bgcolor="#474747">
                                                        <center><b>How To Play</b></center>
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                            Everything you need to know to play
                                            RuneScape<br>
                                            <a href="../howtoplay.html" class="c">Click
                                                Here</a></td>
                                        <td width="10"></td>
                                        <td align="center" width="100">
                                            <a href="/faq"><img
                                                        src="img/mm_faq.jpg"
                                                        height="120" border="0" width="77"></a>
                                        </td>
                                        <td width="120">
                                            <div style="LEFT: 0; TOP: 0; POSITION: relative;">
                                                <div style="LEFT: 0; TOP: 0; POSITION: absolute;">
                                                    <a href="/faq"><img
                                                                src="img/blank.gif"
                                                                height="45" border="0"
                                                                width="100"></a>
                                                </div>
                                            </div>
                                            <table height="45" cellpadding="2"
                                                   bgcolor="black" width="100">
                                                <tbody>
                                                <tr>
                                                    <td class="b"
                                                        background="img/stoneback.gif"
                                                        bgcolor="#474747">
                                                        <center><b>F.A.Q.</b></center>
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                            Answers to Frequently Asked Questions<br>
                                            <a href="/faq" class="c">Click Here</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="5"></td>
                                    </tr>
                                    <tr valign="top">
                                        <td align="center" width="100"><a
                                                    href="../varrock/varrockindex.html"><img
                                                        src="img/mm_lov.jpg"
                                                        height="120" border="0" width="77"></a>
                                        </td>
                                        <td width="120">
                                            <div style="LEFT: 0; TOP: 0; POSITION: relative;">
                                                <div style="LEFT: 0; TOP: 0; POSITION: absolute;">
                                                    <a href="../varrock/varrockindex.html"><img
                                                                src="img/blank.gif"
                                                                height="45" border="0"
                                                                width="100"></a>
                                                </div>
                                            </div>
                                            <table height="45" cellpadding="2"
                                                   bgcolor="black" width="100">
                                                <tbody>
                                                <tr>
                                                    <td class="b"
                                                        background="img/stoneback.gif"
                                                        bgcolor="#474747">
                                                        <center><b>Library of Varrock</b>
                                                        </center>
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                            Learn about the History of RuneScape<br>
                                            <a href="../varrock/varrockindex.html"
                                               class="c">Click Here</a></td>
                                        <td width="10"></td>
                                        <td align="center" width="100"><a
                                                    href="/rules"><img
                                                        src="img/mm_rules.jpg"
                                                        height="120" border="0" width="77"></a>
                                        </td>
                                        <td width="120">
                                            <div style="LEFT: 0; TOP: 0; POSITION: relative;">
                                                <div style="LEFT: 0; TOP: 0; POSITION: absolute;">
                                                    <a href="/rules"><img
                                                                src="img/blank.gif"
                                                                height="45" border="0"
                                                                width="100"></a>
                                                </div>
                                            </div>
                                            <table height="45" cellpadding="2"
                                                   bgcolor="black" width="100">
                                                <tbody>
                                                <tr>
                                                    <td class="b"
                                                        background="img/stoneback.gif"
                                                        bgcolor="#474747">
                                                        <center><b>Rules &amp; Security</b>
                                                        </center>
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                            Learn our rules<br>and stay safe<br>online<br>
                                            <a href="/rules" class="c">Click
                                                Here</a></td>
                                    </tr>
                                    </tbody>
                                </table>
                                <!--end options container-->
                            </center>
                            <br>
                        </td>
                        <td width="7" background="img/fm_middle.gif"></td>
                    </tr>
                    </tbody>
                </table>
                <!--stones border bottom-->
                <table cellspacing="0" cellpadding="0">
                    <tbody>
                    <tr>
                        <td colspan="3"><img src="img/fm_bottom.gif"></td>
                    </tr>
                    </tbody>
                </table>

                <br>
            </td>
        </tr>
        </tbody>
    </table>
@endsection