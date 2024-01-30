@extends('template')
@section('content')

    <!-- RS Archive banner -->
    <table cellspacing="0" style="float:left; border:3px solid #89735B; margin:20px; width:90%; background:#D0C0A1;"
           class="wikipediauserbox">
        <tbody>
        <tr>
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <th style="width:45px; height:45px; background:#EAD8B9; text-align:center; font-size:0pt; color:#D0C0A1; padding:0 1px 0 0; line-height:1.25em; vertical-align: middle;">
                <img
                        src="{{ asset('img/rs-archive.png') }}" alt="RS Archive"/>
            </th>
            <td style="text-align:left; font-size:9pt; padding:0 4px 0 4px; height:45px; line-height:1.25em; color:#685746; vertical-align: middle;">
                <div align="center">Contribute to the
                    <a href="https://rs-archive.github.io/index.html" style="color:red">RS Archive</a> with any
                    lost RS data prior to 2010 and <span style="color:#0000CC">receive any
obtainable item of your choice</span> as a thanks!
                </div>
            </td>
        </tr>
        </tbody>
    </table>


    <!-- normal page content -->
    <div class="homepage-logo-container">
        <img src="{{ asset('img/logo.png') }}" alt="" class="homepage-logo"/>
    </div>

    <!--Latest news-->
    <table>
        <tbody>
        <tr>
            <td>
                <!--World list-->

                @include('partials.homepage-worlds-table')

                <div class="pb-3"></div>

                <table class="homepage-content">
                    <tbody>
                    <tr>
                        <td>
                            <img src="{{ asset('img/fm_top.gif') }}" alt="">
                        </td>
                    </tr>
                    </tbody>
                </table>
                <table background="{{ asset('img/fm_middle.gif') }}" class="homepage-section-content">
                    <tbody>
                    <tr>
                        <td style="width: 7px;"
                            background="{{ asset('img/fm_middle.gif') }}"></td>
                        <td>
                            <div class="pb-3"></div>
                            <span class="d-block text-center">
                                <b>Latest News and Updates</b>
                            </span>
                            <div class="pb-3"></div>
                            <table class="homepage-content">
                                <tbody>
                                <tr class="align-top">
                                    <td style="width: 100px;">
                                        <a href="/board/viewforum.php?f=2">
                                            <img class="mx-auto"
                                                 src="{{ asset('img/mm_scroll.jpg') }}"
                                                 alt="">
                                        </a>
                                    </td>
                                    <td style="width: 350px">
                                        <table id="List" class="container">
                                            @foreach ($news_feed as $news)
                                                <tr>
                                                    <td class="w-75">
                                                        <!-- News subject -->
                                                        <a class="c"
                                                           href="/board/viewtopic.php?f={{ $news->forum_id }}&p={{ $news->post_id }}">
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
                            <div class="text-center pb-2">To view a full list of news and
                                updates,
                                <a href="/board/viewforum.php?f=2" class="c">click here</a>.
                            </div>
                        </td>
                        <td style="width: 7px;"
                            background="{{ asset('img/fm_middle.gif') }}"></td>
                    </tr>
                    </tbody>
                </table>
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

                <!--Play game-->
                <table class="homepage-content">
                    <tbody>
                    <tr>
                        <td>
                            <img src="{{ asset('img/fm_top.gif') }}" alt="">
                        </td>
                    </tr>
                    </tbody>
                </table>
                <table background="{{ asset('img/fm_middle.gif') }}" class="homepage-section-content">
                    <tbody>
                    <tr>
                        <td style="width: 7px;"
                            background="{{ asset('img/fm_middle.gif') }}"></td>
                        <td class="align-bottom">
                            <div style="text-align: center;">
                                <div class="pb-3"></div>
                                <table>
                                    <tbody>
                                    <tr>
                                        <td colspan="5"></td>
                                    </tr>
                                    <tr class="align-top">
                                        <td style="width: 100px;">
                                            <a href="https://classic.runescape.wiki/w/RuneScape_Classic" target="_blank"
                                               class="c">
                                                <img class="mx-auto"
                                                     src="{{ asset('img/mm_whyrs.jpg') }}"
                                                     alt="">
                                            </a>
                                        </td>
                                        <td style="width: 120px;">
                                            <div style="left: 0; top: 0; position: relative;">
                                                <div style="left: 0; top: 0; position: absolute;">
                                                    <a href="https://classic.runescape.wiki/w/RuneScape_Classic"
                                                       target="_blank" class="c">
                                                        <img src="{{ asset('img/blank.gif') }}"
                                                             height="45" width="100"
                                                             alt="">
                                                    </a>
                                                </div>
                                            </div>
                                            <table style="height: 45px; width: 100px; padding: 2px; background-color: black;">
                                                <tbody>
                                                <tr>
                                                    <td class="b"
                                                        background="{{ asset('img/stoneback.gif') }}"
                                                        style="background-color: #474747">
                                                        <div class="text-center">
                                                            <b>Why Choose OpenRSC?</b>
                                                        </div>
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                            See why our game is right for you!
                                            <div class="d-block">
                                                <a href="https://classic.runescape.wiki/w/RuneScape_Classic"
                                                   target="_blank" class="c">Click Here</a>
                                            </div>
                                        </td>
                                        <td style="width: 10px;"></td>
                                        <td style="width: 100px;">
                                            <a href="https://classic.runescape.wiki/w/Pay-to-play" target="_blank"
                                               class="c">
                                                <img class="mx-auto"
                                                     src="{{ asset('img/mm_members.jpg') }}"
                                                     alt="">
                                            </a>
                                        </td>
                                        <td style="width: 120px;">
                                            <div style="left: 0; top: 0; position: relative;">
                                                <div style="left: 0; top: 0; position: absolute;">
                                                    <a href="https://classic.runescape.wiki/w/Pay-to-play"
                                                       target="_blank"
                                                       class="c">
                                                        <img src="{{ asset('img/blank.gif') }}"
                                                             height="45" width="100"
                                                             alt="">
                                                    </a>
                                                </div>
                                            </div>
                                            <table style="height: 45px; width: 100px; padding: 2px; background-color: black;">
                                                <tbody>
                                                <tr>
                                                    <td class="b"
                                                        background="{{ asset('img/stoneback.gif') }}"
                                                        style="background-color: #474747;">
                                                        <div class="text-center">
                                                            <b>OpenRSC Members</b>
                                                        </div>
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                            Everyone may be a member for free!
                                            <div class="d-block">
                                                <a href="https://classic.runescape.wiki/w/Pay-to-play" target="_blank"
                                                   class="c">
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
                                            <a href="/hiscores/preservation" class="c">
                                                <img class="mx-auto"
                                                     src="{{ asset('img/mm_chalice.jpg') }}"
                                                     alt="">
                                            </a>
                                        </td>
                                        <td style="width: 120px;">
                                            <div style="left: 0; top: 0; position: relative;">
                                                <div style="left: 0; top: 0; position: absolute;">
                                                    <a href="/hiscores/preservation" class="c">
                                                        <img src="{{ asset('img/blank.gif') }}"
                                                             height="45" width="100"
                                                             alt="">
                                                    </a>
                                                </div>
                                            </div>
                                            <table style="height: 45px; width: 100px; padding: 2px; background-color: black;">
                                                <tbody>
                                                <tr>
                                                    <td class="b"
                                                        background="{{ asset('img/stoneback.gif') }}"
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
                                                <a href="/hiscores/preservation" class="c">
                                                    Click Here
                                                </a>
                                            </div>
                                        </td>
                                        <td style="width: 10px;"></td>
                                        <td style="width: 100px;">
                                            <a href="https://2009scape.org" class="c">
                                                <img class="mx-auto"
                                                     src="{{ asset('img/mms_rsclassic.png') }}"
                                                     alt="RS2 Beta">
                                            </a>
                                        </td>
                                        <td style="width: 120px;">
                                            <div style="left: 0; top: 0; position: relative;">
                                                <div style="left: 0; top: 0; position: absolute;">
                                                    <a href="https://2009scape.org" target="_blank" class="c">
                                                        <img src="{{ asset('img/blank.gif') }}"
                                                             height="45" width="100"
                                                             alt="">
                                                    </a>
                                                </div>
                                            </div>
                                            <table style="height: 45px; width: 100px; padding: 2px; background-color: black;">
                                                <tbody>
                                                <tr>
                                                    <td class="b"
                                                        background="{{ asset('img/stoneback.gif') }}"
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
                                                <a href="https://2009scape.org" target="_blank" class="c">
                                                    Click Here
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="pb-3"></div>
                        </td>
                        <td style="width: 7px;"
                            background="{{ asset('img/fm_middle.gif') }}"></td>
                    </tr>
                    </tbody>
                </table>
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

                <!--Secure Services-->
                <table style="padding: 0; background-color: black;">
                    <tbody>
                    <tr>
                        <td>
                            <img src="{{ asset('img/fm_top.gif') }}" alt="">
                        </td>
                    </tr>
                    </tbody>
                </table>
                <table background="{{ asset('img/fm_middle.gif') }}" class="homepage-section-content">
                    <tbody>
                    <tr>
                        <td style="width: 7px;"
                            background="{{ asset('img/fm_middle.gif') }}"></td>
                        <td class="align-bottom">
                            <div style="text-align: center;">
                                <img src="{{ asset('img/blank.gif') }}" height="7" width="1"
                                     alt="">
                                <div class="pb-3"></div>
                                <b>Secure Services</b>
                                <div class="pb-3"></div>
                                <table>
                                    <tbody>
                                    <tr>
                                        <td colspan="5"></td>
                                    </tr>
                                    <tr class="align-top">
                                        <td style="width: 100px;">
                                            <a href="{{ config('openrsc.discord_url') }}" target="_blank">
                                                <img class="mx-auto"
                                                     src="{{ asset('img/mm_support.jpg') }}"
                                                     height="120" width="77" alt="">
                                            </a>
                                        </td>
                                        <td style="width: 120px;">
                                            <div style="left: 0; top: 0; position: relative;">
                                                <div style="left: 0; top: 0; position: absolute;">
                                                    <a href="{{ config('openrsc.discord_url') }}" target="_blank">
                                                        <img src="{{ asset('img/blank.gif') }}"
                                                             height="45" width="100"
                                                             alt="">
                                                    </a>
                                                </div>
                                            </div>
                                            <table style="height: 45px; width: 100px; padding: 2px; background-color: black;">
                                                <tbody>
                                                <tr>
                                                    <td class="b"
                                                        background="{{ asset('img/stoneback.gif') }}"
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
                                                <a href="{{ config('openrsc.discord_url') }}" target="_blank" class="c">
                                                    Click Here
                                                </a>
                                            </div>
                                        </td>
                                        <td style="width: 10px;"></td>
                                        <td style="width: 100px;">
                                            <a href="/board/ucp.php?i=pm&folder=inbox" class="c">
                                                <img class="mx-auto"
                                                     src="{{ asset('img/mm_inbox.jpg') }}"
                                                     height="120"
                                                     width="77" alt="">
                                            </a>
                                        </td>
                                        <td style="width: 120px;">
                                            <div style="left: 0; top: 0; position: relative;">
                                                <div style="left: 0; top: 0; position: absolute;">
                                                    <a href="/board/ucp.php?i=pm&folder=inbox"
                                                       class="c">
                                                        <img src="{{ asset('img/blank.gif') }}"
                                                             height="45" width="100"
                                                             alt="">
                                                    </a>
                                                </div>
                                            </div>
                                            <table style="height: 45px; width: 100px; padding: 2px; background-color: black;">
                                                <tbody>
                                                <tr>
                                                    <td class="b"
                                                        background="{{ asset('img/stoneback.gif') }}"
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
                                                <a href="/board/ucp.php?i=pm&folder=inbox" class="c">
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
                                            <a href="/board" class="c">
                                                <img class="mx-auto"
                                                     src="{{ asset('img/mms_forums.jpg') }}"
                                                     height="120" width="77" alt="">
                                            </a>
                                        </td>
                                        <td style="width: 120px;">
                                            <div style="left: 0; top: 0; position: relative;">
                                                <div style="left: 0; top: 0; position: absolute;">
                                                    <a href="/board" class="c">
                                                        <img src="{{ asset('img/blank.gif') }}"
                                                             height="45" width="100"
                                                             alt="">
                                                    </a>
                                                </div>
                                            </div>
                                            <table style="height: 45px; width: 100px; padding: 2px; background-color: black;">
                                                <tbody>
                                                <tr>
                                                    <td class="b"
                                                        background="{{ asset('img/stoneback.gif') }}"
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
                                                <a href="/board" class="c">
                                                    Click Here
                                                </a>
                                            </div>
                                        </td>
                                        <td style="width: 10px;"></td>
                                        <td style="width: 100px;">
                                            <a href="/login" class="c">
                                                <img class="mx-auto"
                                                     src="{{ asset('img/mms_accman.jpg') }}"
                                                     height="120" width="77" alt="">
                                            </a>
                                        </td>
                                        <td style="width: 120px;">
                                            <div style="left: 0; top: 0; position: relative;">
                                                <div style="left: 0; top: 0; position: absolute;">
                                                    <a href="/login" class="c">
                                                        <img src="{{ asset('img/blank.gif') }}"
                                                             height="45" width="100"
                                                             alt="">
                                                    </a>
                                                </div>
                                            </div>
                                            <table style="height: 45px; width: 100px; padding: 2px; background-color: black;">
                                                <tbody>
                                                <tr>
                                                    <td class="b"
                                                        background="{{ asset('img/stoneback.gif') }}"
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
                                                <a href="/login" class="c">
                                                    Click Here
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="pb-3"></div>
                        </td>
                        <td style="width: 7px;"
                            background="{{ asset('img/fm_middle.gif') }}"></td>
                    </tr>
                    </tbody>
                </table>
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
                <table class="homepage-content">
                    <tbody>
                    <tr>
                        <td>
                            <img src="{{ asset('img/fm_top.gif') }}" alt="">
                        </td>
                    </tr>
                    </tbody>
                </table>
                <table background="{{ asset('img/fm_middle.gif') }}" class="homepage-section-content">
                    <tbody>
                    <tr>
                        <td style="width: 7px;"
                            background="{{ asset('img/fm_middle.gif') }}"></td>
                        <td class="align-bottom">
                            <div style="text-align: center;">
                                <img src="{{ asset('img/blank.gif') }}" height="7" width="1"
                                     alt="">
                                <div class="pb-3"></div>
                                <b>Manual</b>
                                <div class="pb-3"></div>
                                <table>
                                    <tbody>
                                    <tr class="align-top">
                                        <td style="width: 100px;">
                                            <a href="https://rsc.wiki" target="_blank" class="c">
                                                <img class="mx-auto"
                                                     src="{{ asset('img/mm_howtoplay.jpg') }}"
                                                     height="120" width="77" alt="">
                                            </a>
                                        </td>
                                        <td style="width: 120px;">
                                            <div style="left: 0; top: 0; position: relative;">
                                                <div style="left: 0; top: 0; position: absolute;">
                                                    <a href="https://rsc.wiki" target="_blank" class="c">
                                                        <img src="{{ asset('img/blank.gif') }}"
                                                             height="45" width="100"
                                                             alt="">
                                                    </a>
                                                </div>
                                            </div>
                                            <table style="height: 45px; width: 100px; padding: 2px; background-color: black;">
                                                <tbody>
                                                <tr>
                                                    <td class="b"
                                                        background="{{ asset('img/stoneback.gif') }}"
                                                        style="background-color: #474747;">
                                                        <div class="text-center">
                                                            <b>How To Play</b>
                                                        </div>
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                            Everything you need to know to play
                                            OpenRSC
                                            <div class="d-block">
                                                <a href="https://rsc.vet/wiki" target="_blank" class="c">
                                                    Click Here
                                                </a>
                                            </div>
                                        </td>
                                        <td style="width: 10px;"></td>
                                        <td style="width: 100px;">
                                            <a href="{{ route('Frequently Asked Questions') }}">
                                                <img class="mx-auto"
                                                     src="{{ asset('img/mm_faq.jpg') }}"
                                                     height="120"
                                                     width="77" alt="">
                                            </a>
                                        </td>
                                        <td style="width: 120px;">
                                            <div style="left: 0; top: 0; position: relative;">
                                                <div style="left: 0; top: 0; position: absolute;">
                                                    <a href="{{ route('Frequently Asked Questions') }}">
                                                        <img src="{{ asset('img/blank.gif') }}"
                                                             height="45" width="100"
                                                             alt="">
                                                    </a>
                                                </div>
                                            </div>
                                            <table style="height: 45px; width: 100px; padding: 2px; background-color: black;">
                                                <tbody>
                                                <tr>
                                                    <td class="b"
                                                        background="{{ asset('img/stoneback.gif') }}"
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
                                                <a href="{{ route('Frequently Asked Questions') }}"
                                                   class="c">
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
                                            <a href="https://classic.runescape.wiki/w/Library_of_Varrock"
                                               target="_blank">
                                                <img class="mx-auto"
                                                     src="{{ asset('img/mm_lov.jpg') }}"
                                                     height="120"
                                                     width="77" alt="">
                                            </a>
                                        </td>
                                        <td style="width: 120px;">
                                            <div style="left: 0; top: 0; position: relative;">
                                                <div style="left: 0; top: 0; position: absolute;">
                                                    <a href="https://classic.runescape.wiki/w/Library_of_Varrock"
                                                       target="_blank">
                                                        <img src="{{ asset('img/blank.gif') }}"
                                                             height="45" width="100"
                                                             alt="">
                                                    </a>
                                                </div>
                                            </div>
                                            <table style="height: 45px; width: 100px; padding: 2px; background-color: black;">
                                                <tbody>
                                                <tr>
                                                    <td class="b"
                                                        background="{{ asset('img/stoneback.gif') }}"
                                                        style="background-color: #474747;">
                                                        <div class="text-center">
                                                            <b>Library of Varrock</b>
                                                        </div>
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                            Learn about the History of OpenRSC
                                            <div class="d-block">
                                                <a href="https://rsc.vet/wiki"
                                                   target="_blank" class="c">
                                                    Click Here
                                                </a>
                                            </div>
                                        </td>
                                        <td style="width: 10px;"></td>
                                        <td style="width: 100px;">
                                            <a href="{{ route('Rules and Security') }}">
                                                <img class="mx-auto"
                                                     src="{{ asset('img/mm_rules.jpg') }}"
                                                     height="120"
                                                     width="77" alt="">
                                            </a>
                                        </td>
                                        <td style="width: 120px;">
                                            <div style="left: 0; top: 0; position: relative;">
                                                <div style="left: 0; top: 0; position: absolute;">
                                                    <a href="{{ route('Rules and Security') }}">
                                                        <img src="{{ asset('img/blank.gif') }}"
                                                             height="45" width="100"
                                                             alt="">
                                                    </a>
                                                </div>
                                            </div>
                                            <table style="height: 45px; width: 100px; padding: 2px; background-color: black;">
                                                <tbody>
                                                <tr>
                                                    <td class="b"
                                                        background="{{ asset('img/stoneback.gif') }}"
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
                                                <a href="{{ route('Rules and Security') }}"
                                                   class="c">
                                                    Click Here
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="pb-3"></div>
                        </td>
                        <td style="width: 7px;"
                            background="{{ asset('img/fm_middle.gif') }}"></td>
                    </tr>
                    </tbody>
                </table>
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
