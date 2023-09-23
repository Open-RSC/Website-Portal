@extends('template')

@section('content')
    <div class="col container">
        <h2 class="h2 text-center text-gray-400 pt-5 pb-4 text-capitalize display-3">
            Edit Throttling Entry
        </h2>
        <a style="align-self: flex-start" class="c mb-3" href="{{ route("ThrottlingList") }}">
            Back to Throttling List
        </a>
        <div class="row justify-content-center">
            <div class="col-lg-12 text-gray-400 pr-5 pl-5 pt-3 pb-3 bg-black">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul style="list-style:initial">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('ThrottlingUpdate', $entry->id) }}">
                    @csrf
                    @method('PUT')

                    <div>
                        <label>Route Name</label>
                        <input class="form-control mb-1" type="text" name="route_name" value="{{ $entry->route_name }}" required />
                    </div>
                    <div>
                        <label>Max Attempts</label>
                        <input class="form-control mb-1" type="number" name="max_attempts" value="{{ $entry->max_attempts }}" min="1" required />
                    </div>
                    <div>
                        <label>Decay Minutes</label>
                        <input class="form-control mb-1" type="number" name="decay_minutes" value="{{ $entry->decay_minutes }}" min="1" required />
                    </div>

                    <div>
                        <button class="btn btn-success mt-1" type="submit">
                           Update Entry
                        </button>
                        <form method="POST" action="{{ route('ThrottlingDestroy', $entry->id) }}">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger mt-1" type="submit">
                                Delete Entry
                            </button>
                        </form>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
