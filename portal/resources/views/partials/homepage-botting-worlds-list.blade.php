<table class="homepage-content homepage-online-worlds-table homepage-botting-worlds-list">
    <tbody>
    <tr>
        <td colspan="2">
            <p class="homepage-world-location">
                <img align="left" src="{{ asset('img/usflag.gif') }}" width="30" height="15" border="0">
                <span class="m-1">Raleigh</span>
            </p>
            <p class="homepage-world-type">Botting worlds</p>
        </td>
    </tr>
    @foreach($worlds as $world)
        @if(!$world["dev"] && $world["type"] == "cyborgs")
            <tr>
                <td valign="center">
                    <a href="/playnow" class="homepage-world-link">
                        {{$world["name"]}}
                    </a>
                </td>
                <td align="right">
                        <span class="dropdown">
                            <a class="text-white"
                               href="/worldmap/{{$world['alias']}}">{{$world["online"]}} {{$world["type"]}} (+)</a>
                            <span class="dropdown-content nav-hiscores-dropdown" style="border: 1px solid grey; padding-right: 5px;">
                                {{$world["last48"]}} in the last 48h
                            </span>
                        </span>
                </td>
            </tr>
        @endif
    @endforeach
    <tr>
        <td valign="center">&nbsp;</td>
    </tr>
    </tbody>
</table>