@extends('template')
@section('content')
    <?php
        // When changing the mapWidth, don't forget to update the body-world-map class in app.scss.
        const mapWidth = 2316;
        const mapHeight = 1590;
    ?>
    <div class="col">
        <!-- loads the crosshairs image to be referenced by javascript -->
        <img src="{{ asset('img/crosshairs.svg') }}" id="crosshairs" style="display: none;" alt="crosshairs"/>

        <div class="text-center" style="overflow: auto;">
            <script>
                function showPlayerPositions(context, img, charX, charY, username, charAdderX, charMultiplier, charAdderY,
                    crosshairWidth, crosshairHeight) {
                    context.drawImage(img, <?= mapWidth ?> - ((charX + charAdderX) * charMultiplier), 
                        (charY + charAdderY) * charMultiplier, crosshairWidth, crosshairHeight);
                    context.fillText(username, 
                        <?= mapWidth ?> - ((charX + charAdderX) * charMultiplier), 
                        (charY + charAdderY) * charMultiplier);
                }

                //automatically reload the page every 10 seconds
                function autoRefreshPage() {
                    if (document && document.location) {
                        document.location.reload(true)
                    } else if (window && window.location) {
                        window.location.reload(true)
                    }
                }
                
                setInterval('autoRefreshPage()', 10000);

                function drawPosition() {
                    const charAdderX = 6
                    const charAdderY = -388
                    const charMultiplier = 3
                    const crosshairWidth = 38
                    const crosshairHeight = 38

                    let canvas = document.getElementById('canvas');
                    let context = canvas.getContext('2d');
                    let img = document.getElementById("crosshairs");

                    // text overlay settings
                    context.font = '12px Arial';
                    context.textBaseline = 'middle';
                    context.fillStyle = "gold";

                    // mouse cursor movement triggered
                    canvas.addEventListener('mousemove', function (e) {

                        // clear when mouse moves and redraw
                        context.clearRect(0, 0, canvas.width, canvas.height);

                        // shows RSC coordinate overlay
                        context.beginPath();
                        context.arc(e.layerX, e.layerY, 3, 0, 2 * Math.PI, false);
                        context.closePath();
                        context.fill();
                        let realX = Math.round((-e.offsetX / 3 + 767));
                        let realY = Math.round(e.layerY / 3 + 433);
                        let text = '(' + realX + ', ' + realY + ')';
                        context.fillText(text, e.layerX + 5, e.layerY);

                        // show player positions after each redraw
                        @foreach ($playerPositions as $char)
                            showPlayerPositions(context, img, {{$char->x}}, {{$char->y}}, '{{ucfirst($char->username)}}',
                                charAdderX, charMultiplier, charAdderY, crosshairWidth, crosshairHeight);
                        @endforeach
                    });

                    // draw player positions initially when the page loads
                    window.onload = function () {
                        @foreach ($playerPositions as $char)
                            showPlayerPositions(context, img, {{$char->x}}, {{$char->y}}, '{{ucfirst($char->username)}}',
                                charAdderX, charMultiplier, charAdderY, crosshairWidth, crosshairHeight);
                        @endforeach
                    };
                }
            </script>

            <canvas style="background-image: url({{ asset('img/RscVet-FullWorldMap.png') }}" id="canvas" 
                width="<?= mapWidth ?>" height="<?= mapHeight ?>">
                <script>drawPosition();</script>
            </canvas>
        </div>
    </div>
@endsection
