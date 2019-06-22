@extends('layouts.app')

@section('content')

	<div>{{ __('Login') }}</div>

	<form method="POST"
	      action="{{ route('login', false) }}"
	>@csrf
		<label for="email">{{ __('E-Mail Address') }}</label>
		<div>
			<input id="email"
			       type="email"
			       class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
			       name="email"
			       value="{{ old('email') }}"
			       required
			       autofocus
			>
		</div>
		@if ($errors->has('email'))
			<span class="invalid-feedback"
			      role="alert"
			>
      <strong>
	      {{ $errors->first('email') }}
      </strong>
			</span>
		@endif

		<div>
			<label for="password"
			>{{ __('Password') }}</label>

			<div>
				<input id="password"
				       type="password"
				       name="password"
				       required
				>

				@if ($errors->has('password'))
					<span role="alert">
						<strong>
							{{ $errors->first('password') }}
						</strong>
					</span>
				@endif
			</div>
		</div>

		<input type="checkbox"
		       name="remember"
		       id="remember" {{ old('remember') ? 'checked' : '' }}>

		<label for="remember">
			{{ __('Remember Me') }}
		</label>

		<button type="submit">
			{{ __('Login') }}
		</button>

		@if (Route::has('password.request'))
			<a href="{{ route('password.request', false) }}">
				{{ __('Forgot Your Password?') }}
			</a>
		@endif
	</form>
@endsection
