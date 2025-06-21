@extends('template')

@section('content')
<div class="col container">
    <h2 class="h2 text-center text-gray-400 pt-5 pb-4 text-capitalize display-3 fs-3">
        Reset Your Password
    </h2>

    <div class="row justify-content-center">
        <div class="col-lg-6 text-gray-400 pr-5 pl-5 pt-3 pb-3 bg-black">
            @if (session('status'))
                <div class="mb-3">
                    {!! nl2br(e(session('status'))) !!}
                </div>
            @endif

            @if ($errors->any())
                <div>
                    <div>{{ __('Something went wrong.') }}</div>
                    <ul style="list-style: initial">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('password.reset.submit') }}">
                @csrf

                <input type="hidden" name="token" value="{{ $token }}">

                <div>
                    <label>{{ __('New Password') }}</label>
                    <input class="form-control mb-1" type="password" name="password" required minlength="4" maxlength="20" onpaste="return false;" ondrop="return false;" autocomplete="off" />
                </div>

                <div>
                    <label>{{ __('Confirm Password') }}</label>
                    <input class="form-control mb-1" type="password" name="password_confirmation" required minlength="4" maxlength="20" onpaste="return false;" ondrop="return false;" autocomplete="off" />
                </div>

                <div>
                    <button class="btn btn-success mt-2" type="submit">
                        {{ __('Reset Password') }}
                    </button>
                </div>

                <div class="d-block text-center mt-3">
                    <p>Know your password? <a href="{{ route('login') }}">Click here to login</a></p>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
