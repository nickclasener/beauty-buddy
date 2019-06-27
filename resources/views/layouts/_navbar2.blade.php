<nav class="bg-teal-500 relative sticky top-0 z-10">

	<div class="flex items-center justify-between flex-wrap"
	     data-controller="dropdown toggle"
	>
		<div class="flex items-center justify-between flex-row w-full px-4 py-3 lg:w-auto lg:flex-grow">
			<div class="flex items-center flex-shrink-0 text-white mr-3 lg:mr-6">
				<svg class="fill-current h-8 w-8 mr-2"
				     width="54"
				     height="54"
				     viewBox="0 0 54 54"
				     xmlns="http://www.w3.org/2000/svg"
				>
					<path d="M13.5 22.1c1.8-7.2 6.3-10.8 13.5-10.8 10.8 0 12.15 8.1 17.55 9.45 3.6.9 6.75-.45 9.45-4.05-1.8 7.2-6.3 10.8-13.5 10.8-10.8 0-12.15-8.1-17.55-9.45-3.6-.9-6.75.45-9.45 4.05zM0 38.3c1.8-7.2 6.3-10.8 13.5-10.8 10.8 0 12.15 8.1 17.55 9.45 3.6.9 6.75-.45 9.45-4.05-1.8 7.2-6.3 10.8-13.5 10.8-10.8 0-12.15-8.1-17.55-9.45-3.6-.9-6.75.45-9.45 4.05z" />
				</svg>
				<span class="font-semibold text-xl tracking-tight hidden lg:block">Tailwind CSS</span>
			</div>
			<div class="flex flex-grow text-black pr-3 lg:w-auto">
				<div class="w-full"
				     data-controller="autocomplete"
				     data-autocomplete-url="{{ route('klanten.search',false) }}"
				>
					<div class="relative w-full">
						<input class="transition bg-white shadow-md focus:outline-0 border border-transparent	placeholder-gray-700
					rounded py-1 lg:py-2 pr-4 pl-10 block w-full appearance-none leading-normal"
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
					></div>
				</div>
			</div>
			<div class="flex lg:hidden">
				<div class="px-2 text-teal-200 hover:text-white focus:outline-none
		focus:text-white cursor-pointer"
				     data-action="click->dropdown#toggleResponsiveMenu click@window->dropdown#hideResponsiveMenu
			     click->toggle#toggle
			     click@window->toggle#hidden"

				>
					<div data-target="toggle.show">
						<svg xmlns="http://www.w3.org/2000/svg"
						     viewBox="0 0 24 24"
						     class="h-6 w-6 fill-current"
						><!---->
							<path fill-rule="evenodd"
							      d="M4 5h16a1 1 0 0 1 0 2H4a1 1 0 1 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2z"
							></path>
						</svg>
					</div>
					<div data-target="toggle.hide"
					     class="hidden"
					>
						<svg xmlns="http://www.w3.org/2000/svg"
						     viewBox="0 0 24 24"
						     class="h-6 w-6 fill-current"
						>
							<path fill-rule="evenodd"
							      d="M18.278 16.864a1 1 0 0 1-1.414 1.414l-4.829-4.828-4.828 4.828a1 1 0 0 1-1.414-1.414l4.828-4.829-4.828-4.828a1 1 0 0 1 1.414-1.414l4.829 4.828 4.828-4.828a1 1 0 1 1 1.414 1.414l-4.828 4.829 4.828 4.828z"
							      clip-rule="evenodd"
							></path><!----></svg>
					</div>
				</div>
			</div>
		</div>
		<div class="w-full hidden lg:block flex-grow lg:flex-grow-0 lg:flex lg:items-center lg:w-auto lg:py-0"
		     data-target="dropdown.responsiveMenu"
		>
			@auth
				<div class="px-2 pt-2 pb-5 border-b border-gray-800 lg:flex lg:border-b-0 lg:py-0 lg:px-0">
					<a href="{{ route('klanten.index', false) }}"
					   class="block px-3 py-1 rounded font-semibold text-white hover:bg-gray-800 lg:text-sm lg:px-2 xl:text-gray-900 xl:hover:bg-gray-200"
					>Klanten
					</a>
					<a href="{{ route('klanten.create', false) }}"
					   class="mt-1 block px-3 py-1 rounded font-semibold text-white hover:bg-gray-800 lg:mt-0 lg:text-sm lg:px-2 lg:ml-2 xl:text-gray-900 xl:hover:bg-gray-200"
					>Nieuwe Klant
					</a>
				</div>
			@endauth
			<div class="hidden lg:block lg:flex lg:items-center"
			     data-action="click->dropdown#toggleAccountMenu click@window->dropdown#hideAccountMenu"
			>
				<div class="relative px-5 py-5 sm:py-0 sm:ml-4 sm:px-0">

					<div class="relative hidden lg:block">
						<button type="button"
						        class="block focus:outline-none"
						><span class="block h-8 w-8 overflow-hidden rounded-full border-2 border-gray-600 xl:border-gray-300">
										<img src="{{ asset('img/logan-browning.jpg') }}"
										     alt=""
										     class="h-full w-full object-cover"
										></span></button>
					</div>
				</div>
			</div>
			@guest
				<div class="px-2 pt-2 pb-5 border-gray-800 lg:flex lg:border-b-0 lg:py-0 lg:px-0 lg:hidden">
					<a href="{{ route('login', false) }}"
					   class="block text-gray-400 hover:text-white"
					>{{ __('Login') }}</a>
					@if (Route::has('register'))
						<a href="{{ route('register', false) }}"
						   class="mt-3 block text-gray-400 hover:text-white"
						>{{ __('Register') }}</a>
					@endif
				</div>
			@else
				<div class="relative px-5 py-5 lg:py-0 lg:ml-4 lg:px-0">
					<div class="mt-5 lg:hidden">
						<div class="flex items-center lg:hidden">
							<img src="{{ asset('img/logan-browning.jpg') }}"
							     alt=""
							     class="h-10 w-10 object-cover rounded-full border-2 border-gray-600"
							>
							<span class="ml-4 font-semibold text-gray-200 lg:hidden">{{ auth()->user()->name }}</span></div>
						<a href="{{ route('logout', false) }}"
						   onclick="event.preventDefault();document.getElementById('logout-form').submit();"
						   class="block mt-4 lg:inline-block lg:mt-0 text-teal-200 hover:text-white mr-4"
						>{{ __('Logout') }}
						</a>
						<form id="logout-form"
						      action="{{ route('logout', false) }}"
						      method="POST"
						      style="display: none;"
						>@csrf</form>
					</div>
				</div>
			@endguest


			<div class="hidden"
			     data-target="dropdown.accountMenu"
			>
				<div class="absolute z-40 right-0">
					<div class="mt-3 bg-white xl:border rounded-lg w-48 py-2 shadow-xl">
						@guest
							<a href="{{ route('login', false) }}"
							   class="block hover:text-white text-gray-800 mt-0 px-4 py-2 hover:bg-indigo-500"
							>{{ __('Login') }}</a>
							@if (Route::has('register'))
								<a href="{{ route('register', false) }}"
								   class="block hover:text-white text-gray-800 mt-0 px-4 py-2 hover:bg-indigo-500"
								>{{ __('Register') }}</a>
							@endif
						@else
							<a href="{{ route('logout', false) }}"
							   onclick="event.preventDefault();document.getElementById('logout-form').submit();"
							   class="block hover:text-white text-gray-800 mt-0 px-4 py-2 hover:bg-indigo-500"
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
	{{--	</div>--}}
	{{--		</div>--}}
</nav>

{{--<div class="lg:flex lg:items-center lg:justify-between bg-teal-500 text-white h-16 fixed lg:static z-10 w-full">--}}
{{--	<div class="flex items-center flex-grow justify-between h-16 ">--}}
{{--		<a class="flex items-center h-full px-10">--}}
{{--			<div class="align-middle">--}}
{{--				Logo--}}
{{--			</div>--}}
{{--		</a>--}}
{{--		<div class="flex flex-grow text-black">--}}
{{--			<div class="w-full"--}}
{{--			     data-controller="autocomplete"--}}
{{--			     data-autocomplete-url="{{ route('klanten.search',false) }}"--}}
{{--			>--}}
{{--				<div class="relative w-full">--}}
{{--					<input class="transition bg-white shadow-md focus:outline-0 border border-transparent	placeholder-gray-700 rounded py-2 pr-4 pl-10 block w-full appearance-none leading-normal"--}}
{{--					       type="text"--}}
{{--					       placeholder="Search the docs (Press &quot;/&quot; to focus)"--}}
{{--					       data-action="focus->dropdown#hide"--}}
{{--					       data-target="autocomplete.input"--}}
{{--					/>--}}
{{--					<input type="hidden"--}}
{{--					       name="q"--}}
{{--					       value="{{ request('q') }}"--}}
{{--					       data-target="autocomplete.hidden"--}}
{{--					/>--}}
{{--					<div class="pointer-events-none absolute inset-y-0 left-0 pl-4 flex items-center">--}}
{{--						<svg class="fill-current pointer-events-none text-gray-600 w-4 h-4"--}}
{{--						     xmlns="http://www.w3.org/2000/svg"--}}
{{--						     viewBox="0 0 20 20"--}}
{{--						>--}}
{{--							<path d="M12.9 14.32a8 8 0 1 1 1.41-1.41l5.35 5.33-1.42 1.42-5.33-5.34zM8 14A6 6 0 1 0 8 2a6 6 0 0 0 0 12z"></path>--}}
{{--						</svg>--}}
{{--					</div>--}}
{{--				</div>--}}
{{--				<div data-target="autocomplete.results"--}}
{{--				     class="relative"--}}
{{--				     hidden--}}
{{--				></div>--}}
{{--			</div>--}}
{{--		</div>--}}
{{--		<div class="lg:flex lg:items-center lg:justify-between text-white h-16"--}}
{{--		     data-controller="dropdown"--}}
{{--		>--}}
{{--			<div class="lg:hidden flex items-center h-full px-10"--}}
{{--			     data-action="click->dropdown#toggle click@window->dropdown#hide"--}}
{{--			>--}}
{{--				<div class="align-middle">--}}
{{--					<svg class="fill-current w-4 h-4"--}}
{{--					     xmlns="http://www.w3.org/2000/svg"--}}
{{--					     viewBox="0 0 20 20"--}}
{{--					>--}}
{{--						<path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"></path>--}}
{{--					</svg>--}}
{{--				</div>--}}
{{--			</div>--}}
{{--			<div data-target="dropdown.menu"--}}
{{--			     class="fixed right-0 lg:relative lg:h-16 lg:right-auto flex lg:flex-col text-left lg:block lg:text-right--}}
{{--			     class=" lg:relative lg:h-16 lg:right-auto flex lg:flex-col text-left lg:block lg:text-right--}}
{{--					     lg:mt-0 lg:justify-between hidden"--}}
{{--			>--}}
{{--				<div class="py-3 px-3 h-full">--}}
{{--					<div class="w-full lg:items-center flex flex-col lg:flex-row px-1 h-full py-1 lg:p-0 bg-teal-500 rounded-one--}}
{{--						lg:rounded-none"--}}
{{--					>--}}
{{--						@guest--}}
{{--							<a href="{{ route('login', false) }}"--}}
{{--							   class="px-2 py-2 lg:mx-3 lg:mt-0"--}}
{{--							>{{ __('Login') }}</a>--}}
{{--							@if (Route::has('register'))--}}
{{--								<a href="{{ route('register', false) }}"--}}
{{--								   class="px-2 py-2 lg:mx-3 lg:mt-0"--}}
{{--								>{{ __('Register') }}</a>--}}
{{--							@endif--}}
{{--						@else--}}
{{--							<a href="{{ route('klanten.index', false) }}"--}}
{{--							   class="px-2 py-2 lg:mx-3 lg:mt-0"--}}
{{--							>Klanten--}}
{{--							</a>--}}
{{--							<a href="{{ route('klanten.create', false) }}"--}}
{{--							   class="px-2 py-2 lg:mx-3 lg:mt-0"--}}
{{--							>Nieuwe Klant--}}
{{--							</a>--}}
{{--							<a href="{{ route('logout', false) }}"--}}
{{--							   onclick="event.preventDefault();document.getElementById('logout-form').submit();"--}}
{{--							   class="px-2 py-2 lg:mx-3 lg:mt-0"--}}
{{--							>{{ __('Logout') }}--}}
{{--							</a>--}}
{{--							<form id="logout-form"--}}
{{--							      action="{{ route('logout', false) }}"--}}
{{--							      method="POST"--}}
{{--							      style="display: none;"--}}
{{--							>@csrf</form>--}}
{{--						@endguest--}}
{{--					</div>--}}
{{--				</div>--}}
{{--			</div>--}}
{{--		</div>--}}
{{--	</div>--}}
{{--</div>--}}
