@extends('template')

@section('content')
    <div class="col container">
        <h2 class="h2 text-center text-gray-400 pt-5 pb-4 text-capitalize display-3">
            Web Server Information
        </h2>
        <div class="row justify-content-center">
            <div class="col-lg-12 text-gray-400 pr-5 pl-5 pt-3 pb-3">
                <table class="table table-bordered text-gray-400">
                    <tbody>
                    @foreach($info as $key => $value)
                        <tr>
                            <th>{{ $key }}</th>
                            <td>{{ $value }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <a href="{{ route('AdminTasks') }}" class="btn-primary">Back to Admin Tasks</a>
            </div>
        </div>
    </div>
@endsection
