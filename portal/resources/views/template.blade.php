<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('includes.header')
<body class="<?= Route::currentRouteName() == 'World Map' ? "body-world-map" : "" ?>">

@if(Route::currentRouteName() == 'World Map')
    <table class="breadcrumb-bar">
        <tbody>
        <tr>
            <td class=e>
                <div class="text-center">
                    @if(Route::currentRouteName())
                        <b>{{ preg_replace("/[^A-Za-z0-9 ]/", " ", Route::currentRouteName()) }}</b>
                    @else
                        {{ ucfirst($subpage ?? '') }}
                    @endif
                    <span class="d-block">
                        <a class="c" href="/">Main menu</a>
                    </span>
                </div>
            </td>
        </tr>
        </tbody>
    </table>
    <div class="pt-2"></div>
    @yield('content')

@elseif(Route::currentRouteName() == 'Wilderness Map')
    <table class="breadcrumb-bar">
        <tbody>
        <tr>
            <td class=e>
                <div class="text-center">
                    @if(Route::currentRouteName())
                        <b>{{ preg_replace("/[^A-Za-z0-9 ]/", " ", Route::currentRouteName()) }}</b>
                    @else
                        {{ ucfirst($subpage ?? '') }}
                    @endif
                    <span class="d-block">
                        <a class="c" href="/">Main menu</a>
                    </span>
                </div>
            </td>
        </tr>
        </tbody>
    </table>
    <div class="pt-2"></div>
    @yield('content')

@elseif(Route::currentRouteName() == 'Play RuneScape')
    <main>
        <script language="JavaScript">  function ConfirmMenu() {       var response=window.confirm("Clicking this link will exit the game and take you to the main menu.\nPlease log out of the game before exiting.\nClick OK if you have safely logged out.");       if (response) window.history.back();/*parent.document.location.href='frame2.cgi?page=title.html';*/       return false;  }  function ConfirmTerms() {       var response=window.confirm("Clicking this link will exit the game and take you to our Terms+Conditions.\nPlease log out of the game before exiting.\nClick OK if you have safely logged out.");       if (response) parent.document.location.href="{{ route('Terms and Conditions') }}";/*'frame2.cgi?page=terms/terms.html';*/       return false;  }  function ConfirmPrivacy() {       var response=window.confirm("Clicking this link will exit the game and take you to our Privacy Policy.\nPlease log out of the game before exiting.\nClick OK if you have safely logged out.");       if (response) parent.document.location.href="{{ route('Privacy Policy') }}";/*'frame2.cgi?page=privacy/privacy.html';*/       return false;  }  </script>
        <div class="pt-1"></div>
        <section class="top-border orsc-webclient-mobile-border">
            <div class="top-left-border"></div>
            <form name=back>
                <div class="top-middle-border2" onmousedown="return ConfirmMenu();">
                </div>
            </form>
            <div class="top-right-border"></div>
        </section>
        <section class="middle">
            <div class="mid-left-border"></div>
            <div class="middle-content">
                @yield('content')
            </div>
            <div class="mid-right-border"></div>
        </section>
        <section class="bottom-border">
            <div class="bottom-left-border"></div>
            <div class="bottom-middle">
                <div class="copyright pt-2">
                    Open RuneScape Classic is not affiliated with RuneScape Classic nor JaGeX.<br>
                    To use our service you must agree to our
                    <a class="c" href="{{ route('Terms and Conditions') }}" onmousedown="return ConfirmTerms();">Terms+Conditions</a>
                    +
                    <a class="c" href="{{ route('Privacy Policy') }}" onmousedown="return ConfirmPrivacy();">Privacy policy</a>
                </div>
                <div class="bottom-middle-border"></div>
            </div>
            <div class="bottom-right-border"></div>
        </section>
    </main>

@else
    @include('includes.nav')
    <main>
        <section class="top-border">
            <div class="top-left-border"></div>
            <div class="top-middle-border"></div>
            <div class="top-right-border"></div>
        </section>

        <section class="middle">
            <div class="mid-left-border"></div>
            <div class="middle-content">
                @if(Route::currentRouteName() != 'Home')
                    <table class="breadcrumb-bar">
                        <tbody>
                        <tr>
                            <td class=e>
                                <div class="text-center">
                                    @if(str_contains(url()->current(), '/player'))
                                        <b>RuneScape Hiscores</b>
                                    @elseif(Route::currentRouteName())
                                        <b>{{ preg_replace("/[^A-Za-z0-9 ]/", " ", Route::currentRouteName()) }}</b>
                                    @elseif(in_array($subpage ?? '', array('skill_total', 'attack', 'defense', 'strength', 'hits', 'ranged', 'prayer', 'magic', 'cooking', 'fletching', 'fishing', 'firemaking', 'crafting', 'smithing', 'mining', 'agility', 'thieving', 'runecraft', 'harvesting')))
                                        <b>RuneScape Hiscores</b>
                                    @else
                                        <b>{{ ucfirst($subpage ?? '') }}</b>
                                    @endif
                                    <div class="d-block">
                                        @if(str_contains(url()->current(), '/player'))
                                            <a class="c" href="/">
                                                Main menu
                                            </a> -
                                            <a class="c" href="/hiscores/{{ $db ?? 'preservation' }}">
                                                All Hiscores
                                            </a>
                                        @else
                                            <a class="c" href="/">Main menu</a>
                                        @endif
                                    </div>
                                    @if(str_contains(url()->current(), '/hiscores/cabbage') || str_contains(url()->current(), '/hiscores/coleslaw'))
                                        @if(in_array($subpage ?? '' ?? '', array('skill_total', 'attack', 'defense', 'strength', 'hits', 'ranged', 'prayer', 'magic', 'cooking', 'fletching', 'fishing', 'firemaking', 'crafting', 'smithing', 'mining', 'agility', 'thieving', 'runecraft', 'harvesting')) || route('RuneScape Hiscores',$db))
                                            <div class="d-block">
                                                @if($subpage ?? '' ?? '' == 'skill_total')
                                                    <a class="c" href="/hiscores/{{ $db ?? 'preservation' }}">All</a> |
                                                    <a class="c"
                                                       href="/hiscores/{{ $db ?? 'preservation' }}/{{ $subpage ?? '' ?? '' }}/1">Ironman</a>
                                                    |
                                                    <a class="c"
                                                       href="/hiscores/{{ $db ?? 'preservation' }}/{{ $subpage ?? '' ?? '' }}/2">Ultimate</a>
                                                    |
                                                    <a class="c"
                                                       href="/hiscores/{{ $db ?? 'preservation' }}/{{ $subpage ?? '' ?? '' }}/3">Hardcore</a>
                                                @else
                                                    <a class="c" href="/hiscores/{{ $db ?? 'preservation' }}">All</a> |
                                                    <a class="c"
                                                       href="/hiscores/{{ $db ?? 'preservation' }}/skill_total/1">Ironman</a>
                                                    |
                                                    <a class="c"
                                                       href="/hiscores/{{ $db ?? 'preservation' }}/skill_total/2">Hardcore</a>
                                                    |
                                                    <a class="c"
                                                       href="/hiscores/{{ $db ?? 'preservation' }}/skill_total/3">Ultimate</a>
                                                @endif
                                            </div>
                                        @endif
                                    @endif
                                </div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                    <div class="pt-3"></div>
                @endif
                @yield('content')
            </div>
            <div class="pt-2"></div>
            <div class="mid-right-border"></div>
        </section>
        <section class="bottom-border">
            <div class="bottom-left-border"></div>
            <div class="bottom-middle">
                <div class="copyright pt-2">
                    Open RuneScape Classic is not affiliated with RuneScape Classic nor JaGeX.<br>
                    To use our service you must agree to our
                    <a class="c" href="{{ route('Terms and Conditions') }}">Terms+Conditions</a>
                    +
                    <a class="c" href="{{ route('Privacy Policy') }}">Privacy policy</a>
                </div>
                <div class="bottom-middle-border"></div>
            </div>
            <div class="bottom-right-border"></div>
        </section>
    </main>
@endif

@include('includes.footerscripts')
</body>
</html>
