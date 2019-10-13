@extends('template')

@section('content')
	<div class="text-info">
		<div class="container">
			<h2 class="h2 text-center pt-5 pb-4 text-capitalize display-3">
				{{ __('Staff Login') }}
			</h2>

			<div class="table-transparent pt-5 pb-5">
				<form method="POST" action="{{ route('login') }}">
					@csrf

					<div class="form-group row">
						<label for="email" class="col-sm-4 col-form-label text-md-right">
							{{ __('E-mail') }}
						</label>

						<div class="col-sm-4">
							<input id="email" type="email"
								   class="small bg-dark border-info text-primary form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
								   name="email" value="{{ old('email') }}" required autofocus>

							@if ($errors->has('email'))
								<span class="invalid-feedback" role="alert">
                                        <strong>
											{{ $errors->first('email') }}
										</strong>
                                    </span>
							@endif
						</div>
					</div>

					<div class="form-group row">
						<label for="password" class="col-md-4 col-form-label text-md-right">
							{{ __('Password') }}
						</label>

						<div class="col-sm-4">
							<input id="password" type="password"
								   class="bg-dark border-info text-primary form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
								   name="password" required>

							@if ($errors->has('password'))
								<span class="invalid-feedback" role="alert">
                                        <strong>
											{{ $errors->first('password') }}
										</strong>
                                    </span>
							@endif
						</div>
					</div>

					<div class="form-group row small">
						<div class="col-md-6 offset-md-4">
							<div class="form-check bg">
								<input class="form-check-input" type="checkbox" name="remember" checked
									   id="remember" {{ old('remember') ? 'checked' : '' }}>

								<label class="form-check-label" for="remember">
									{{ __('Remember Me') }}
								</label>
							</div>
						</div>
					</div>

					<div class="form-group row mb-0">
						<div class="col-md-8 offset-md-4">
							<button type="submit"
									class="btn-sm w-25 text-center btn-dark btn-outline-info outline-dark">
								{{ __('Login') }}
							</button>
							@if (Route::has('password.request'))
								<a class="pl-3 text-info small" href="{{ route('password.request') }}">
									{{ __('Forgot Your Password?') }}
								</a>
							@endif
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
@endsection
