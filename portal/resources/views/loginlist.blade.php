@extends('template')

@section('content')
    <div class="col container">
        <h2 class="h2 text-center text-gray-400 pt-5 pb-4 text-capitalize display-3">
            Logins for {{ $db }}
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
                    url: '{{ route('LoginListData', $db)  }}',
                },
                order: [[3, 'desc']],
                processing: true,
                serverSide: true,
                columns: [
                    {title: "Player", data: 'username'},
                    {title: "Former Name", data: 'former_name'},
                    {title: "IP Address", data: 'ip'},
                    {title: "Date", data: 'time'},
                    {title: "View", searchable: false, orderable: false, data: function(data, type, row){
                        return "<a href='/staff/{{$db}}/player/" + data.playerID + "/detail'><i class='fa fa-eye'></i></a>";    
                    }},
                ]
            });
            yadcf.init(dataTable, [
                {
                    column_number: 0,
                    filter_type: "text"
                }, 
                {
                    column_number: 1,
                    filter_type: "text"
                }, 
            ]);
        });
    </script>
@endsection