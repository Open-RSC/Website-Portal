@extends('template')
@section('content')

    <div>
        <?php
        // When changing the mapWidth, don't forget to update the body-world-map class in app.scss.
        const mapWidth = 2316;
        const mapHeight = 1590;
        ?>

        <img src="{{ asset('img/mapbg.png') }}" id="box" style="display: none;" alt="box"/>

        <div class="text-center" style="overflow: auto;">
            <script>
                if (document) {
                    document.addEventListener("DOMContentLoaded", function (event) {
                        const scrollposX = sessionStorage.getItem('scrollposX');
                        const scrollposY = sessionStorage.getItem('scrollposY');
                        if (scrollposX && scrollPosY) window.scrollTo(scrollposX, scrollposY);
                    });
                }

                function showPlayerPositions(context, box, charX, charY, username, charAdderX, charMultiplier, charAdderY,
                                             crosshairWidth, crosshairHeight) {
                    context.drawImage(box, <?= mapWidth ?> - ((charX + charAdderX + 5) * charMultiplier),
                        (charY + charAdderY - 2) * charMultiplier, crosshairWidth, crosshairHeight);
                    context.fillText(username,
                        <?= mapWidth ?> - ((charX + charAdderX) * charMultiplier),
                        (charY + charAdderY) * charMultiplier);

                    context.fillText("+",
                        <?= mapWidth ?> - ((charX + charAdderX + 4) * charMultiplier),
                        (charY + charAdderY) * charMultiplier);
                }

                // Automatically reload the page every 15 seconds
                function autoRefreshPage() {
                    sessionStorage.setItem('scrollposX', window.scrollX);
                    sessionStorage.setItem('scrollposY', window.scrollY);
                    location.reload();
                }

                setInterval('autoRefreshPage()', 15000);

                function drawPosition() {
                    const charAdderX = -2
                    const charAdderY = -380
                    const charMultiplier = 3
                    const boxWidth = 100
                    const boxHeight = 13

                    let canvas = document.getElementById('canvas');
                    let context = canvas.getContext('2d');
                    let box = document.getElementById("box");

                    // text overlay settings
                    context.font = '1.25em RSCBold';
                    context.textBaseline = 'middle';
                    context.fillStyle = "red";

                    // mouse cursor movement triggered
                    canvas.addEventListener('mousemove', function (e) {

                        // clear when mouse moves and redraw
                        context.clearRect(0, 0, canvas.width, canvas.height);

                        // show player positions after each redraw
                        @foreach ($playerPositions as $char)
                        // cross-hair image
                        showPlayerPositions(context, box, {{$char->x}}, {{$char->y}}, '{{ucfirst($char->username)}}',
                            charAdderX, charMultiplier, charAdderY);

                        // player name
                        showPlayerPositions(context, box, {{$char->x}}, {{$char->y}}, '{{ucfirst($char->username)}}',
                            charAdderX, charMultiplier, charAdderY, boxWidth, boxHeight);
                        @endforeach
                    });

                    // draw player positions initially when the page loads
                    window.onload = function () {
                        @foreach ($playerPositions as $char)
                        // cross-hair image
                        showPlayerPositions(context, box, {{$char->x}}, {{$char->y}}, '{{ucfirst($char->username)}}',
                            charAdderX, charMultiplier, charAdderY);

                        // player name
                        showPlayerPositions(context, box, {{$char->x}}, {{$char->y}}, '{{ucfirst($char->username)}}',
                            charAdderX, charMultiplier, charAdderY, boxWidth, boxHeight);
                        @endforeach
                    };
                }
            </script>

            <canvas style="background-image: url({{ asset($mapImagePath) }}" id="canvas"
                    width="<?= mapWidth ?>" height="<?= mapHeight ?>">
            </canvas>
            <script>drawPosition();</script>
        </div>
    </div>

@endsection
