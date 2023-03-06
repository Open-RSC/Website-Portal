@extends('template')

@section('content')
    <div class="col container">
        <h2 class="h2 text-center text-gray-400 pt-5 pb-4 text-capitalize display-3">
            Staff logs for {{ $db }}
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
                    url: '{{ route('StaffLogsData', $db)  }}',
                },
                order: [[4, 'desc']],
                processing: true,
                serverSide: true,
                columns: [
                    {title: "Staff Username", data: 'staff_username'},
                    {title: "Affected Player", data: 'affected_player'},
                    {title: "Action", data: 'action', render: function(data, type, row){
                        let actionTypes = ["Mute", "Unmuted", "Summon", "Goto", "Take", "Put", "kick", "update", "stopevent", "setevent", "blink", "tban", "putfatigue 100%", "say", "invisible", "teleport", "send", "town", "check", "unban", "ban (permanent)", "globaldrop", "wipeitems"];
                        return actionTypes[data];
                    }},
                    {title: "Extra Info", data: 'extra'},
                    {title: "Date", data: 'time'},
                ]
            });
        });
    </script>
@endsection