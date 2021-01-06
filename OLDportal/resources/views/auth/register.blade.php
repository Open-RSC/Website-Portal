@extends('template')

@section('content')
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-8">
				<div class="card bg-transparent border-info">
					<div class="card-header text-center h5">{{ __('User Registration') }}</div>

					<div class="card-body">
						<form method="POST" action="{{ route('register') }}">
							@csrf

							<div class="form-group row small">
								<label for="name"
									   class="col-md-4 col-form-label text-md-right">{{ __('Username') }}</label>

								<div class="col-md-6">
									<input id="name" type="text"
										   class="small bg-dark border-info text-white-50 form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
										   name="name" value="{{ old('name') }}" required autofocus>

									@if ($errors->has('name'))
										<span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
									@endif
								</div>
							</div>

							<div class="form-group row small">
								<label for="email"
									   class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

								<div class="col-md-6">
									<input id="email" type="email"
										   class="small bg-dark border-info text-white-50 form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
										   name="email" value="{{ old('email') }}" required>

									@if ($errors->has('email'))
										<span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
									@endif
								</div>
							</div>

							<div class="form-group row small">
								<label for="password"
									   class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

								<div class="col-md-6">
									<input id="password" type="password"
										   class="small bg-dark border-info text-white-50 form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
										   name="password" required>

									@if ($errors->has('password'))
										<span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
									@endif
								</div>
							</div>

							<div class="form-group row small">
								<label for="password-confirm"
									   class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

								<div class="col-md-6">
									<input id="password-confirm" type="password"
										   class="small bg-dark border-info text-white-50 form-control"
										   name="password_confirmation" required>
								</div>
							</div>

							<div class="form-group row mb-0">
								<div class="col-md-6 offset-md-4">
									<button type="submit"
											class="btn-sm w-75 text-center btn-dark btn-outline-info outline-dark">
										{{ __('Register') }}
									</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
