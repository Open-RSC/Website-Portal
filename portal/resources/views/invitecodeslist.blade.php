@extends('template')

@section('content')
<div class="col container">
    <h2 class="h2 text-center text-gray-400 pt-5 pb-4 text-capitalize display-3">
        Invite Codes
    </h2>
    <div class="row justify-content-center">
        <div class="col-lg-12 text-gray-400 pr-5 pl-5 pt-3 pb-3 bg-black">
            <div>
                <table id="table" width="100%"></table>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        var dataTable = $('#table').DataTable({
            ajax: '{{ route('InviteCodesData') }}',
            serverSide: true,
            processing: true,
            order: [[2, 'desc']],
            columns: [
                {title: 'Invite Codes', data: 'code', name: 'code'},
                {title: 'Used', data: 'used', name: 'used', width: "20%", render: function(data) {
                    return data === 1 ? 'Yes' : 'No';
                }},
                {title: 'Created At', data: 'created_at', name: 'created_at'}
            ],
            initComplete: function(settings, json) {
                if (this.api().data().count()) {
                    yadcf.init(dataTable, [
                        {column_number: 1, filter_type: 'select', data: [
                        {value: '0', label: 'No'},
                        {value: '1', label: 'Yes'},
                    ], filter_default_label: 'All'}
                    ]);
                }
            }
        });
    });
</script>
@endsection
