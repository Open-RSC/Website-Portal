@extends('template')
@section('content')

    <div class="logo" role="banner"></div>
    <span class="online-count" style="font-size: 14px;">
        There are currently {{ $online_count }} people playing!
    </span>
    <div class="pt-3"></div>
    <table>
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
                <table background="{{ asset('img/fm_middle.gif') }}"
                       style="padding: 0;background-repeat:no-repeat; background-color: black; width: 500px;">
                    <tbody>
                    <tr>
                        <td style="width: 7px;" background="{{ asset('img/fm_middle.gif') }}"></td>
                        <td>
                            <div class="pb-3"></div>
                            <span class="d-block text-center">
                                <b>Latest News and Updates</b>
                            </span>
                            <div class="pb-3"></div>
                            <table style="padding: 0; background: black;">
                                <tbody>
                                <tr class="align-top">
                                    <td style="width: 100px;">
                                        <a href="http://board.localhost/viewforum.php?f=2">
                                            <img class="mx-auto" src="{{ asset('img/mm_scroll.jpg') }}" alt="">
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
                                <a href="http://board.localhost/viewforum.php?f=2" class="c">click here</a>.
                            </div>
                        </td>
                        <td style="width: 7px;" background="{{ asset('img/fm_middle.gif') }}"></td>
                    </tr>
                    </tbody>
                </table>
                <!--stones border bottom-->
                <table style="padding: 0;">
                    <tbody>
                    <tr>
                        <td colspan="3">
                            <img src="{{ asset('img/fm_bottom.gif') }}" alt="">
                        </td>
                    </tr>
                    </tbody>
                </table>

                <div class="pb-3"></div>
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
                <table background="{{ asset('img/fm_middle.gif') }}"
                       style="padding: 0;background-repeat:no-repeat; background-color: black; width: 500px;">
                    <tbody>
                    <tr>
                        <td style="width: 7px;" background="{{ asset('img/fm_middle.gif') }}"></td>
                        <td class="align-bottom">
                            <center>
                                <div class="pb-3"></div>
                                <!--table to contain options-->
                                <table>
                                    <tbody>
                                    <tr class="align-top">
                                        <td style="width: 100px;">
                                            <a href="">
                                                <img class="mx-auto" src="{{ asset('img/mm_sword.jpg') }}" alt="">
                                            </a>
                                        </td>
                                        <td style="width: 120px;">
                                            <div style="LEFT: 0; TOP: 0; POSITION: relative;">
                                                <div style="LEFT: 0; TOP: 0; POSITION: absolute;">
                                                    <a href="">
                                                        <img src="{{ asset('img/blank.gif') }}" height="45" width="100"
                                                             alt="">
                                                    </a>
                                                </div>
                                            </div>
                                            <table style="height: 45px; width: 100px; padding: 2px; background-color: black;">
                                                <tbody>
                                                <tr>
                                                    <td class="b2" background="{{ asset('img/shinystonered.jpg') }}"
                                                        style="background-color: #570700">
                                                        <div class="text-center">
                                                            <b>Play
                                                                <span class="d-block">
                                                                    Game
                                                                </span>
                                                            </b>
                                                        </div>
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                            Play RuneScape right now!
                                            <div class="d-block">
                                                <a href="" class="c">Click here</a>
                                            </div>
                                        </td>
                                        <td style="width: 10px"></td>
                                        <td style="width: 100px;">
                                            <a href="{{ route('register') }}" class="c">
                                                <img class="mx-auto" src="{{ asset('img/mm_player.jpg') }}" alt="">
                                            </a>
                                        </td>
                                        <td style="width: 120px;">
                                            <div style="LEFT: 0; TOP: 0; POSITION: relative;">
                                                <div style="LEFT: 0; TOP: 0; POSITION: absolute;">
                                                    <a href="{{ route('register') }}" class="c">
                                                        <img src="{{ asset('img/blank.gif') }}" height="45" width="100"
                                                             alt="">
                                                    </a>
                                                </div>
                                            </div>
                                            <table style="width: 100px; padding: 0; background-color: black;">
                                                <tbody>
                                                <tr>
                                                    <td class="b2" background="{{ asset('img/shinystonered.jpg') }}"
                                                        bgcolor="#570700">
                                                        <div class="text-center">
                                                            <b>Create Account</b>
                                                        </div>
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                            Create an account for both the game and our website.
                                            <div class="d-block">
                                                <a href="{{ route('register') }}" class="c">
                                                    Click Here
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="5"></td>
                                    </tr>
                                    <tr class="align-top">
                                        <td align="center" width="100">
                                            <a href="whychoosers.htm" class="c">
                                                <img src="img/mm_whyrs.jpg">
                                            </a>
                                        </td>
                                        <td width="120">
                                            <div style="LEFT: 0; TOP: 0; POSITION: relative;">
                                                <div style="LEFT: 0; TOP: 0; POSITION: absolute;">
                                                    <a href="whychoosers.htm" class="c">
                                                        <img src="{{ asset('img/blank.gif') }}" height="45" width="100">
                                                    </a>
                                                </div>
                                            </div>
                                            <table height="45" cellpadding="2" bgcolor="black" width="100">
                                                <tbody>
                                                <tr>
                                                    <td class="b" background="img/stoneback.gif" bgcolor="#474747">
                                                        <center>
                                                            <b>Why Choose RuneScape?</b>
                                                        </center>
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                            See why our game is right for you!
                                            <div class="d-block">
                                                <a href="whychoosers.htm" class="c">Click
                                                    Here</a>
                                            </div>
                                        </td>
                                        <td width="10"></td>
                                        <td align="center" width="100"><a
                                                    href="../members/members.html"
                                                    class="c"><img
                                                        src="img/mm_members.jpg"
                                                ></a></td>
                                        <td width="120">
                                            <div style="LEFT: 0; TOP: 0; POSITION: relative;">
                                                <div style="LEFT: 0; TOP: 0; POSITION: absolute;">
                                                    <a href="../members/members.html"
                                                       class="c"><img
                                                                src="{{ asset('img/blank.gif') }}"
                                                                height="45"
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
                                            Get the Premium version of the game!
                                            <div class="d-block">
                                                <a href="../members/members.html" class="c">Click
                                                    Here</a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="5"></td>
                                    </tr>
                                    <tr class="align-top">
                                        <td align="center" width="100"><a
                                                    href="/hiscores"
                                                    class="c"><img
                                                        src="img/mm_chalice.jpg"
                                                ></a></td>
                                        <td width="120">
                                            <div style="LEFT: 0; TOP: 0; POSITION: relative;">
                                                <div style="LEFT: 0; TOP: 0; POSITION: absolute;">
                                                    <a href="/hiscores"
                                                       class="c"><img
                                                                src="{{ asset('img/blank.gif') }}"
                                                                height="45"
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
                                            Is your character in the top 250,000?
                                            <div class="d-block">
                                                <a href="/hiscores" class="c">Click
                                                    Here</a>
                                            </div>
                                        </td>
                                        <td width="10"></td>
                                        <td align="center" width="100"><a
                                                    href="betaplaygame/RS2Notes.htm"
                                                    class="c"><img
                                                        src="img/mm2_rs2b.jpg"
                                                ></a></td>
                                        <td width="120">
                                            <div style="LEFT: 0; TOP: 0; POSITION: relative;">
                                                <div style="LEFT: 0; TOP: 0; POSITION: absolute;">
                                                    <a href="betaplaygame/RS2Notes.htm"
                                                       class="c"><img
                                                                src="{{ asset('img/blank.gif') }}"
                                                                height="45"
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
                                            Try the new version
                                            <span class="d-block">
                                                of the game!</span>
                                            <div class="d-block">
                                                <a href="betaplaygame/RS2Notes.htm" class="c">Click
                                                    Here</a>
                                            </div>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                                <!--end options container-->
                            </center>
                            <div class="pb-3"></div>

                        </td>
                        <td style="width: 7px;" background="{{ asset('img/fm_middle.gif') }}"></td>
                    </tr>
                    </tbody>
                </table>
                <!--stones border bottom-->
                <table style="padding: 0;">
                    <tbody>
                    <tr>
                        <td colspan="3">
                            <img src="{{ asset('img/fm_bottom.gif') }}" alt="">
                        </td>
                    </tr>
                    </tbody>
                </table>

                <div class="pb-3"></div>

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
                <table background="{{ asset('img/fm_middle.gif') }}"
                       style="padding: 0;background-repeat:no-repeat; background-color: black; width: 500px;">
                    <tbody>
                    <tr>
                        <td style="width: 7px;" background="{{ asset('img/fm_middle.gif') }}"></td>
                        <td class="align-bottom">
                            <center>
                                <img src="{{ asset('img/blank.gif') }}" height="7"
                                     width="1">
                                <div class="pb-3"></div>
                                <b>Latest Poll</b>
                                <div class="pb-3"></div>
                                <table cellspacing="0" cellpadding="0" bgcolor="black">
                                    <tbody>
                                    <tr class="align-top">
                                        <td align="center" width="100"><a
                                                    href="../polls/allpolls.htm"><img
                                                        src="img/mms_vote.jpg"
                                                ></a></td>
                                        <td width="350">
                                            <iframe src="img/latestpoll.jpg"
                                                    scrolling="no"
                                                    frameborder="no" height="120"
                                                    width="350"></iframe>
                                        </td>
                                    </tr>
                                    <tr>
                                    </tr>
                                    </tbody>
                                </table>
                                <div class="pb-3"></div>
                            </center>
                        </td>
                        <td style="width: 7px;" background="{{ asset('img/fm_middle.gif') }}"></td>
                    </tr>
                    </tbody>
                </table>
                <!--stones border bottom-->
                <table style="padding: 0;">
                    <tbody>
                    <tr>
                        <td colspan="3">
                            <img src="{{ asset('img/fm_bottom.gif') }}" alt="">
                        </td>
                    </tr>
                    </tbody>
                </table>

                <div class="pb-3"></div>

                <!--stones border top-->
                <table cellspacing="0" cellpadding="0" bgcolor="black">
                    <tbody>
                    <tr>
                        <td>
                            <img src="{{ asset('img/fm_top.gif') }}" alt="">
                        </td>
                    </tr>
                    </tbody>
                </table>
                <!--stones content-->
                <table background="{{ asset('img/fm_middle.gif') }}"
                       style="padding: 0;background-repeat:no-repeat; background-color: black; width: 500px;">
                    <tbody>
                    <tr>
                        <td style="width: 7px;" background="{{ asset('img/fm_middle.gif') }}"></td>
                        <td class="align-bottom">
                            <center>
                                <img src="{{ asset('img/blank.gif') }}" height="7"
                                     width="1">
                                <div class="pb-3"></div>
                                <b>Secure Services</b>
                                <div class="pb-3"></div>
                                <!--table to contain options-->
                                <table>
                                    <tbody>
                                    <tr class="align-top">
                                        <td align="center" width="100"><a
                                                    href="../securemenu/securemenu.html"
                                                    class="c"><img
                                                        src="img/mm_subscribe.jpg"
                                                        height="120" width="77"></a>
                                        </td>
                                        <td width="120">
                                            <div style="LEFT: 0; TOP: 0; POSITION: relative;">
                                                <div style="LEFT: 0; TOP: 0; POSITION: absolute;">
                                                    <a href="../securemenu/securemenu.html"
                                                       class="c"><img
                                                                src="{{ asset('img/blank.gif') }}"
                                                                height="45"
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
                                            Start or continue your subscription
                                            <div class="d-block">
                                                <a href="../securemenu/securemenu.html" class="c">
                                                    Click Here
                                                </a>
                                            </div>
                                        </td>
                                        <td width="10"></td>
                                        <td align="center" width="100"><a
                                                    href="../unsubscribe/unsubscribe.html"
                                                    class="c"><img
                                                        src="img/mm_unsubscribe.jpg"
                                                        height="120" width="77"></a>
                                        </td>
                                        <td width="120">
                                            <div style="LEFT: 0; TOP: 0; POSITION: relative;">
                                                <div style="LEFT: 0; TOP: 0; POSITION: absolute;">
                                                    <a href="../unsubscribe/unsubscribe.html"
                                                       class="c"><img
                                                                src="{{ asset('img/blank.gif') }}"
                                                                height="45"
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
                                            Cancel your subscription
                                            <div class="d-block">
                                                <a href="../unsubscribe/unsubscribe.html" class="c">
                                                    Click Here
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="5"></td>
                                    </tr>
                                    <tr class="align-top">
                                        <td align="center" width="100"><a
                                                    href="../customersupport/customersupport.html"><img
                                                        src="img/mm_support.jpg"
                                                        height="120" width="77"></a>
                                        </td>
                                        <td width="120">
                                            <div style="LEFT: 0; TOP: 0; POSITION: relative;">
                                                <div style="LEFT: 0; TOP: 0; POSITION: absolute;">
                                                    <a href="../customersupport/customersupport.html"><img
                                                                src="{{ asset('img/blank.gif') }}"
                                                                height="45"
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
                                            Questions?
                                            <span class="d-block">Contact our staff
                                            </span>
                                            <div class="d-block">
                                                <a href="../customersupport/customersupport.html"
                                                   class="c">
                                                    Click Here
                                                </a>
                                            </div>
                                        </td>
                                        <td width="10"></td>
                                        <td align="center" width="100"><a
                                                    href="../securemenu/securemenu.html"
                                                    class="c"><img
                                                        src="img/mm_inbox.jpg"
                                                        height="120" width="77"></a>
                                        </td>
                                        <td width="120">
                                            <div style="LEFT: 0; TOP: 0; POSITION: relative;">
                                                <div style="LEFT: 0; TOP: 0; POSITION: absolute;">
                                                    <a href="../securemenu/securemenu.html"
                                                       class="c"><img
                                                                src="{{ asset('img/blank.gif') }}"
                                                                height="45"
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
                                            Your messages
                                            <span class="d-block">
                                                from our staff
                                            </span>
                                            <div class="d-block">
                                                <a href="../securemenu/securemenu.html" class="c">
                                                    Click Here
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="5"></td>
                                    </tr>
                                    <tr class="align-top">
                                        <td align="center" width="100"><a
                                                    href="../securemenu/securemenu.html"
                                                    class="c"><img
                                                        src="img/mms_forums.jpg"
                                                        height="120" width="77"></a>
                                        </td>
                                        <td width="120">
                                            <div style="LEFT: 0; TOP: 0; POSITION: relative;">
                                                <div style="LEFT: 0; TOP: 0; POSITION: absolute;">
                                                    <a href="../securemenu/securemenu.html"
                                                       class="c"><img
                                                                src="{{ asset('img/blank.gif') }}"
                                                                height="45"
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
                                            Discuss the game with fellow players!
                                            <div class="d-block">
                                                <a href="../securemenu/securemenu.html" class="c">
                                                    Click Here
                                                </a>
                                            </div>
                                        </td>
                                        <td width="10"></td>
                                        <td align="center" width="100"><a
                                                    href="../securemenu/securemenu.html"
                                                    class="c"><img
                                                        src="img/mms_accman.jpg"
                                                        height="120" width="77"></a>
                                        </td>
                                        <td width="120">
                                            <div style="LEFT: 0; TOP: 0; POSITION: relative;">
                                                <div style="LEFT: 0; TOP: 0; POSITION: absolute;">
                                                    <a href="../securemenu/securemenu.html"
                                                       class="c"><img
                                                                src="{{ asset('img/blank.gif') }}"
                                                                height="45"
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
                                            Manage your Password and Recovery Details
                                            <div class="d-block">
                                                <a href="../securemenu/securemenu.html" class="c">
                                                    Click Here
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                                <!--end options container-->
                            </center>
                            <div class="pb-3"></div>
                        </td>
                        <td style="width: 7px;" background="{{ asset('img/fm_middle.gif') }}"></td>
                    </tr>
                    </tbody>
                </table>
                <!--stones border bottom-->
                <table style="padding: 0;">
                    <tbody>
                    <tr>
                        <td colspan="3">
                            <img src="{{ asset('img/fm_bottom.gif') }}" alt="">
                        </td>
                    </tr>
                    </tbody>
                </table>

                <div class="pb-3"></div>

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
                <table background="{{ asset('img/fm_middle.gif') }}"
                       style="padding: 0;background-repeat:no-repeat; background-color: black; width: 500px;">
                    <tbody>
                    <tr>
                        <td style="width: 7px;" background="{{ asset('img/fm_middle.gif') }}"></td>
                        <td class="align-bottom">
                            <center>
                                <img src="{{ asset('img/blank.gif') }}" height="7"
                                     width="1">
                                <div class="pb-3"></div>
                                <b>Manual</b>
                                <div class="pb-3"></div>

                                <!--table to contain options-->
                                <table>
                                    <tbody>
                                    <tr class="align-top">
                                        <td align="center" width="100">
                                            <a href="../howtoplay.html" class="c"><img
                                                        src="img/mm_howtoplay.jpg"
                                                        height="120" width="77"></a>
                                        </td>
                                        <td width="120">
                                            <div style="LEFT: 0; TOP: 0; POSITION: relative;">
                                                <div style="LEFT: 0; TOP: 0; POSITION: absolute;">
                                                    <a href="../howtoplay.html"
                                                       class="c"><img
                                                                src="{{ asset('img/blank.gif') }}"
                                                                height="45"
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
                                            RuneScape
                                            <div class="d-block">
                                                <a href="../howtoplay.html" class="c">
                                                    Click Here
                                                </a>
                                            </div>
                                        </td>
                                        <td width="10"></td>
                                        <td align="center" width="100">
                                            <a href="{{ route('Frequently_Asked_Questions') }}"><img
                                                        src="img/mm_faq.jpg"
                                                        height="120" width="77"></a>
                                        </td>
                                        <td width="120">
                                            <div style="LEFT: 0; TOP: 0; POSITION: relative;">
                                                <div style="LEFT: 0; TOP: 0; POSITION: absolute;">
                                                    <a href="{{ route('Frequently_Asked_Questions') }}"><img
                                                                src="{{ asset('img/blank.gif') }}"
                                                                height="45"
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
                                            Answers to Frequently Asked Questions
                                            <div class="d-block">
                                                <a href="{{ route('Frequently_Asked_Questions') }}" class="c">
                                                    Click Here
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="5"></td>
                                    </tr>
                                    <tr class="align-top">
                                        <td align="center" width="100"><a
                                                    href="../varrock/varrockindex.html"><img
                                                        src="img/mm_lov.jpg"
                                                        height="120" width="77"></a>
                                        </td>
                                        <td width="120">
                                            <div style="LEFT: 0; TOP: 0; POSITION: relative;">
                                                <div style="LEFT: 0; TOP: 0; POSITION: absolute;">
                                                    <a href="../varrock/varrockindex.html"><img
                                                                src="{{ asset('img/blank.gif') }}"
                                                                height="45"
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
                                            Learn about the History of RuneScape
                                            <div class="d-block">
                                                <a href="../varrock/varrockindex.html" class="c">
                                                    Click Here
                                                </a>
                                            </div>
                                        </td>
                                        <td width="10"></td>
                                        <td align="center" width="100"><a
                                                    href="/rules"><img
                                                        src="img/mm_rules.jpg"
                                                        height="120" width="77"></a>
                                        </td>
                                        <td width="120">
                                            <div style="LEFT: 0; TOP: 0; POSITION: relative;">
                                                <div style="LEFT: 0; TOP: 0; POSITION: absolute;">
                                                    <a href="/rules"><img
                                                                src="{{ asset('img/blank.gif') }}"
                                                                height="45"
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
                                            Learn our rules
                                            <span class="d-block">
                                                and stay safe
                                                </span>
                                            <span class="d-block">
                                                online
                                            </span>
                                            <div class="d-block">
                                                <a href="/rules" class="c">
                                                    Click Here
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                                <!--end options container-->
                            </center>
                            <div class="pb-3"></div>
                        </td>
                        <td style="width: 7px;" background="{{ asset('img/fm_middle.gif') }}"></td>
                    </tr>
                    </tbody>
                </table>
                <!--stones border bottom-->
                <table style="padding: 0;">
                    <tbody>
                    <tr>
                        <td colspan="3">
                            <img src="{{ asset('img/fm_bottom.gif') }}" alt="">
                        </td>
                    </tr>
                    </tbody>
                </table>
                <div class="pb-2"></div>
            </td>
        </tr>
        </tbody>
    </table>
@endsection