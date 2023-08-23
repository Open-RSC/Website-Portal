@extends('template')

@section('content')
    <div class="col container">
        <h2 class="h2 text-center text-gray-400 pt-5 pb-4 text-capitalize display-3">
            Error Logs
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
            let dataTable = $('#logs').DataTable({
                ajax: {
                    url: '{{ route('ErrorLogsData')  }}',
                },
                order: [[4, 'desc']],
                processing: true,
                serverSide: true,
                columns: [
                    {title: "Message", data: 'message', render: function(data, type, row) {
                        return `<a href="{{ url('/staff/error_logs/') }}/${row.id}">${data}</a>`;
                    }},
                    {title: "Level", data: 'level'},
                    {title: "File", data: 'file'},
                    {title: "Line", data: 'line'},
                    {title: "Created At", data: 'created_at'},
                ]
            });
        });
    </script>
@endsection