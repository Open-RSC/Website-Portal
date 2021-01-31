@extends('template')
@section('content')
    <div class="logo" role="banner"></div>
    <span class="d-block online-count" style="font-size: 14px;">
        There are currently {{ $online_count }} people on RSC Preservation and RSC Cabbage.
    </span>
    <span class="d-block online-count" style="font-size: 14px;">
        There are currently {{ $online_count+10 }} cyborgs on radioactive RSC Uranium and RSC Coleslaw.
    </span>
    <div class="pt-3"></div>

    <ul class="menu">
        <!-- Authentication Links -->
        @guest
            <li><a href="{{ route('Secure_Login') }}">{{ __('Secure Login') }}</a></li>
        @else
            <li>
                <label for="drop-5" class="toggle">{{ Auth::user()->username }} <i class="fas fa-caret-down"></i></label>
                <a href="#">{{ Auth::user()->username }}</a>
                <input type="checkbox" id="drop-5" style="display: none !important;"/>
                <ul>
                    <li><a href="{{ route('Logout') }}"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                    </li>
                </ul>
                <form id="logout-form" action="{{ route('Logout') }}" method="POST"
                      style="display: none;">
                    @csrf
                </form>
            </li>
        @endguest
    </ul>

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
                                                                echo Str::limit(strip_tags($news->post_subject), 37);
                                                            @endphp
                                                        </a>
                                                    </td>
                                                    <td class="w-25">
                                                            <span class="text-white float-right">
                                                                @php
                                                                    $timestamp = $news->topic_time;
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
                            <div class="text-center pb-2">To view a full list of news and updates,
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
                                            <div style="left: 0; top: 0; position: relative;">
                                                <div style="left: 0; top: 0; position: absolute;">
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
                                                <a href="" class="c">
                                                    Click here
                                                </a>
                                            </div>
                                        </td>
                                        <td style="width: 10px"></td>
                                        <td style="width: 100px;">
                                            <a href="{{ route('Player_Registration') }}" class="c">
                                                <img class="mx-auto" src="{{ asset('img/mm_player.jpg') }}" alt="">
                                            </a>
                                        </td>
                                        <td style="width: 120px;">
                                            <div style="left: 0; top: 0; position: relative;">
                                                <div style="left: 0; top: 0; position: absolute;">
                                                    <a href="{{ route('Player_Registration') }}" class="c">
                                                        <img src="{{ asset('img/blank.gif') }}" height="45" width="100"
                                                             alt="">
                                                    </a>
                                                </div>
                                            </div>
                                            <table style="width: 100px; padding: 0; background-color: black;">
                                                <tbody>
                                                <tr>
                                                    <td class="b2" background="{{ asset('img/shinystonered.jpg') }}"
                                                        style="background-color: #570700">
                                                        <div class="text-center">
                                                            <b>Create Account</b>
                                                        </div>
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                            Create an account for both the game and our website.
                                            <div class="d-block">
                                                <a href="{{ route('Player_Registration') }}" class="c">
                                                    Click Here
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="5"></td>
                                    </tr>
                                    <tr class="align-top">
                                        <td style="width: 100px;">
                                            <a href="" class="c">
                                                <img class="mx-auto" src="{{ asset('img/mm_whyrs.jpg') }}" alt="">
                                            </a>
                                        </td>
                                        <td style="width: 120px;">
                                            <div style="left: 0; top: 0; position: relative;">
                                                <div style="left: 0; top: 0; position: absolute;">
                                                    <a href="" class="c">
                                                        <img src="{{ asset('img/blank.gif') }}" height="45" width="100"
                                                             alt="">
                                                    </a>
                                                </div>
                                            </div>
                                            <table style="height: 45px; width: 100px; padding: 2px; background-color: black;">
                                                <tbody>
                                                <tr>
                                                    <td class="b" background="{{ asset('img/stoneback.gif') }}"
                                                        style="background-color: #474747">
                                                        <div class="text-center">
                                                            <b>Why Choose RuneScape?</b>
                                                        </div>
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                            See why our game is right for you!
                                            <div class="d-block">
                                                <a href="" class="c">Click Here</a>
                                            </div>
                                        </td>
                                        <td style="width: 10px;"></td>
                                        <td style="width: 100px;">
                                            <a href="" class="c">
                                                <img class="mx-auto" src="{{ asset('img/mm_members.jpg') }}" alt="">
                                            </a>
                                        </td>
                                        <td style="width: 120px;">
                                            <div style="left: 0; top: 0; position: relative;">
                                                <div style="left: 0; top: 0; position: absolute;">
                                                    <a href=""
                                                       class="c">
                                                        <img src="{{ asset('img/blank.gif') }}" height="45" width="100"
                                                             alt="">
                                                    </a>
                                                </div>
                                            </div>
                                            <table style="height: 45px; width: 100px; padding: 2px; background-color: black;">
                                                <tbody>
                                                <tr>
                                                    <td class="b" background="{{ asset('img/stoneback.gif') }}"
                                                        style="background-color: #474747;">
                                                        <div class="text-center">
                                                            <b>RuneScape Members</b>
                                                        </div>
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                            Get the Premium version of the game!
                                            <div class="d-block">
                                                <a href="" class="c">
                                                    Click Here
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="5"></td>
                                    </tr>
                                    <tr class="align-top">
                                        <td style="width: 100px;">
                                            <a href="{{ route('Hiscores') }}" class="c">
                                                <img class="mx-auto" src="{{ asset('img/mm_chalice.jpg') }}" alt="">
                                            </a>
                                        </td>
                                        <td style="width: 120px;">
                                            <div style="left: 0; top: 0; position: relative;">
                                                <div style="left: 0; top: 0; position: absolute;">
                                                    <a href="{{ route('Hiscores') }}" class="c">
                                                        <img src="{{ asset('img/blank.gif') }}" height="45" width="100"
                                                             alt="">
                                                    </a>
                                                </div>
                                            </div>
                                            <table style="height: 45px; width: 100px; padding: 2px; background-color: black;">
                                                <tbody>
                                                <tr>
                                                    <td class="b" background="{{ asset('img/stoneback.gif') }}"
                                                        style="background-color: #474747;">
                                                        <div class="text-center">
                                                            <b>Hiscore Tables</b>
                                                        </div>
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                            Is your character in the top 250,000?
                                            <div class="d-block">
                                                <a href="{{ route('Hiscores') }}" class="c">
                                                    Click Here
                                                </a>
                                            </div>
                                        </td>
                                        <td style="width: 10px;"></td>
                                        <td style="width: 100px;">
                                            <a href="" class="c">
                                                <img src="{{ asset('img/mm2_rs2b.jpg') }}" alt="">
                                            </a>
                                        </td>
                                        <td style="width: 120px;">
                                            <div style="left: 0; top: 0; position: relative;">
                                                <div style="left: 0; top: 0; position: absolute;">
                                                    <a href="" class="c">
                                                        <img src="{{ asset('img/blank.gif') }}" height="45" width="100"
                                                             alt="">
                                                    </a>
                                                </div>
                                            </div>
                                            <table style="height: 45px; width: 100px; padding: 2px; background-color: black;">
                                                <tbody>
                                                <tr>
                                                    <td class="b" background="{{ asset('img/stoneback.gif') }}"
                                                        style="background-color: #474747;">
                                                        <div class="text-center">
                                                            <b>Play RS2 Beta</b>
                                                        </div>
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                            Try the new version
                                            <span class="d-block">
                                                of the game!</span>
                                            <div class="d-block">
                                                <a href="" class="c">
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
                                <img src="{{ asset('img/blank.gif') }}" height="7" width="1" alt="">
                                <div class="pb-3"></div>
                                <b>Latest Poll</b>
                                <div class="pb-3"></div>
                                <table style="padding: 0; background-color: black;">
                                    <tbody>
                                    <tr class="align-top">
                                        <td style="width: 100px;">
                                            <a href="">
                                                <img class="mx-auto" src="{{ asset('img/mms_vote.jpg') }}" alt="">
                                            </a>
                                        </td>
                                        <td style="width: 350px;">
                                            <img src="{{ asset('img/latestpoll.jpg') }}" height="120" width="350"
                                                 alt=""/>
                                        </td>
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
                <table style="padding: 0; background-color: black;">
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
                                <img src="{{ asset('img/blank.gif') }}" height="7" width="1" alt="">
                                <div class="pb-3"></div>
                                <b>Secure Services</b>
                                <div class="pb-3"></div>
                                <!--table to contain options-->
                                <table>
                                    <tbody>
                                    <tr class="align-top">
                                        <td style="width: 100px;">
                                            <a href="" class="c">
                                                <img class="mx-auto" src="{{ asset('img/mm_subscribe.jpg') }}"
                                                     height="120" width="77" alt="">
                                            </a>
                                        </td>
                                        <td style="width: 120px;">
                                            <div style="left: 0; top: 0; position: relative;">
                                                <div style="left: 0; top: 0; position: absolute;">
                                                    <a href="" class="c">
                                                        <img src="{{ asset('img/blank.gif') }}" height="45" width="100"
                                                             alt="">
                                                    </a>
                                                </div>
                                            </div>
                                            <table style="height: 45px; width: 100px; padding: 2px; background-color: black;">
                                                <tbody>
                                                <tr>
                                                    <td class="b" background="{{ asset('img/stoneback.gif') }}"
                                                        style="background-color: #474747;">
                                                        <div class="text-center">
                                                            <b>Subscribe</b>
                                                        </div>
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                            Start or continue your subscription
                                            <div class="d-block">
                                                <a href="" class="c">
                                                    Click Here
                                                </a>
                                            </div>
                                        </td>
                                        <td style="width: 10px;"></td>
                                        <td style="width: 100px;">
                                            <a href="" class="c">
                                                <img class="mx-auto" src="{{ asset('img/mm_unsubscribe.jpg') }}"
                                                     height="120" width="77" alt="">
                                            </a>
                                        </td>
                                        <td style="width: 120px;">
                                            <div style="left: 0; top: 0; position: relative;">
                                                <div style="left: 0; top: 0; position: absolute;">
                                                    <a href="" class="c">
                                                        <img src="{{ asset('img/blank.gif') }}" height="45" width="100"
                                                             alt="">
                                                    </a>
                                                </div>
                                            </div>
                                            <table style="height: 45px; width: 100px; padding: 2px; background-color: black;">
                                                <tbody>
                                                <tr>
                                                    <td class="b" background="{{ asset('img/stoneback.gif') }}"
                                                        style="background-color: #474747;">
                                                        <div class="text-center">
                                                            <b>Unsubscribe</b>
                                                        </div>
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                            Cancel your subscription
                                            <div class="d-block">
                                                <a href="" class="c">
                                                    Click Here
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="5"></td>
                                    </tr>
                                    <tr class="align-top">
                                        <td style="width: 100px;">
                                            <a href="">
                                                <img class="mx-auto" src="{{ asset('img/mm_support.jpg') }}"
                                                     height="120" width="77" alt="">
                                            </a>
                                        </td>
                                        <td style="width: 120px;">
                                            <div style="left: 0; top: 0; position: relative;">
                                                <div style="left: 0; top: 0; position: absolute;">
                                                    <a href="">
                                                        <img src="{{ asset('img/blank.gif') }}" height="45" width="100"
                                                             alt="">
                                                    </a>
                                                </div>
                                            </div>
                                            <table style="height: 45px; width: 100px; padding: 2px; background-color: black;">
                                                <tbody>
                                                <tr>
                                                    <td class="b" background="{{ asset('img/stoneback.gif') }}"
                                                        style="background-color: #474747;">
                                                        <div class="text-center">
                                                            <b>Customer Support</b>
                                                        </div>
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                            Questions?
                                            <span class="d-block">
                                                Contact our staff
                                            </span>
                                            <div class="d-block">
                                                <a href="" class="c">
                                                    Click Here
                                                </a>
                                            </div>
                                        </td>
                                        <td style="width: 10px;"></td>
                                        <td style="width: 100px;">
                                            <a href="" class="c">
                                                <img class="mx-auto" src="{{ asset('img/mm_inbox.jpg') }}" height="120"
                                                     width="77" alt="">
                                            </a>
                                        </td>
                                        <td style="width: 120px;">
                                            <div style="left: 0; top: 0; position: relative;">
                                                <div style="left: 0; top: 0; position: absolute;">
                                                    <a href=""
                                                       class="c">
                                                        <img src="{{ asset('img/blank.gif') }}" height="45" width="100"
                                                             alt="">
                                                    </a>
                                                </div>
                                            </div>
                                            <table style="height: 45px; width: 100px; padding: 2px; background-color: black;">
                                                <tbody>
                                                <tr>
                                                    <td class="b" background="{{ asset('img/stoneback.gif') }}"
                                                        style="background-color: #474747;">
                                                        <div class="text-center">
                                                            <b>Message Centre</b>
                                                        </div>
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                            Your messages
                                            <span class="d-block">
                                                from our staff
                                            </span>
                                            <div class="d-block">
                                                <a href="" class="c">
                                                    Click Here
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="5"></td>
                                    </tr>
                                    <tr class="align-top">
                                        <td style="width: 100px;">
                                            <a href="" class="c">
                                                <img class="mx-auto" src="{{ asset('img/mms_forums.jpg') }}"
                                                     height="120" width="77" alt="">
                                            </a>
                                        </td>
                                        <td style="width: 120px;">
                                            <div style="left: 0; top: 0; position: relative;">
                                                <div style="left: 0; top: 0; position: absolute;">
                                                    <a href="" class="c">
                                                        <img src="{{ asset('img/blank.gif') }}" height="45" width="100"
                                                             alt="">
                                                    </a>
                                                </div>
                                            </div>
                                            <table style="height: 45px; width: 100px; padding: 2px; background-color: black;">
                                                <tbody>
                                                <tr>
                                                    <td class="b" background="{{ asset('img/stoneback.gif') }}"
                                                        style="background-color: #474747;">
                                                        <div class="text-center">
                                                            <b>Forums</b>
                                                        </div>
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                            Discuss the game with fellow players!
                                            <div class="d-block">
                                                <a href="" class="c">
                                                    Click Here
                                                </a>
                                            </div>
                                        </td>
                                        <td style="width: 10px;"></td>
                                        <td style="width: 100px;">
                                            <a href="" class="c">
                                                <img class="mx-auto" src="{{ asset('img/mms_accman.jpg') }}"
                                                     height="120" width="77" alt="">
                                            </a>
                                        </td>
                                        <td style="width: 120px;">
                                            <div style="left: 0; top: 0; position: relative;">
                                                <div style="left: 0; top: 0; position: absolute;">
                                                    <a href="" class="c">
                                                        <img src="{{ asset('img/blank.gif') }}" height="45" width="100"
                                                             alt="">
                                                    </a>
                                                </div>
                                            </div>
                                            <table style="height: 45px; width: 100px; padding: 2px; background-color: black;">
                                                <tbody>
                                                <tr>
                                                    <td class="b" background="{{ asset('img/stoneback.gif') }}"
                                                        style="background-color: #474747;">
                                                        <div class="text-center">
                                                            <b>Account Management</b>
                                                        </div>
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                            Manage your Password and Recovery Details
                                            <div class="d-block">
                                                <a href="" class="c">
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
                                <img src="{{ asset('img/blank.gif') }}" height="7" width="1" alt="">
                                <div class="pb-3"></div>
                                <b>Manual</b>
                                <div class="pb-3"></div>
                                <!--table to contain options-->
                                <table>
                                    <tbody>
                                    <tr class="align-top">
                                        <td style="width: 100px;">
                                            <a href="" class="c">
                                                <img class="mx-auto" src="{{ asset('img/mm_howtoplay.jpg') }}"
                                                     height="120" width="77" alt="">
                                            </a>
                                        </td>
                                        <td style="width: 120px;">
                                            <div style="left: 0; top: 0; position: relative;">
                                                <div style="left: 0; top: 0; position: absolute;">
                                                    <a href="" class="c">
                                                        <img src="{{ asset('img/blank.gif') }}" height="45" width="100"
                                                             alt="">
                                                    </a>
                                                </div>
                                            </div>
                                            <table style="height: 45px; width: 100px; padding: 2px; background-color: black;">
                                                <tbody>
                                                <tr>
                                                    <td class="b" background="{{ asset('img/stoneback.gif') }}"
                                                        style="background-color: #474747;">
                                                        <div class="text-center">
                                                            <b>How To Play</b>
                                                        </div>
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                            Everything you need to know to play
                                            RuneScape
                                            <div class="d-block">
                                                <a href="" class="c">
                                                    Click Here
                                                </a>
                                            </div>
                                        </td>
                                        <td style="width: 10px;"></td>
                                        <td style="width: 100px;">
                                            <a href="{{ route('Frequently_Asked_Questions') }}">
                                                <img class="mx-auto" src="{{ asset('img/mm_faq.jpg') }}" height="120"
                                                     width="77" alt="">
                                            </a>
                                        </td>
                                        <td style="width: 120px;">
                                            <div style="left: 0; top: 0; position: relative;">
                                                <div style="left: 0; top: 0; position: absolute;">
                                                    <a href="{{ route('Frequently_Asked_Questions') }}">
                                                        <img src="{{ asset('img/blank.gif') }}" height="45" width="100"
                                                             alt="">
                                                    </a>
                                                </div>
                                            </div>
                                            <table style="height: 45px; width: 100px; padding: 2px; background-color: black;">
                                                <tbody>
                                                <tr>
                                                    <td class="b" background="{{ asset('img/stoneback.gif') }}"
                                                        style="background-color: #474747;">
                                                        <div class="text-center">
                                                            <b>F.A.Q.</b>
                                                        </div>
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
                                        <td style="width: 100px;">
                                            <a href="">
                                                <img class="mx-auto" src="{{ asset('img/mm_lov.jpg') }}" height="120"
                                                     width="77" alt="">
                                            </a>
                                        </td>
                                        <td style="width: 120px;">
                                            <div style="left: 0; top: 0; position: relative;">
                                                <div style="left: 0; top: 0; position: absolute;">
                                                    <a href="">
                                                        <img src="{{ asset('img/blank.gif') }}" height="45" width="100"
                                                             alt="">
                                                    </a>
                                                </div>
                                            </div>
                                            <table style="height: 45px; width: 100px; padding: 2px; background-color: black;">
                                                <tbody>
                                                <tr>
                                                    <td class="b" background="{{ asset('img/stoneback.gif') }}"
                                                        style="background-color: #474747;">
                                                        <div class="text-center">
                                                            <b>Library of Varrock</b>
                                                        </div>
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                            Learn about the History of RuneScape
                                            <div class="d-block">
                                                <a href="" class="c">
                                                    Click Here
                                                </a>
                                            </div>
                                        </td>
                                        <td style="width: 10px;"></td>
                                        <td style="width: 100px;">
                                            <a href="{{ route('Rules_and_Security') }}">
                                                <img class="mx-auto" src="{{ asset('img/mm_rules.jpg') }}" height="120"
                                                     width="77" alt="">
                                            </a>
                                        </td>
                                        <td style="width: 120px;">
                                            <div style="left: 0; top: 0; position: relative;">
                                                <div style="left: 0; top: 0; position: absolute;">
                                                    <a href="{{ route('Rules_and_Security') }}">
                                                        <img src="{{ asset('img/blank.gif') }}" height="45" width="100"
                                                             alt="">
                                                    </a>
                                                </div>
                                            </div>
                                            <table style="height: 45px; width: 100px; padding: 2px; background-color: black;">
                                                <tbody>
                                                <tr>
                                                    <td class="b" background="{{ asset('img/stoneback.gif') }}"
                                                        style="background-color: #474747">
                                                        <div class="text-center">
                                                            <b>Rules & Security</b>
                                                        </div>
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
                                                <a href="{{ route('Rules_and_Security') }}" class="c">
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