@extends('template')

@section('content')
    <div class="col container">
        <h2 class="h2 text-center text-gray-400 pt-5 pb-4 text-capitalize display-3">
            Player Export
        </h2>
        <div class="row justify-content-center">
            <div class="col-lg-12 text-gray-400 pr-5 pl-5 pt-3 pb-3 bg-black">
                <div>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <div>{{ __('Something went wrong.') }}</div>
                            <ul style="list-style:initial">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @if($success)
                        <div class="alert alert-success">
                            <div>Success</div>
                            <ul style="list-style:initial">
                                {{ $success }}
                            </ul>
                        </div>
                    @endif
                    @if($data)
                        <div class="alert alert-info">
                            <div>Data</div>
                            {{ $data }}
                        </div>
                    @endif       
                    <form method="POST" action="{{ route('PlayerExportSubmit') }}">
                        @csrf
                        <div>
                            <label>{{ __('Game') }}</label>
                            <select class="form-control mb-1" name="db" id="db" required>
                                <option value="preservation">RSC Preservation</option>
                                <option value="cabbage">RSC Cabbage</option>
                                <option value="uranium">RSC Uranium</option>
                                <option value="coleslaw">RSC Coleslaw</option>
                                <option value="openpk">OpenPK</option>
                                <option value="2001scape">2001scape</option>
                            </select>
                        </div>
                        <div>
                            <label>{{ __('Username') }}</label>
                            <input class="form-control mb-1" type="text" name="username" value="{{ old('username') }}" autofocus />
                        </div>
                
                        <div>
                            <label>{{ __('Password') }}</label>
                            <input class="form-control mb-1" type="password" name="password" autocomplete="current-password" />
                        </div>
                        
                        <div>
                            <button class="btn btn-success mt-1" type="submit">
                               {{ __('Submit') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <p class="text-center"><a href="/playerexportinstructions">Click here for full instructions</a></p>
    </div>
@endsection
@section('scripts')
    <script>
    </script>
@endsection