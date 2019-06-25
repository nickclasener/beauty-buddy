{{--<div data-controller="autocomplete"--}}
{{--     data-autocomplete-url="{{ route('klanten.search',false) }}"--}}
{{-->--}}
<div class="md:flex md:items-center md:justify-between bg-teal-500 text-white h-16 fixed md:static z-10 w-full">
	<div class="flex items-center flex-grow justify-between h-16 ">
		<a class="flex items-center h-full px-10">
			<div class="align-middle">
				Logo
			</div>
		</a>
		<div class="flex flex-grow text-black">
			<div class="w-full"
			     data-controller="autocomplete"
			     data-autocomplete-url="{{ route('klanten.search',false) }}"
			>
				<div class="relative w-full">
					<input class="transition bg-white shadow-md focus:outline-0 border border-transparent	placeholder-gray-700 rounded-full py-2 pr-4 pl-10 block w-full appearance-none leading-normal"
					       type="text"
					       placeholder="Search the docs (Press &quot;/&quot; to focus)"
					       data-action="focus->dropdown#hide"
					       data-target="autocomplete.input"
					/>
					<input type="hidden"
					       name="q"
					       value="{{ request('q') }}"
					       data-target="autocomplete.hidden"
					/>
					<div class="pointer-events-none absolute inset-y-0 left-0 pl-4 flex items-center">
						<svg class="fill-current pointer-events-none text-gray-600 w-4 h-4"
						     xmlns="http://www.w3.org/2000/svg"
						     viewBox="0 0 20 20"
						>
							<path d="M12.9 14.32a8 8 0 1 1 1.41-1.41l5.35 5.33-1.42 1.42-5.33-5.34zM8 14A6 6 0 1 0 8 2a6 6 0 0 0 0 12z"></path>
						</svg>
					</div>
				</div>
				<div data-target="autocomplete.results"
				     class="relative"
						{{--				     hidden--}}
				></div>
			</div>
		</div>
		<div class="md:flex md:items-center md:justify-between text-white h-16"
		     data-controller="dropdown"
		>
			<div class="md:hidden flex items-center h-full px-10"
			     data-action="click->dropdown#toggle click@window->dropdown#hide"
			>
				<div class="align-middle">
					<svg class="fill-current w-4 h-4"
					     xmlns="http://www.w3.org/2000/svg"
					     viewBox="0 0 20 20"
					>
						<path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"></path>
					</svg>
				</div>
			</div>
			<div data-target="dropdown.menu"
			     class="fixed right-0 md:relative md:h-16 md:right-auto flex md:flex-col text-left md:block md:text-right
				      md:mt-0 md:justify-between hidden"
			>
				<div class="py-3 px-3 h-full">
					<div class="md:items-center flex flex-col md:flex-row px-1 h-full py-1 md:p-0 bg-teal-500 rounded-one
						md:rounded-none"
					>
						@guest
							<a href="{{ route('login', false) }}"
							   class="px-2 py-2 md:mx-3 md:mt-0"
							>{{ __('Login') }}</a>
							@if (Route::has('register'))
								<a href="{{ route('register', false) }}"
								   class="px-2 py-2 md:mx-3 md:mt-0"
								>{{ __('Register') }}</a>
							@endif
						@else
							<a href="{{ route('klanten.index', false) }}"
							   class="px-2 py-2 md:mx-3 md:mt-0"
							>Klanten
							</a>
							<a href="{{ route('klanten.create', false) }}"
							   class="px-2 py-2 md:mx-3 md:mt-0"
							>Nieuwe Klant
							</a>
							{{--						<a href="#"--}}
							{{--						   role="button"--}}
							{{--						   data-toggle="dropdown"--}}
							{{--						   aria-haspopup="true"--}}
							{{--						   aria-expanded="false"--}}
							{{--						   class="mt-3 md:mx-3 md:mt-0">--}}
							{{--							{{ Auth::user()->name }} <span class="caret"></span>--}}
							{{--						</a>--}}
							<a href="{{ route('logout', false) }}"
							   onclick="event.preventDefault();document.getElementById('logout-form').submit();"
							   class="px-2 py-2 md:mx-3 md:mt-0"
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
		</div>
	</div>
</div>
{{--	<div data-target="autocomplete.results"--}}
{{--	     hidden--}}
{{--	></div>--}}
{{--</div>--}}
