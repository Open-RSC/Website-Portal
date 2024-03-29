@extends('template')

@section('content')
    <div class="col container">
        <h2 class="h2 text-center text-gray-400 pt-5 pb-4 text-capitalize display-3">
            Players for {{ $db }}
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
                    url: '{{ route('PlayerListData', $db)  }}',
                },
                order: [[2, 'desc']],
                processing: true,
                serverSide: true,
                columns: [
                    {title: "Username", data: 'username'},
                    {title: "Former Username", data: 'former_name'},
                    {title: "Creation Date", data: 'creation_date'},
                    {title: "Login Date", data: 'login_date'},
                    @if(Gate::allows('admin', Auth::user())) {title: "Login IP", data: 'login_ip'}, @endif
                    @if(Gate::allows('admin', Auth::user())) {title: "Creation IP", data: 'creation_ip'}, @endif
                    {title: "Banned", data: 'banned'},
                    {title: "Muted", data: 'muted'},
                    {title: "View", searchable: false, orderable: false, data: function(data, type, row){
                        return "<a href='/staff/{{$db}}/player/" + data.id + "/detail'><i class='fa fa-eye'></i></a>";    
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
                {
                    column_number: @if(Gate::allows('admin', Auth::user())) 6 @else 4 @endif,
                    filter_type: "text"
                }, 
                {
                    column_number: @if(Gate::allows('admin', Auth::user())) 7 @else 5 @endif,
                    filter_type: "text"
                }, 
            ]);
        });
    </script>
@endsection