@extends('layouts.app')
@isset( $image)
@section('background-image')
	@include('layouts._body-image',['imagepath'=>'login5.jpg'])
@endsection
@endisset
@section('main')
	<div class="flex items-center justify-center flex-wrap h-screen fixed top-0 w-full">
		<div class="flex items-center justify-center bg-white p-16 flex-col shadow-2xl border border-gray-200 fixed">

			<div class="mb-4">{{ __('auth.Login') }}</div>

			<form method="POST"
			      action="{{ route('login', false) }}"
			>@csrf
				<div class="mb-6 text-center">
					<div class="relative w-full mb-1">
						<input id="email"
						       type="email"
						       class="h-8 lg:h-auto transition bg-white shadow-md focus:outline-none border border-gray-200 placeholder-gray-700 rounded py-1 lg:py-2 pr-4 pl-10 block w-full appearance-none leading-normal"
						       name="email"
						       value="{{ old('email') }}"
						       placeholder="janedoe@example.com"
						       required
						       autofocus
						>
						<div class="pointer-events-none absolute inset-y-0 left-0 pl-2.5 flex items-center">
							{{ svg_image('lineicons/user', 'fill-current pointer-events-none text-gray-600 h-6') }}
						</div>
					</div>

					@if ($errors->has('email'))
						<span class="invalid-feedback"
						      role="alert"
						><strong>{{ $errors->first('email') }}</strong></span>
					@endif
				</div>

				<div class="mb-6 text-center">
					<div class="relative w-full mb-1">
						<input class="h-8 lg:h-auto transition bg-white shadow-md focus:outline-none border border-gray-200 placeholder-gray-700 rounded  py-1 lg:py-2 pr-4 pl-10 block w-full appearance-none leading-normal"
						       id="password"
						       type="password"
						       name="password"
						       placeholder="Password"
						       required
						>
						<div class="pointer-events-none absolute inset-y-0 left-0 pl-2.5 flex items-center">
							{{ svg_image('lineicons/lock', 'fill-current pointer-events-none text-gray-600 h-6') }}
						</div>
					</div>
					@if ($errors->has('password'))
						<span role="alert">
							<strong>
								{{ $errors->first('password') }}
							</strong>
						</span>
					@endif
				</div>
				<div class="flex justify-between mb-4 items-center">
					<div class="flex items-center">

						<input type="checkbox"
						       name="remember"
						       class="form-checkbox"
						       id="remember" {{ old('remember') ? 'checked' : '' }}>

						<label for="remember"
						       class="ml-2"
						>
							{{ __('Remember Me') }}
						</label>
					</div>
					<button type="submit"
					        class="py-2 px-8 bg-blue-500 rounded"
					>
						{{ __('Login') }}
					</button>
				</div>
				@if (Route::has('password.request'))
					<a href="{{ route('password.request', false) }}" class="font-light text-sm">
						{{ __('Forgot Your Password?') }}
					</a>
				@endif
			</form>
		</div>
	</div>
@endsection
