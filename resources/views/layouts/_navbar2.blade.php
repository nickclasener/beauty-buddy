<nav class="bg-teal-500 relative sticky top-0 z-20 ">
	<div class="flex items-center lg:items-stretch justify-between flex-wrap lg:h-16 py-2 lg:py-0 px-4 lg:px-4"
	     data-controller="dropdown"
	>
		<div class="flex items-center justify-between flex-row w-full lg:w-auto lg:flex-grow">
			<div class="flex items-center flex-shrink-0 text-white mr-3 lg:mr-6">
				<svg class="fill-current h-8 w-8 mr-2"
				     width="54"
				     height="54"
				     viewBox="0 0 54 54"
				     xmlns="http://www.w3.org/2000/svg"
				>
					<path d="M13.5 22.1c1.8-7.2 6.3-10.8 13.5-10.8 10.8 0 12.15 8.1 17.55 9.45 3.6.9 6.75-.45 9.45-4.05-1.8 7.2-6.3 10.8-13.5 10.8-10.8 0-12.15-8.1-17.55-9.45-3.6-.9-6.75.45-9.45 4.05zM0 38.3c1.8-7.2 6.3-10.8 13.5-10.8 10.8 0 12.15 8.1 17.55 9.45 3.6.9 6.75-.45 9.45-4.05-1.8 7.2-6.3 10.8-13.5 10.8-10.8 0-12.15-8.1-17.55-9.45-3.6-.9-6.75.45-9.45 4.05z"></path>
				</svg>
				<span class="font-semibold text-xl tracking-tight hidden lg:block">Tailwind CSS</span>
			</div>
			<div class="flex flex-grow text-black pr-4 lg:w-auto">
				<div class="w-full"
				     data-controller="autocomplete"
				     data-autocomplete-url="{{ route('customer.search',false) }}"
				>
					<div class="relative w-full">
						<input class="h-8 lg:h-auto transition focus:outline-none placeholder-gray-700 rounded py-1 lg:py-2 pr-4 pl-10 block w-full appearance-none leading-normal main-search"
						       type="text"
						       placeholder="Search the docs (Press &quot;/&quot; to focus)"
						       data-action="focus->dropdown#hideAccountMenu focus->dropdown#hideResponsiveMenu"
						       data-target="autocomplete.input"
						/> <input type="hidden"
						          name="q"
						          value="{{ request('q') }}"
						          data-target="autocomplete.hidden"
						/>
						<div class="pointer-events-none absolute inset-y-0 left-0 pl-2.5 flex items-center">
							{{ svg_image('lineicons/magnifier', 'fill-current pointer-events-none text-gray-600 h-6') }}
						</div>
					</div>
					<div data-target="autocomplete.results"
					     class="relative"
					></div>
				</div>
			</div>
			<div class="flex lg:hidden">
				<div class=" text-teal-200 hover:text-white focus:outline-none focus:text-white cursor-pointer"
				     data-action="click->dropdown#toggleResponsiveMenu click@window->dropdown#hideResponsiveMenu click->toggle#toggle click@window->toggle#hidden"
				>
					<div data-target="toggle.show">
						{{ svg_image('zondicons/menu', ' p-1 rounded border-teal-200 h-8 fill-current text-teal-200') }}
					</div>
					<div data-target="toggle.hide"
					     class="hidden"
					>
						{{ svg_image('zondicons/close', ' p-1 rounded border-teal-200 h-8 fill-current text-teal-200') }}
					</div>
				</div>
			</div>
		</div>
		<div class="w-full hidden lg:block flex-grow lg:flex-grow-0 lg:flex lg:items-stretch lg:w-auto lg:py-0 lg:justify-between -mx-4 lg:ml-0 "
		     data-target="dropdown.responsiveMenu"
		>
			@auth
				<div class="px-2 pt-2 pb-4 border-b border-gray-800 lg:flex lg:border-b-0 lg:py-0 lg:px-0 gap gap-2">
					<a href="{{ route('customer.index', false) }}"
					   class="lg:flex lg:items-center block px-3 font-semibold lg:mt-0 lg:text-sm lg:px-4 {{ active_route_set_class('customer.index') }} lg:min-w-32 lg:justify-center"
					>{{ svg_image('lineicons/network', 'py-1 h-8'. active_icon_route_set_class('customer.index')) }}
					</a>
					<a href="{{ route('customer.create', false) }}"
					   class="lg:flex lg:items-center block px-3 font-semibold lg:mt-0 lg:text-sm lg:px-4 {{ active_route_set_class('customer.create') }} lg:min-w-32 lg:justify-center"
					>
						{{ svg_image('lineicons/user-add', 'py-1 h-8'. active_icon_route_set_class('customer.create')) }}
					</a>
				</div>
			@endauth
			<div class="hidden lg:block lg:flex"
			     data-action="click->dropdown#toggleAccountMenu click@window->dropdown#hideAccountMenu"
			>
				<div class="relative px-4 py-4 lg:px-0 lg:py-0 lg:static lg:flex lg:items-stretch gap gap-2">
					@guest
						<div class="{{ active_route_set_class() }} lg:flex lg:items-center block px-3 font-semibold lg:mt-0 lg:text-sm lg:px-6 "
						>
							{{ svg_image('lineicons/unlock', 'h-8'. active_icon_route_set_class()) }}
						</div>
					@endguest
					@auth
						<div class="relative hidden lg:block lg:flex lg:min-w-32 justify-center  {{ active_route_set_class('customer.show') }} ">
							<button type="button"
							        class="focus:outline-none lg:flex lg:items-center"
							>
								<img src="{{ asset('img/logan-browning.jpg') }}"
								     alt="{{ auth()->user()->name }}"
								     class="object-cover block h-8 w-8 overflow-hidden rounded-full menu-shadow "
								>
							</button>
						</div>
					@endauth
				</div>
			</div>
			@guest
				<div class="px-2 pt-2 pb-4 border-gray-800 lg:flex lg:border-b-0 lg:py-0 lg:px-0 lg:hidden ">
					<a href="{{ route('login', false) }}"
					   class="block text-gray-400 hover:text-white"
					>{{ __('Login') }}</a>
					@if (Route::has('register'))
						<a href="{{ route('register', false) }}"
						   class="mt-3 block text-gray-400 hover:text-white"
						>{{ __('Register') }}</a>
					@endif
				</div>
			@endguest
			@auth
				<div class="relative px-4 py-4 lg:py-0 lg:ml-4 lg:px-0">
					<div class="mt-4 lg:hidden">
						<div class="flex items-center lg:hidden">
							<img src="{{ asset('img/logan-browning.jpg') }}"
							     alt="{{ auth()->user()->name }}"
							     class="h-10 w-10 object-cover rounded-full border-2 border-gray-600"
							>
							<span class="ml-4 font-semibold text-gray-200 lg:hidden">{{ auth()->user()->name }}</span>
						</div>
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
			@endauth
			@include('layouts._dropdown-acountmenu')
		</div>
	</div>
</nav>

