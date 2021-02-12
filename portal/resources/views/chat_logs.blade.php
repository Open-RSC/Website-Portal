@extends('template')

@section('content')

    @unless (Auth::check())
        You are not signed in.
    @endunless

    Protected zone
@endsection
