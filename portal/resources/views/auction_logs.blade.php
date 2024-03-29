@extends('template')

@section('content')
    <div class="col container">
        <h2 class="h2 text-center text-gray-400 pt-5 pb-4 text-capitalize display-3">
            Auction logs for {{ $db }}
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
                    url: '{{ route('AuctionLogsData', $db)  }}',
                },
                order: [[6, 'desc']],
                processing: true,
                serverSide: true,
                columns: [
                    {title: "Item ID", data: 'itemID'},
                    {title: "Amount", data: 'amount'},
                    {title: "Amount Left", data: 'amount_left'},
                    {title: "Price", data: 'price'},
                    {title: "Seller Username", data: 'seller_username'},
                    {title: "Buyer Info", data: 'buyer_info'},
                    {title: "Date", data: 'time'},
                ]
            });
        });
    </script>
@endsection