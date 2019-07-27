@extends('layouts.auth')

@section('main')
	<div class="flex items-center justify-center flex-wrap h-screen fixed top-0 w-full">
		<div class="flex items-center justify-center bg-white p-4 sm:p-8 md:p-12 lg:p-16 flex-col shadow-2xl border border-gray-200 fixed">
			<div class="mb-4">{{ __('Register') }}</div>

			<form method="POST"
			      action="{{ route('register', false) }}"
			>@csrf
				<div class="mb-6 text-center">
					<div class="relative w-full mb-1">
						{{--						{{ __('Name') }}--}}
						<input id="name"
						       type="text"
						       class="h-8 lg:h-auto transition bg-white shadow-md focus:border-gray-500 focus:shadow-inner focus:outline-none border border-gray-200 placeholder-gray-700 rounded py-1 lg:py-2 pr-4 pl-10 block w-full appearance-none leading-normal"
						       name="name"
						       placeholder="Jane Doe"
						       value="{{ old('name') }}"
						       required
						       autofocus
						>
						<div class="pointer-events-none absolute inset-y-0 left-0 pl-2.5 flex items-center ">
							{{ svg_image('lineicons/user', 'fill-current pointer-events-none text-gray-600 h-6') }}
						</div>
					</div>
					@if ($errors->has('name'))
						<span class="invalid-feedback"
						      role="alert"
						><strong>{{ $errors->first('name') }}</strong></span>
					@endif
				</div>

				<div class="mb-6 text-center">
					<div class="relative w-full mb-1">
						{{--						{{ __('E-Mail Address') }}--}}
						<input id="email"
						       type="email"
						       class="h-8 lg:h-auto transition bg-white shadow-md focus:border-gray-500 focus:shadow-inner focus:outline-none border border-gray-200 placeholder-gray-700 rounded py-1 lg:py-2 pr-4 pl-10 block w-full appearance-none leading-normal"
						       name="email"
						       value="{{ old('email') }}"
						       placeholder="janedoe@example.com"
						       required
						       autofocus
						>
						<div class="pointer-events-none absolute inset-y-0 left-0 pl-2.5 flex items-center ">
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
						{{--						{{ __('Password') }}--}}
						<input id="password"
						       type="password"
						       class="h-8 lg:h-auto transition bg-white shadow-md focus:border-gray-500 focus:shadow-inner focus:outline-none border border-gray-200 placeholder-gray-700 rounded py-1 lg:py-2 pr-4 pl-10 block w-full appearance-none leading-normal"
						       name="password"
						       placeholder="Password"
						       required
						>
						<div class="pointer-events-none absolute inset-y-0 left-0 pl-2.5 flex items-center ">
							{{ svg_image('lineicons/lock', 'fill-current pointer-events-none text-gray-600 h-6') }}
						</div>
					</div>
					@if ($errors->has('password'))
						<span class="invalid-feedback"
						      role="alert"
						><strong>{{ $errors->first('password') }}</strong></span>
					@endif
				</div>

				<div class="mb-6 text-center">
					<div class="relative w-full mb-1">
						{{--						{{ __('Confirm Password') }}--}}
						<input id="password-confirm"
						       type="password"
						       class="h-8 lg:h-auto transition bg-white shadow-md focus:border-gray-500 focus:shadow-inner focus:outline-none border border-gray-200 placeholder-gray-700 rounded py-1 lg:py-2 pr-4 pl-10 block w-full appearance-none leading-normal"
						       name="password_confirmation"
						       placeholder="Confirm Password"
						       required
						>
						<div class="pointer-events-none absolute inset-y-0 left-0 pl-2.5 flex items-center ">
							{{ svg_image('lineicons/lock', 'fill-current pointer-events-none text-gray-600 h-6') }}
						</div>
					</div>
				</div>

				<div class="form-group row mb-0">
					<div class="col-md-6 offset-md-4">
						<button type="submit"
						        class="btn btn-primary"
						>
							{{ __('Register') }}
						</button>
					</div>
				</div>
			</form>
		</div>
	</div>
@endsection
