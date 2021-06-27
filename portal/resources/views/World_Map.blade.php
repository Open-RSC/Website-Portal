@extends('template')
@section('content')

    <div class="col">
        <!-- loads the crosshairs image to be referenced by javascript -->
        <img src="{{ asset('img/crosshairs.svg') }}" id="crosshairs" style="display: none;" alt="crosshairs"/>

        <div class="text-center" style="overflow: auto;">
            <script>
                // automatically reload the page every 10 seconds
                function autoRefreshPage() {
                    window.location = window.location.href;
                }

                setInterval('autoRefreshPage()', 10000);

                function drawPosition() {
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
                        context.drawImage(img, 2152 - (({{$char->x}} -45) * 3), ({{$char->y}} -437) * 3, 38, 38);
                        context.fillText('{{ucfirst($char->username)}}', 2152 - (({{$char->x}} -45) * 3), ({{$char->y}} -437) * 3);
                        @endforeach
                    });

                    // draw player positions initially when the page loads
                    window.onload = function () {
                        @foreach ($playerPositions as $char)
                        context.drawImage(img, 2152 - (({{$char->x}} -45) * 3), ({{$char->y}} -437) * 3, 30, 30);
                        context.fillText('{{ucfirst($char->username)}}', 2152 - (({{$char->x}} -45) * 3), ({{$char->y}} -437) * 3);
                        @endforeach
                    };
                }
            </script>

            <canvas style="background-image: url({{ asset('img/worldmap.png') }}" id="canvas" width="2152"
                    height="1007">
                <script>drawPosition();</script>
            </canvas>
        </div>
    </div>
@endsection
