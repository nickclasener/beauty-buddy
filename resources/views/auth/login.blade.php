@extends('layouts.auth')

@section('main')

	<div class="flex items-center justify-center flex-wrap h-screen fixed top-0 w-full">

		{{--		<div class="flex items-stretch justify-between flex-wrap fixed top-0 right-0 lg:m-8 md:m-6 m-4"--}}
		{{--		     data-controller="dropdown toggle"--}}
		{{--		>--}}
		{{--			<a class="lg:block lg:flex"--}}
		{{--			   data-action="click->dropdown#toggleAccountMenu click@window->dropdown#hideAccountMenu click->toggle#active click@window->toggle#inactive"--}}
		{{--			>--}}
		{{--				<div class="relative">--}}
		{{--					--}}{{--					<div class="bg-teal-200 group hover:bg-teal-300 flex items-center block font-semibold text-sm p-6"--}}
		{{--					<div class=" flex items-center block font-semibold text-sm p-6"--}}
		{{--					     data-target="toggle.active"--}}
		{{--					>--}}
		{{--						{{ svg_image('lineicons/unlock', 'h-8 fill-current text-teal-500 group-hover:text-teal-400')->dataTarget('toggle.activeicon') }}--}}
		{{--					</div>--}}

		{{--				</div>--}}
		{{--			</a>--}}
		{{--			<div class="mt-12 absolute right-0">--}}
		{{--				<div class="-mt-3">--}}
		{{--					@include('layouts._dropdown-acountmenu')--}}
		{{--				</div>--}}
		{{--			</div>--}}
		{{--		</div>--}}


		<div class="flex items-center justify-center bg-white p-4 sm:p-8 md:p-12 lg:p-16 flex-col shadow-2xl border border-gray-200 fixed">


			<div class="mb-4">{{ __('auth.Login') }}</div>

			<form method="POST"
			      action="{{ route('login', false) }}"
			>@csrf
				<div class="mb-6 text-center">
					<div class="relative w-full mb-1">
						<input id="email"
						       type="email"
						       class="h-8 lg:h-auto transition bg-white shadow-md focus:shadow-inner focus:outline-none border border-gray-200 placeholder-gray-700 rounded py-1 lg:py-2 pr-4 pl-10 block w-full appearance-none leading-normal"
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
						<input class="h-8 lg:h-auto transition bg-white shadow-md focus:shadow-inner focus:outline-none border border-gray-200 placeholder-gray-700 rounded  py-1 lg:py-2 pr-4 pl-10 block w-full appearance-none leading-normal"
						       id="password"
						       type="password"
						       name="password"
						       placeholder="Password"
						       required
						>
						<div class="pointer-events-none absolute inset-y-0 left-0 pl-2.5 flex items-center  ">
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
						<label class="switch">
							<input type="checkbox"
							       name="remember"
							       id="remember" {{ old('remember') ? 'checked' : '' }}>
							<span class="slider"></span>
						</label>

						<label for="remember"
						       class="ml-2"
						>{{ __('Remember Me') }}
						</label>
					</div>
					<button type="submit"
					        class="py-2 px-4 group bg-teal-100 hover:bg-teal-500 shadow-md  rounded"
					>
						{{--						{{ __('Login') }}--}}

						{{ svg_image('lineicons/unlock', 'hidden h-6 fill-current text-white group-hover:block')->dataTarget('toggle.activeicon') }}
						{{ svg_image('lineicons/lock', 'h-6 fill-current text-teal-500 group-hover:hidden')->dataTarget('toggle.activeicon') }}
					</button>
				</div>
				@if (Route::has('password.request'))
					<a href="{{ route('password.request', false) }}"
					   class="font-light text-sm"
					>{{ __('Forgot Your Password?') }}
					</a>
				@endif
			</form>
		</div>
	</div>
@endsection
