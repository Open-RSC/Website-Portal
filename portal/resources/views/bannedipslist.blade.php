@extends('template')

@section('content')
    <div class="col container">
        <h2 class="h2 text-center text-gray-400 pt-5 pb-4 text-capitalize display-3">
            IP Ban Management
        </h2>
        <div class="row justify-content-center">
            <div class="col-lg-8 text-gray-400 pr-5 pl-5 pt-3 pb-3">

                 <!-- Display Success Message -->
                @if(session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                @endif

                <!-- Display Error Message -->
                @if(session('error'))
                    <div class="alert alert-danger" role="alert">
                        {{ session('error') }}
                    </div>
                @endif

                <!-- Form to Add an IP Ban -->
                <form action="{{ route('BanIp') }}" method="POST">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="ip_address" placeholder="Enter IP to ban" required>
                        <button class="btn btn-danger" type="submit">Ban IP</button>
                    </div>
                </form>

                <!-- Form to Remove an IP Ban -->
                <form action="{{ route('UnbanIp') }}" method="POST">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="ip_address" placeholder="Enter IP to unban" required>
                        <button class="btn btn-success" type="submit">Unban IP</button>
                    </div>
                </form>

                <!-- Table to Display Banned IPs -->
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">IP Address</th>
                                <th scope="col">Banned On</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($bannedIps as $bannedIp)
                                <tr>
                                    <th scope="row">{{ $bannedIp->id }}</th>
                                    <td>{{ $bannedIp->ip_address }}</td>
                                    <td>{{ $bannedIp->created_at->toFormattedDateString() }}</td>
                                    <td>
                                        <form action="{{ route('UnbanIp') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="ip_address" value="{{ $bannedIp->ip_address }}">
                                            <button class="btn btn-sm btn-success" type="submit">Unban</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Pagination Links -->
                <div class="d-flex justify-content-center">
                    {!! $bannedIps->links() !!}
                </div>

            </div>
        </div>
    </div>
@endsection
