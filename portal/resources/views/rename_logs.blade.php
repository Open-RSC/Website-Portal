@extends('template')

@section('content')
    <div class="col container">
        <h2 class="h2 text-center text-gray-400 pt-5 pb-4 text-capitalize display-3">
            Rename logs for {{ $db }}
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
                    url: '{{ route('RenameLogsData', $db)  }}',
                },
                order: [[5, 'desc']],
                processing: true,
                serverSide: true,
                columns: [
                    {title: "Former Name", data: 'formerName'},
                    {title: "Current Name", data: 'currentName'},
                    {title: "Changed By", data: 'whoChanged'},
                    {title: "Change Type", data: 'changeType', render: function(data, type, row) {
                        let changeTypes = ["Voluntary", "Inappropriate", "Capitalization", "Released", "Invalid", "Remove Former Name"];
                        return changeTypes[data];
                    }}, 
                    {title: "Reason", data: 'reason'},
                    {title: "Date", data: 'time'},
                ]
            });
        });
    </script>
@endsection