@extends('template')

@section('content')
    <div class="col container">
        <h2 class="h2 text-center text-gray-400 pt-5 pb-4 text-capitalize display-3">
            Server Item Stats for {{ $item->name ?? "" }} on {{ $db }}
        </h2>
        <div class="row justify-content-center">
            <div class="col-lg-12 col-md-12 col-sm-12 text-gray-400 pr-lg-5 pl-lg-5 pt-3 pb-3 bg-black text-center">
                <div>
                    <table id="itemStats" class="table-responsive" style="width:100%"></table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            var db = @json($db ?? "preservation");
            let dataTable = $('#itemStats').DataTable({
                ajax: {
                    url: '{{ route('itemStatsData', ['itemID' => $itemID, 'db' => $db])  }}',
                },
                order: [[3, 'desc']],
                processing: true,
                serverSide: true,
                columns: [
                    {
                        title: "Username",
                        data: 'username',
                        render: function(data, type, row) {
                            return `<a href="/staff/${db}/player/${row.playerID}/detail">${data}</a>`;
                        }
                    },
                    {
                        title: "Bank Count",
                        data: 'bank_count',
                        searchable: false,
                        render: function(data, type, row) {
                            const formattedData = Number(data).toLocaleString();
                            return `<a href="/staff/player/${db}/${row.username}/bank">${formattedData}</a>`;
                        }
                    },
                    {
                        title: "Inventory Count",
                        data: 'inv_count',
                        searchable: false,
                        render: function(data, type, row) {
                            const formattedData = Number(data).toLocaleString();
                            return `<a href="/staff/player/${db}/${row.username}/inventory">${formattedData}</a>`;
                        }
                    },
                    {
                        title: "Total Count",
                        data: 'total_count',
                        searchable: false,
                        render: function(data, type, row) {
                            return Number(data).toLocaleString();
                        }
                    },
                ],
            });
        });
    </script>
@endsection
