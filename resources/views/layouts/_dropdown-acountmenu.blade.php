<div class="hidden"
     data-target="dropdown.accountMenu"
>
	<div class="absolute mt-12 z-40 right-0">
		<div class="mt-3 bg-white xl:border  w-48 py-2 shadow-xl">
			@guest
				<a href="{{ route('login', false) }}"
				   class="block hover:text-white text-gray-700 mt-0 px-4 py-2 hover:bg-teal-500 mx-2 rounded"
				>{{ __('Login') }}</a>
				@if (Route::has('register'))
					<a href="{{ route('register', false) }}"
					   class="block hover:text-white text-gray-700 mt-0 px-4 py-2 hover:bg-teal-500 mx-2 rounded"
					>{{ __('Register') }}</a>
				@endif
			@else
				<a href="{{ route('logout', false) }}"
				   onclick="event.preventDefault();document.getElementById('logout-form').submit();"
				   class="block hover:text-white text-gray-700 mt-0 px-4 py-2 hover:bg-teal-500 mx-2 rounded"
				>{{ __('Logout') }}
				</a>
				<form id="logout-form"
				      action="{{ route('logout', false) }}"
				      method="POST"
				      style="display: none;"
				>@csrf</form>
			@endguest
		</div>
	</div>
</div>
