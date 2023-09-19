@extends('template')

@section('content')
    <div class="col container">
        <h2 class="h2 text-center text-gray-400 pt-5 pb-4 text-capitalize display-3">
            Server Item Stats for {{ $item->name ?? "" }} on {{ $db }}
        </h2>
        <div class="row justify-content-center">
            <div class="col-lg-12 text-gray-400 pr-5 pl-5 pt-3 pb-3 bg-black">
                <div>
                    <table id="itemStats" width="100%"></table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            let dataTable = $('#itemStats').DataTable({
                ajax: {
                    url: '{{ route('itemStatsData', ['itemID' => $itemID, 'db' => $db])  }}',
                },
                order: [[3, 'desc']],
                processing: true,
                serverSide: true,
                columns: [
                    {title: "Username", data: 'username'},
                    {title: "Bank Count", data: 'bank_count', 'searchable': false},
                    {title: "Inventory Count", data: 'inv_count', 'searchable': false},
                    {title: "Total Count", data: 'total_count', 'searchable': false},
                ]
            });
        });
    </script>
@endsection
