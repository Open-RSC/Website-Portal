@extends('template')
@section('content')

    <div>
        <img src="{{ asset('img/mapbg.png') }}" id="box" style="display: none;" alt="box"/>

        <div class="text-center" style="overflow: auto;">
            <script>
                // On page reload, snap back to same viewport
                if (document) {
                    document.addEventListener("DOMContentLoaded", function (event) {
                        const scrollposX = sessionStorage.getItem('scrollposX');
                        const scrollposY = sessionStorage.getItem('scrollposY');
                        if (scrollposX && scrollposY) window.scrollTo(scrollposX, scrollposY);
                    });
                }

                // Automatically reload the page every 15 seconds to refresh data
                function autoRefreshPage() {
                    sessionStorage.setItem('scrollposX', window.scrollX);
                    sessionStorage.setItem('scrollposY', window.scrollY);
                    location.reload();
                }

                setInterval('autoRefreshPage()', 15000);

                function showPlayerPositions(context, box, charX, charY, username, charAdderX, charAdderY) {
                    const boxOffsetX = 5;
                    const boxOffsetY = -2;
                    const boxWidth = 100;
                    const boxHeight = 13;
                    const crosshairOffsetX = 4;
                    const charMultiplier = 3;
                    
                    if (username.length > 0) {
                        // draw box around player name
                        context.drawImage(box, {{$mapWidth}} - ((charX + charAdderX + boxOffsetX) * charMultiplier),
                            (charY + charAdderY + boxOffsetY) * charMultiplier, boxWidth, boxHeight);
    
                        // draw player name
                        context.fillText(username, {{$mapWidth}} - ((charX + charAdderX) * charMultiplier),
                            (charY + charAdderY) * charMultiplier);
                        
                        // draw crosshairs
                        context.fillText("+", {{$mapWidth}} - ((charX + charAdderX + crosshairOffsetX) * charMultiplier),
                            (charY + charAdderY) * charMultiplier);
                    
                    } else {
                        // draw smiley
                        context.fillText("🙂", {{$mapWidth}} - ((charX + charAdderX + crosshairOffsetX) * charMultiplier),
                            (charY + charAdderY) * charMultiplier);
                    }

                    
                }

                function drawPosition() {
                    let canvas = document.getElementById('canvas');
                    let context = canvas.getContext('2d');
                    let box = document.getElementById("box");
                    let usernamesHidden = @json($usernamesHidden);
                    // text overlay settings
                    context.font = usernamesHidden ? '2.0em RSCBold' : '1.25em RSCBold';
                    context.textBaseline = 'middle';
                    context.fillStyle = "#fcce48";

                    function drawPlayers() {
                        @foreach ($playerPositions as $char)
                        showPlayerPositions(context, box, {{$char->x}}, {{$char->y}}, '{{ucfirst($char->username)}}',
                            {{$xOffset}}, {{$yOffset}});
                        @endforeach
                    }

                    // mouse cursor movement triggered
                    canvas.addEventListener('mousemove', function (e) {
                        // clear when mouse moves and redraw
                        context.clearRect(0, 0, canvas.width, canvas.height);
                        drawPlayers();
                    });

                    // draw player positions initially when the page loads
                    window.onload = function () {
                        drawPlayers();
                    };
                }
            </script>

            <canvas style="background-image: url({{ asset($mapImagePath) }}" id="canvas"
                    width="{{$mapWidth}}" height="{{$mapHeight}}">
            </canvas>
            <script>drawPosition();</script>
        </div>
    </div>

@endsection
