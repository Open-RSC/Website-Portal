@extends('template')
@section('content')

    <div class="text-gray-400 pr-5 pl-5 pt-3 pb-3 bg-black">
        {!! $topListContents !!}
    </div>
    <a class="c" class="col-3" href="/hiscores/{{ $db }}">
        Click here for modern hiscores
    </a>
@endsection