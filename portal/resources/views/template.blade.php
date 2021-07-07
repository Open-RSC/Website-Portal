<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('includes.header')
<body>

<div class="navbar-expand-xxl pt-2 mr-1">
    <div class="e text-center flex-row" style="background: black; width:596px;">
        <span class="flex-auto p-2">
            <a class="c" href="/" taborder="1">Home</a>
        </span>
        <span class="flex-auto p-2">
            <a class="c" href="/download" taborder="1">Play Now</a>
        </span>
        <span class="flex-auto p-2">
            <a class="c" href="{{ route('RuneScape Hiscores') }}" taborder="1">Hiscores</a>
        </span>
        <span class="flex-auto p-2">
            <a class="c" href="/board" taborder="1">Forums</a>
        </span>
        <span class="flex-auto p-2">
            <a class="c" target="_blank" rel="noopener" href="https://discord.gg/ABdFCqn" taborder="2">Discord</a>
        </span>
        <span class="flex-auto p-2">
            <a class="c" target="_blank" rel="noopener" href="https://gitlab.com/open-runescape-classic"
               taborder="3">Open Source</a>
        </span>
        <span class="flex-auto p-2 dropdown"><a href="#" rel="noopener" taborder="5">Wiki Lookup</a>
            <span class="p-2 dropdown-content" style="background: black;">
                <a class="c" target="_blank" rel="noopener" href="https://classic.runescape.wiki" taborder="5">
                    RSC Wiki
                </a>
                <a class="c" target="_blank" rel="noopener" href="/wiki" taborder="5">
                    Open Wiki
                </a>
            </span>
        </span>
        <span class="flex-auto p-2">
            <a class="c" target="_blank" rel="noopener" href="https://rsc.plus" taborder="6">
                RSC+
            </a>
        </span>
    </div>
</div>

@if(Route::currentRouteName() == 'World_Map')
    <table style="width: 250px; background: black; padding: 4px;">
        <tbody>
        <tr>
            <td class=e>
                <div class="text-center">
                    @if(Route::currentRouteName())
                        <b>{{ preg_replace("/[^A-Za-z0-9 ]/", " ", Route::currentRouteName()) }}</b>
                    @else
                        {{ ucfirst($subpage) }}
                    @endif
                    <span class="d-block">
                        <a class="c" href="{{ route('Home') }}">Main menu</a>
                    </span>
                </div>
            </td>
        </tr>
        </tbody>
    </table>
    <div class="pt-2"></div>
    @yield('content')

@elseif(Route::currentRouteName() == 'Wilderness_Map')
    <table style="width: 250px; background: black; padding: 4px;">
        <tbody>
        <tr>
            <td class=e>
                <div class="text-center">
                    @if(Route::currentRouteName())
                        <b>{{ preg_replace("/[^A-Za-z0-9 ]/", " ", Route::currentRouteName()) }}</b>
                    @else
                        {{ ucfirst($subpage) }}
                    @endif
                    <span class="d-block">
                        <a class="c" href="{{ route('Home') }}">Main menu</a>
                    </span>
                </div>
            </td>
        </tr>
        </tbody>
    </table>
    <div class="pt-2"></div>
    @yield('content')

@else
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
                    <table style="width: 250px; background: black; padding: 4px;">
                        <tbody>
                        <tr>
                            <td class=e>
                                <div class="text-center">
                                    @if(Route::currentRouteName())
                                        <b>{{ preg_replace("/[^A-Za-z0-9 ]/", " ", Route::currentRouteName()) }}</b>
                                    @elseif(in_array($subpage, array('skill_total', 'attack', 'defense', 'strength', 'hits', 'ranged', 'prayer', 'magic', 'cooking', 'fletching', 'fishing', 'firemaking', 'crafting', 'smithing', 'mining', 'agility', 'thieving')))
                                        <b>RuneScape Hiscores</b>
                                    @else
                                        <b>{{ ucfirst($subpage) }}</b>
                                    @endif
                                    <div class="d-block">
                                        <a class="c" href="{{ route('Home') }}">Main menu</a>
                                    </div>
                                    @if(Config::get('app.authentic'))
                                        @if(in_array($subpage ?? '', array('attack', 'defense', 'strength', 'hits', 'ranged', 'prayer', 'magic', 'cooking', 'fletching', 'fishing', 'firemaking', 'crafting', 'smithing', 'mining', 'agility', 'thieving')) || route('RuneScape Hiscores'))
                                            <div class="d-block">
                                                @if($subpage ?? '' == 'skill_total')
                                                    <a class="c" href="{{ route('RuneScape Hiscores') }}">All</a> |
                                                    <a class="c" href="/hiscores/{{ $subpage ?? '' }}/1">Ironman</a> |
                                                    <a class="c" href="/hiscores/{{ $subpage ?? '' }}/2">Hardcore</a> |
                                                    <a class="c" href="/hiscores/{{ $subpage ?? '' }}/3">Ultimate</a>
                                                @else
                                                    <a class="c" href="{{ route('RuneScape Hiscores') }}">All</a> |
                                                    <a class="c" href="{{ route('RuneScape Hiscores') }}/1">Ironman</a> |
                                                    <a class="c" href="{{ route('RuneScape Hiscores') }}/2">Hardcore</a> |
                                                    <a class="c" href="{{ route('RuneScape Hiscores') }}/3">Ultimate</a>
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
                <div class="pt-2"></div>
            </div>
            <div class="mid-right-border"></div>
        </section>
        <section class="bottom-border">
            <div class="bottom-left-border"></div>
            <div class="bottom-middle">
                <div class="copyright pt-2">
                    Open RuneScape Classic is not affiliated with RuneScape Classic nor JaGeX.<br>
                    To use our service you must agree to our
                    <a class="c" href="{{ route('Terms_and_Conditions') }}">Terms+Conditions</a>
                    +
                    <a class="c" href="{{ route('Privacy_Policy') }}">Privacy policy</a>
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
