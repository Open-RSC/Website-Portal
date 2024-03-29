@extends('template')

@section('content')
    <div class="col container">
        <h2 class="h2 text-center text-gray-400 pt-5 pb-4 text-capitalize display-3">
            RSC Preservation Login
        </h2>

        <div class="row justify-content-center">
            <div class="col-lg-6 text-gray-400 pr-5 pl-5 pt-3 pb-3 bg-black">
                    @if (session('status'))
                        <div>
                            {{ session('status') }}
                        </div>
                    @endif
                
                    @if ($errors->any())
                        <div>
                            <div>{{ __('Something went wrong.') }}</div>
                            <ul style="list-style:initial">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        
                        <div>
                            <label>{{ __('Username') }}</label>
                            <input class="form-control mb-1" type="text" name="username" value="{{ old('username') }}" required autofocus />
                        </div>
                
                        <div>
                            <label>{{ __('Password') }}</label>
                            <input class="form-control mb-1" type="password" name="password" required autocomplete="current-password" />
                        </div>
                
                        <div>
                            <!-- <label>{-- __('Remember me') --}</label> -->
                            <!-- We don't have remember_token in players table -->
                            <!-- <input class="mt-1" type="checkbox" name="remember"> -->
                        </div>
                
                        <div>
                            <button class="btn btn-success mt-1" type="submit">
                               {{ __('Login') }}
                            </button>
                        </div>
                    </form>
            </div>
        </div>
    </div>
@endsection
