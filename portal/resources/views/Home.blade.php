@extends('template')
@section('content')

    <!-- Archive banner -->
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
                        src="{{ asset('img/the-archive.png') }}" alt="The Archive"/>
            </th>
            <td style="text-align:left; font-size:9pt; padding:0 4px 0 4px; height:45px; line-height:1.25em; color:#685746; vertical-align: middle;">
                <div align="center">Contribute to
                    <a href="/thearchive" style="color:red">The Archive</a> with any
                    lost data prior to 2010 and <span style="color:#0000CC">receive any
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
                            <table id="List" class="homepage-news-table">
                                @foreach ($news_feed as $news)
                                    <tr>
                                        <td class="homepage-news-subject">
                                            <!-- News subject -->
                                            <a class="c"
                                               href="/board/viewtopic.php?f={{ $news->forum_id }}&p={{ $news->post_id }}">
                                                @php
                                                    echo Str::limit(strip_tags($news->post_subject), 37);
                                                @endphp
                                            </a>
                                        </td>
                                        <td class="homepage-news-date">
                                            <span class="text-white">
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
                            <div class="pb-3"></div>
                            <div class="homepage-promo-tiles">
                                @include('partials.homepage-promo-tile', [
                                    'url' => 'https://rsc.vet/wiki',
                                    'title' => 'Why Choose OpenRSC?',
                                    'desc' => 'See why our game is right for you!',
                                    'external' => true,
                                ])
                                @include('partials.homepage-promo-tile', [
                                    'url' => 'https://rsc.wiki/w/Pay-to-play',
                                    'title' => 'OpenRSC Members',
                                    'desc' => 'Everyone plays entirely for free!',
                                    'external' => true,
                                ])
                                @include('partials.homepage-promo-tile', [
                                    'url' => '/hiscores/preservation',
                                    'title' => 'Hiscore Tables',
                                    'desc' => 'Is your character in the top 250,000?',
                                ])
                                @include('partials.homepage-promo-tile', [
                                    'url' => 'https://2009scape.org',
                                    'title' => 'Play New Beta',
                                    'desc' => 'Try the new version of the game!',
                                    'external' => true,
                                ])
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
                            <div class="pb-3"></div>
                            <b class="d-block text-center">Secure Services</b>
                            <div class="pb-3"></div>
                            <div class="homepage-promo-tiles">
                                @include('partials.homepage-promo-tile', [
                                    'url' => config('openrsc.discord_url'),
                                    'title' => 'Customer Support',
                                    'desc' => 'Questions? Contact our staff',
                                    'external' => true,
                                ])
                                @include('partials.homepage-promo-tile', [
                                    'url' => '/message-centre',
                                    'title' => 'Message Centre',
                                    'desc' => 'Your messages from our staff',
                                ])
                                @include('partials.homepage-promo-tile', [
                                    'url' => '/board',
                                    'title' => 'Forums',
                                    'desc' => 'Discuss the game with fellow players!',
                                ])
                                @include('partials.homepage-promo-tile', [
                                    'url' => '/message-centre',
                                    'title' => 'Account Management',
                                    'desc' => 'Manage your Game Account',
                                ])
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
                            <div class="pb-3"></div>
                            <b class="d-block text-center">Manual</b>
                            <div class="pb-3"></div>
                            <div class="homepage-promo-tiles">
                                @include('partials.homepage-promo-tile', [
                                    'url' => 'https://rsc.vet/wiki',
                                    'title' => 'How To Play',
                                    'desc' => 'Everything you need to know to play OpenRSC',
                                    'external' => true,
                                ])
                                @include('partials.homepage-promo-tile', [
                                    'url' => route('Frequently Asked Questions'),
                                    'title' => 'F.A.Q.',
                                    'desc' => 'Answers to Frequently Asked Questions',
                                ])
                                @include('partials.homepage-promo-tile', [
                                    'url' => 'https://rsc.wiki/w/Library_of_Varrock',
                                    'title' => 'Library',
                                    'desc' => 'Learn about the History of the game',
                                    'external' => true,
                                ])
                                @include('partials.homepage-promo-tile', [
                                    'url' => route('Rules and Security'),
                                    'title' => 'Rules & Security',
                                    'desc' => 'Learn our rules and stay safe online',
                                ])
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
