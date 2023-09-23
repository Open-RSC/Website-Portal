@extends('template')

@section('content')
    <h2>Custom Throttling Entries</h2>
    @if(session('success'))
        <div class="alert alert-success fade mb-4 show col-8 d-flex align-items-center" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close ml-4" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <!-- Create New Entry Button -->
    <div style="align-self: flex-start" class="mb-3">
        <a href="{{ route('ThrottlingCreate') }}" class="btn btn-success text-white text-decoration-none">Create New Entry</a>
    </div>
    <table class="table table-bordered table-dark">
        <thead>
            <tr>
                <th>Route Name</th>
                <th>Max Attempts</th>
                <th>Decay Minutes</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($throttlingEntries as $entry)
                <tr>
                    <td>{{ $entry->route_name }}</td>
                    <td>{{ $entry->max_attempts }}</td>
                    <td>{{ $entry->decay_minutes }}</td>
                    <td>
                        <a href="{{ route('ThrottlingEdit', $entry->id) }}" class="btn btn-sm btn-success text-white text-decoration-none">Edit</a>
                        <form method="POST" action="{{ route('ThrottlingDestroy', $entry->id) }}" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger" type="submit">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $throttlingEntries->links() }} <!-- Pagination Links -->
@endsection
