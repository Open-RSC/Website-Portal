@extends('template')

@section('content')
    <div class="col container">
        <h2 class="h2 text-center text-gray-400 pt-2 pb-2 text-capitalize display-3 fs-3">
            Open RSC Registration
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
                <div class="mb-3 text-center">
                    <a href="{{ route('Rules and Security') }}" class="text-green text-underline"
                       rel="noopener noreferrer nofollow" target="_blank">
                        Please click here to read the rules before registering an account.
                    </a>
                </div>
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div>
                        <label>{{ __('Game') }}</label>
                        <select class="form-control mb-1 dropdown-arrow" name="db" id="db" required>
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
                        <input class="form-control mb-1" type="text" name="username" value="{{ old('username') }}"
                               required autofocus/>
                    </div>

                    <div>
                        <label>{{ __('Email') }}</label>
                        <input class="form-control mb-1" type="text" name="email" value="{{ old('email') }}" required
                               autofocus/>
                    </div>

                    <div>
                        <label>{{ __('Password') }}</label>
                        <input class="form-control mb-1" type="password" name="password" required
                               autocomplete="current-password"/>
                    </div>

                    <div>
                        <label>{{ __('Confirm Password') }}</label>
                        <input class="form-control mb-1" type="password" name="password_confirmation" required
                               autocomplete="new-password"/>
                    </div>

                    <div>
                        <!-- <label>{-- __('Remember me') --}</label> -->
                        <!-- We don't have remember_token in players table -->
                        <!-- <input class="mt-1" type="checkbox" name="remember"> -->
                    </div>

                    <div class="form-check mb-2 mt-3">
                        <input class="form-check-input" type="checkbox" name="agree_to_rules" id="agree_to_rules"
                               {{ old('agree_to_rules') ? 'checked' : '' }} required onclick="handleCheckboxClick(event)">
                        <label class="form-check-label" for="agree_to_rules">
                            I have read and agree to the <a href="{{ route('Rules and Security') }}"
                                                            rel="noopener noreferrer nofollow" target="_blank">rules</a>.
                        </label>
                    </div>

                    <div>
                        <button class="btn btn-success mt-1" type="submit">
                            {{ __('Register') }}
                        </button>
                    </div>
                </form>
                <div class="modal fade modal-dark" id="alertModal" tabindex="-1" aria-labelledby="alertModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="alertModalLabel">Alert</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Please ensure you have read the rules before agreeing.
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-success" data-bs-dismiss="modal">OK
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script>
     function handleCheckboxClick(event) {
        //Check if the user has not visited the rules page
        if (!localStorage.getItem('visitedRules')) {
            event.preventDefault(); //Prevent the checkbox from being checked
            $("#alertModal").modal("show");
        }
    }
</script>
<style>
    .modal-dark .modal-content {
        background-color: #333; /* Dark background color */
        color: #fff; /* Light text color */
    }

    .modal-dark .btn-close {
        filter: invert(1); /* Adjust close button color for better visibility */
    }
</style>

@endsection
