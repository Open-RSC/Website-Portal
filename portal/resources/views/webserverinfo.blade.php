@extends('template')

@section('content')
<div class="container">
    <h2 class="text-center text-gray-400 pt-5 pb-4 display-3">
        Webserver Information
    </h2>

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

    <div class="text-center mt-4">
        <a href="{{ route('AdminTasks') }}" class="btn btn-secondary">Back to Admin Tasks</a>
    </div>
</div>
