<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('includes.header')

@if(Route::currentRouteName() == 'World_Map')
    <table style="width: 250px; background: black; padding: 4px;">
        <tbody>
        <tr>
            <td class="e">
                <div class="text-center">
                    @if(Route::currentRouteName())
                        <b>{{ preg_replace("/[^A-Za-z0-9 ]/", " ", Route::currentRouteName()) }}</b>
                    @else
                        {{ ucfirst($subpage) }}
                    @endif
                    <br>
                    <a href="{{ route('Home') }}">Main menu</a>
                </div>
            </td>
        </tr>
        </tbody>
    </table>
    <div class="pt-2"></div>
    @yield('content')
    {{ $slot }}

@elseif(Route::currentRouteName() == 'Wilderness_Map')
    <table style="width: 250px; background: black; padding: 4px;">
        <tbody>
        <tr>
            <td class="e">
                <div class="text-center">
                    @if(Route::currentRouteName())
                        <b>{{ preg_replace("/[^A-Za-z0-9 ]/", " ", Route::currentRouteName()) }}</b>
                    @else
                        {{ ucfirst($subpage) }}
                    @endif
                    <br>
                    <a href="{{ route('Home') }}">Main menu</a>
                </div>
            </td>
        </tr>
        </tbody>
    </table>
    <div class="pt-2"></div>
    @yield('content')
    {{ $slot }}

@elseif(Route::currentRouteName() == 'Secure_Login')
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
                                    @else
                                        {{ ucfirst($subpage) }}
                                    @endif
                                    <br>
                                    <a href="{{ route('Home') }}">Main menu</a>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                    <div class="pt-3"></div>
                @endif
                @yield('content')
                {{ $slot }}
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
                    <a href="{{ route('Terms_and_Conditions') }}">Terms+Conditions</a>
                    +
                    <a href="{{ route('Privacy_Policy') }}">Privacy policy</a>
                </div>
                <div class="bottom-middle-border"></div>
            </div>
            <div class="bottom-right-border"></div>
        </section>
    </main>

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
                                    @else
                                        {{ ucfirst($subpage) }}
                                    @endif
                                    <br>
                                    <a href="{{ route('Home') }}">Main menu</a>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                    <div class="pt-3"></div>
                @endif
                @yield('content')
                {{ $slot }}
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
                    <a href="{{ route('Terms_and_Conditions') }}">Terms+Conditions</a>
                    +
                    <a href="{{ route('Privacy_Policy') }}">Privacy policy</a>
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