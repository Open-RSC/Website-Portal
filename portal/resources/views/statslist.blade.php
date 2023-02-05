@extends('template')

@section('content')
    <div class="col container">
        <h2 class="h2 text-center text-gray-400 pt-5 pb-4 text-capitalize display-3">
            Statistics for {{ $db }}
        </h2>
        <div class="row justify-content-center">
            <div class="col-lg-6 text-gray-400 pr-5 pl-5 pt-3 pb-3 bg-black">
                <a href="{{ route('StatisticsOverview', $db) }}">Return to overview</a>
            </div>
        </div>  
        <div class="row justify-content-center">
            <div class="col-lg-12 text-gray-400 pr-5 pl-5 pt-3 pb-3 bg-black">
                
                <div>
                    <table id="stats" width="100%"></table>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
            $('#stats').DataTable({
                ajax: {
                    url: '{{ route('StatisticsData', $db)  }}',
                },
                order: [[6, 'desc']],
                processing: true,
                serverSide: true,
                columns: [
                    {title: "Gold", data: 'sumgold', render: function(data, type, row) {
                        var intData = data / 1000;
                        return (intData/1000).toFixed(0) + 'M'
                    }},
                    {title: "Crackers", data: 'cracker'},
                    {title: "Red Hat", data: 'redphat'},
                    {title: "Santa", data: 'santahat'},
                    {title: "Dragon Sword", data: 'dlong'},
                    {title: "Dragon Med", data: 'dmed'},
                    {title: "Date", data: 'created_at'},
                    {title: "View", searchable: false, orderable: false, data: function(data, type, row){
                        return "<a href='/stats/" + data.id + "/detail'><i class='fa fa-eye'></i></a>";    
                    }},
                ]
            });
        });
    </script>
@endsection