@extends('template')

@section('content')
    <div class="col container">
        <h2 class="h2 text-center text-gray-400 pt-5 pb-4 text-capitalize display-3">
            Statistics for {{ $db }}
        </h2>
        <div class="row justify-content-center">
            <div class="col-lg-6 text-gray-400 pr-5 pl-5 pt-3 pb-3 bg-black">
                <a href="{{ route('ItemStatisticsOverview', $db) }}">Return to overview</a>
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
            var db = @json($db ?? "preservation");
            $('#stats').DataTable({
                ajax: {
                    url: '{{ route('ItemStatisticsData', $db)  }}',
                },
                order: [[6, 'desc']],
                processing: true,
                serverSide: true,
                columns: [
                    {
                        title: "Gold",
                        data: 'sumgold',
                        render: function(data, type, row) {
                            var intData = data / 1000;
                            return `<a href="/staff/items/${db}/10">${(intData/1000).toFixed(0) + 'M'}</a>`;
                        }
                    },
                    {title: "Crackers", data: 'cracker', render: function(data, type, row) {
                        return `<a href="/staff/items/${db}/575">${data}</a>`;
                    }},
                    {title: "Red Hat", data: 'redphat', render: function(data, type, row) {
                        return `<a href="/staff/items/${db}/576">${data}</a>`;
                    }},
                    {title: "Santa", data: 'santahat', render: function(data, type, row) {
                        return `<a href="/staff/items/${db}/971">${data}</a>`;
                    }},
                    {title: "Dragon Sword", data: 'dlong', render: function(data, type, row) {
                        return `<a href="/staff/items/${db}/593">${data}</a>`;
                    }},
                    {title: "Dragon Med", data: 'dmed', render: function(data, type, row) {
                        return `<a href="/staff/items/${db}/795">${data}</a>`;
                    }},
                    {title: "Date", data: 'created_at'},
                    {title: "View", searchable: false, orderable: false, data: function(data, type, row){
                        return "<a href='/staff/itemstats/" + data.id + "/detail'><i class='fa fa-eye'></i></a>";
                    }},
                ]
            });
        });
    </script>
@endsection
