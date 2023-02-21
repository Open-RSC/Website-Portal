@extends('template')

@section('content')
    <div class="col container">
        <h2 class="h2 text-center text-gray-400 pt-5 pb-4 text-capitalize display-3">
            Shop logs for {{ $db }}
        </h2>
        <div class="row justify-content-center">
            <div class="col-lg-12 text-gray-400 pr-5 pl-5 pt-3 pb-3 bg-black">
            
                <div>
                    <table id="logs" width="100%"></table>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
            $('#logs').DataTable({
                ajax: {
                    url: '{{ route('ShopLogsData', $db)  }}',
                },
                order: [[4, 'desc']],
                processing: true,
                serverSide: true,
                columns: [
                    {title: "Player 1", data: 'player1'},
                    {title: "Player 1 Items", data: 'player1_items'},
                    {title: "Player 2", data: 'player2'},
                    {title: "Player 2 Items", data: 'player2_items'},
                    {title: "Date", data: 'time'},
                ]
            });
        });
    </script>
@endsection