@extends('template')

@section('content')
<div class="col container">
    <h2 class="h2 text-center text-gray-400 pt-5 pb-4 text-capitalize display-3 fs-3">
        Request Password Reset
    </h2>

    <div class="row justify-content-center">
        <div class="col-lg-6 text-gray-400 pr-5 pl-5 pt-3 pb-3 bg-black">
            @if (session('status'))
                <div class="mb-3">
                    {{ session('status') }}
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

            <form method="POST" action="{{ route('password.email.request') }}">
                @csrf

                @if(config('openrsc.multi_world_logins'))
                    <label>{{ __('Game') }}</label>
                    <select class="form-control mb-1 dropdown-arrow" name="db" required>
                        <option value="preservation">RSC Preservation</option>
                        <option value="cabbage">RSC Cabbage</option>
                        <option value="uranium">RSC Uranium</option>
                        <option value="coleslaw">RSC Coleslaw</option>
                        <!-- <option value="2001scape">2001scape</option> --> <!-- TODO: confirm password rules for 2001scape? Maybe it's fine.-->
                    </select>
                @else
                    <input type="hidden" name="db" value="preservation" />
                @endif

                <div>
                    <label>{{ __('Username') }}</label>
                    <input class="form-control mb-1" type="text" name="username" value="{{ old('username') }}" required autofocus />
                </div>

                <div>
                    <label>{{ __('Email') }}</label>
                    <input class="form-control mb-1" type="text" name="email" value="{{ old('email') }}" required autofocus />
                </div>

                <div>
                    <button class="btn btn-success mt-2" type="submit">
                        {{ __('Send Reset Link') }}
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
