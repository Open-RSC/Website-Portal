@extends('template')

@section('content')
    <div class="container">
        <h2>Error Log Detail</h2>
        <p><a href="{{ route('ErrorLogsList') }}">Return to list</a></p>
        <p><strong>Created At:</strong> {{ $errorLog->created_at }}</p>
        <p><strong>Updated At:</strong> {{ $errorLog->updated_at }}</p>
        <p><strong>Message:</strong> {{ $errorLog->message }}</p>
        <p><strong>Level:</strong> {{ $errorLog->level }}</p>
        <p><strong>File:</strong> {{ $errorLog->file }}</p>
        <p><strong>Line:</strong> {{ $errorLog->line }}</p>
        <p><strong>Context:</strong></p>
        @if(\App\Helpers\is_json($errorLog->context)) 
          <ul>
            @foreach(json_decode($errorLog->context, true) as $contextItem)
              <li>
                <strong>File:</strong> {{ $contextItem['file'] ?? 'N/A' }}<br>
                <strong>Line:</strong> {{ $contextItem['line'] ?? 'N/A' }}<br>
                <strong>Function:</strong> {{ $contextItem['function'] ?? 'N/A' }}<br>
                <strong>Class:</strong> {{ $contextItem['class'] ?? 'N/A' }}<br>
                <strong>Type:</strong> {{ $contextItem['type'] ?? 'N/A' }}<br>
              </li>
            @endforeach
          </ul>
        @else
          <p>{{ $errorLog->context }}</p>
        @endif
    </div>
@endsection