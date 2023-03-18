@extends('template')
@section('content')

    @if ($retro)
        <img src="/img/banners/ad.png" alt="">
    @elseif ($members != 'members')
        <img src="/img/banners/ad.png" alt="">
        <img src="/img/banners/hbar.gif" alt="">
    @else
        <div class="mt-5"></div>
        <div class="mb-3"></div>
        <img src="/img/banners/hbar.gif" alt="">
    @endif

    @if ($retro)
        <iframe src="https://rsc.vet/client2/#{{ $members }},game.openrsc.com,{{ $port }},65537,7112866275597968156550007489163685737528267584779959617759901583041864787078477876689003422509099353805015177703670715380710894892460637136582066351659813,true"
                height="363px" width="513px"></iframe>
    @else
        <iframe src="https://rsc.vet/client/#{{ $members }},game.openrsc.com,{{ $port }},65537,7112866275597968156550007489163685737528267584779959617759901583041864787078477876689003422509099353805015177703670715380710894892460637136582066351659813,true"
                height="352px" width="513px"></iframe>
    @endif

    @if ($members != 'members')
        <div class="d-flex">
            <div>
                <a href="https://classic.runescape.wiki/w/Banner" target="_blank">
                    <img src="col-1" id="banner" alt="">
                </a>
            </div>
            <div>
                <a href="https://classic.runescape.wiki/w/Banner#RealArcade_Banner" target="_blank">
                    <img src="/img/banners/realbanner.gif" alt="">
                </a>
            </div>
        </div>

        <script>
            const banner = document.getElementById("banner");

            function randomBanner() {
                banner.src = `/img/banners/${Math.floor(Math.random() * 10) + 1}.gif`;
            }

            setInterval(() => {
                randomBanner();
            }, 5 * 60 * 1000);

            randomBanner();
        </script>
    @endif
@endsection