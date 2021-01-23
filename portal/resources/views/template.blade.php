<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('includes.header')

<body>

@if(Route::currentRouteName() == 'World_Map')
    <table width=250 bgcolor=black cellpadding=4>
        <tr>
            <td class=e>
                <center>
                    <b>{{ preg_replace("/[^A-Za-z0-9 ]/", " ", Route::currentRouteName()) }}</b>
                    <br>
                    <a href="{{ route('Home') }}">Main menu</a>
                </center>
            </td>
        </tr>
        </tbody>
    </table>
    <div class="pt-2"></div>
    @yield('content')

@elseif(Route::currentRouteName() == 'Wilderness_Map')
    <table width=250 bgcolor=black cellpadding=4>
        <tr>
            <td class=e>
                <center>
                    <b>{{ preg_replace("/[^A-Za-z0-9 ]/", " ", Route::currentRouteName()) }}</b>
                    <br>
                    <a href="{{ route('Home') }}">Main menu</a>
                </center>
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
                    <table width=250 bgcolor=black cellpadding=4>
                        <tr>
                            <td class=e>
                                <center>
                                    <b>{{ preg_replace("/[^A-Za-z0-9 ]/", " ", Route::currentRouteName()) }}</b>
                                    <br>
                                    <a href="{{ route('Home') }}">Main menu</a>
                                </center>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                @endif
                @yield('content')
            </div>
            <div class="mid-right-border"></div>
        </section>

        <section class="bottom-border">
            <div class="bottom-left-border"></div>
            <div class="bottom-middle">
                <div class="copyright">
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
