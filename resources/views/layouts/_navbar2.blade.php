<div data-controller="autocomplete dropdown"
     data-autocomplete-url="{{ route('klanten.search',false) }}"
>
	<div class=" md:flex md:items-center md:justify-between bg-gray-900 h-16"
	     data-controller="dropdown">
		<div class="flex items-center flex-grow justify-between h-16 text-white bg-gray-900">
			<a class="flex items-center h-full px-10">
				<div class="align-middle">
					Logo
				</div>
			</a>
			<div class="flex flex-grow text-black">
				<div class="w-full ">
					<div class="relative">
						<input class="transition bg-white shadow-md focus:outline-0 border border-transparent placeholder-gray-700 rounded-lg py-2 pr-4 pl-10 block w-full appearance-none leading-normal ds-input"
						       type="text"
						       placeholder="Search the docs (Press &quot;/&quot; to focus)"
						       data-target="autocomplete.input"
						>
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
				</div>
			</div>

			{{--		</div>--}}
			<div class="md:hidden flex items-center h-full px-10"
			     data-action="click->dropdown#toggle click@window->dropdown#hide">
				<div class="align-middle">
					<svg class="fill-current w-4 h-4"
					     xmlns="http://www.w3.org/2000/svg"
					     viewBox="0 0 20 20"
					>
						<path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"></path>
					</svg>
				</div>
			</div>
		</div>
		<div data-target="dropdown.menu"
		     class="fixed right-0 md:relative md:h-16 md:right-auto flex md:flex-col text-right md:block md:text-right
		     md:mt-0
		     md:justify-between md:bg-gray-900 hidden">
			{{--			<div class="flex-grow "></div>--}}
			<div class="py-3 px-3 h-full">
				<div class="md:items-center flex flex-col md:flex-row px-10 h-full pb-3 md:p-0 bg-gray-900 rounded-one
				md:rounded-none">
					<a href="#"
					   class="mt-3 md:mx-3 md:mt-0">Link 1</a>
					<a href="#"
					   class="mt-3 md:mx-3 md:mt-0">Link 2</a>
					<a href="#"
					   class="mt-3 md:mx-3 md:mt-0">Link 3</a>
					<a href="#"
					   class="mt-3 md:mx-3 md:mt-0">Link 4</a>
				</div>
			</div>
			{{--			<div class="flex-grow bg-white"></div>--}}
		</div>
	</div>
	<div data-target="autocomplete.results"
	     hidden>
	</div>
</div>
{{--<div class="bg-gray-100 pt-24 lg:pt-0">--}}
{{--	<div class="fixed z-100 bg-gray-100 inset-x-0 top-0 border-b-2 border-gray-200 lg:border-b-0 lg:static flex items-center">--}}
{{--		<div class="w-full max-w-screen-xl relative mx-auto px-6">--}}
{{--			<div class="lg:border-b-2 lg:border-gray-200 h-24 flex flex-col justify-center">--}}
{{--				<div class="flex items-center -mx-6">--}}
{{--					<div class="lg:w-1/4 xl:w-1/5 pl-6 pr-6">--}}
{{--						<div class="flex items-center">--}}
{{--							<a href="/"--}}
{{--							   class="block"--}}
{{--							>BB--}}
{{--							</a>--}}
{{--						</div>--}}
{{--					</div>--}}


{{--					<div class="text-gray-500 focus:outline-none focus:text-gray-700 flex px-6  lg:hidden">--}}

{{--						<div class="relative"--}}
{{--						     data-controller="dropdown">--}}
{{--							<div data-action="click->dropdown#toggle click@window->dropdown#hide mouseover->dropdown#toggle"--}}
{{--							     role="button"--}}
{{--							     class="inline-block  select-none"--}}
{{--							>--}}
{{--								<svg class="fill-current w-4 h-4"--}}
{{--								     xmlns="http://www.w3.org/2000/svg"--}}
{{--								     viewBox="0 0 20 20"--}}
{{--								>--}}
{{--									<path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"></path>--}}
{{--								</svg>--}}
{{--							</div>--}}

{{--							<div data-target="dropdown.menu"--}}
{{--							     class="absolute mt-2 hidden">--}}
{{--								<div class="bg-white shadow rounded border p-6">--}}
{{--									<p>Lorem</p>--}}
{{--									<p>Ipsum</p>--}}
{{--									<p>Nick Clasener</p>--}}
{{--								</div>--}}
{{--							</div>--}}
{{--						</div>--}}
{{--					</div>--}}
{{--					--}}{{--					<div class="dropdown">--}}
{{--					--}}{{--						<span>--}}
{{--					--}}{{--							dropdown--}}
{{--					--}}{{--						<svg class="fill-current w-4 h-4"--}}
{{--					--}}{{--						     xmlns="http://www.w3.org/2000/svg"--}}
{{--					--}}{{--						     viewBox="0 0 20 20"--}}
{{--					--}}{{--						>--}}
{{--					--}}{{--							<path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"></path>--}}
{{--					--}}{{--						</svg>--}}
{{--					--}}{{--						</span>--}}
{{--					--}}{{--						<div class="dropdown-content">--}}
{{--					--}}{{--							<p>Hi</p>--}}
{{--					--}}{{--						</div>--}}
{{--					--}}{{--				</div>--}}


{{--					<button type="button"--}}
{{--					        id="sidebar-close"--}}
{{--					        class="text-gray-500 focus:outline-none focus:text-gray-700 flex px-6 items-center lg:hidden hidden"--}}
{{--					>--}}
{{--						<svg class="fill-current w-4 h-4"--}}
{{--						     xmlns="http://www.w3.org/2000/svg"--}}
{{--						     viewBox="0 0 20 20"--}}
{{--						>--}}
{{--							<path d="M10 8.586L2.929 1.515 1.515 2.929 8.586 10l-7.071 7.071 1.414 1.414L10 11.414l7.071 7.071 1.414-1.414L11.414 10l7.071-7.071-1.414-1.414L10 8.586z"></path>--}}
{{--						</svg>--}}
{{--					</button>--}}


{{--					<div class="hidden lg:flex lg:items-center lg:justify-between xl:w-1/4 px-6">--}}
{{--						<div class="relative mr-4">--}}
{{--							<select data-version-switcher=""--}}
{{--							        class="appearance-none block bg-transparent pl-2 pr-8 py-1 text-gray-500 font-medium text-base focus:outline-none focus:text-gray-800"--}}
{{--							>--}}
{{--								<option value="v1">v1.0.4</option>--}}
{{--								<option value="v0">v0.7.4</option>--}}
{{--							</select>--}}
{{--							<div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-500">--}}
{{--								<svg class="fill-current h-4 w-4"--}}
{{--								     xmlns="http://www.w3.org/2000/svg"--}}
{{--								     viewBox="0 0 20 20"--}}
{{--								>--}}
{{--									<path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"></path>--}}
{{--								</svg>--}}
{{--							</div>--}}
{{--						</div>--}}
{{--						<div class="flex justify-start items-center text-gray-500">--}}
{{--							<a class="block flex items-center hover:text-gray-700 mr-5"--}}
{{--							   href="https://github.com/tailwindcss/tailwindcss"--}}
{{--							>--}}
{{--								<svg class="fill-current w-5 h-5"--}}
{{--								     xmlns="http://www.w3.org/2000/svg"--}}
{{--								     viewBox="0 0 20 20"--}}
{{--								><title>GitHub</title>--}}
{{--									<path d="M10 0a10 10 0 0 0-3.16 19.49c.5.1.68-.22.68-.48l-.01-1.7c-2.78.6-3.37-1.34-3.37-1.34-.46-1.16-1.11-1.47-1.11-1.47-.9-.62.07-.6.07-.6 1 .07 1.53 1.03 1.53 1.03.9 1.52 2.34 1.08 2.91.83.1-.65.35-1.09.63-1.34-2.22-.25-4.55-1.11-4.55-4.94 0-1.1.39-1.99 1.03-2.69a3.6 3.6 0 0 1 .1-2.64s.84-.27 2.75 1.02a9.58 9.58 0 0 1 5 0c1.91-1.3 2.75-1.02 2.75-1.02.55 1.37.2 2.4.1 2.64.64.7 1.03 1.6 1.03 2.69 0 3.84-2.34 4.68-4.57 4.93.36.31.68.92.68 1.85l-.01 2.75c0 .26.18.58.69.48A10 10 0 0 0 10 0"></path>--}}
{{--								</svg>--}}
{{--							</a>--}}
{{--							<a class="block flex items-center hover:text-gray-700 mr-5"--}}
{{--							   href="https://twitter.com/tailwindcss"--}}
{{--							>--}}
{{--								<svg class="fill-current w-5 h-5"--}}
{{--								     xmlns="http://www.w3.org/2000/svg"--}}
{{--								     viewBox="0 0 20 20"--}}
{{--								><title>Twitter</title>--}}
{{--									<path d="M6.29 18.25c7.55 0 11.67-6.25 11.67-11.67v-.53c.8-.59 1.49-1.3 2.04-2.13-.75.33-1.54.55-2.36.65a4.12 4.12 0 0 0 1.8-2.27c-.8.48-1.68.81-2.6 1a4.1 4.1 0 0 0-7 3.74 11.65 11.65 0 0 1-8.45-4.3 4.1 4.1 0 0 0 1.27 5.49C2.01 8.2 1.37 8.03.8 7.7v.05a4.1 4.1 0 0 0 3.3 4.03 4.1 4.1 0 0 1-1.86.07 4.1 4.1 0 0 0 3.83 2.85A8.23 8.23 0 0 1 0 16.4a11.62 11.62 0 0 0 6.29 1.84"></path>--}}
{{--								</svg>--}}
{{--							</a>--}}
{{--							<a class="block flex items-center hover:text-gray-700"--}}
{{--							   href="/discord"--}}
{{--							>--}}
{{--								<svg class="fill-current w-5 h-5"--}}
{{--								     xmlns="http://www.w3.org/2000/svg"--}}
{{--								     viewBox="0 0 146 146"--}}
{{--								><title>Discord</title>--}}
{{--									<path d="M107.75 125.001s-4.5-5.375-8.25-10.125c16.375-4.625 22.625-14.875 22.625-14.875-5.125 3.375-10 5.75-14.375 7.375-6.25 2.625-12.25 4.375-18.125 5.375-12 2.25-23 1.625-32.375-.125-7.125-1.375-13.25-3.375-18.375-5.375-2.875-1.125-6-2.5-9.125-4.25-.375-.25-.75-.375-1.125-.625-.25-.125-.375-.25-.5-.375-2.25-1.25-3.5-2.125-3.5-2.125s6 10 21.875 14.75c-3.75 4.75-8.375 10.375-8.375 10.375-27.625-.875-38.125-19-38.125-19 0-40.25 18-72.875 18-72.875 18-13.5 35.125-13.125 35.125-13.125l1.25 1.5c-22.5 6.5-32.875 16.375-32.875 16.375s2.75-1.5 7.375-3.625c13.375-5.875 24-7.5 28.375-7.875.75-.125 1.375-.25 2.125-.25 7.625-1 16.25-1.25 25.25-.25 11.875 1.375 24.625 4.875 37.625 12 0 0-9.875-9.375-31.125-15.875l1.75-2S110 19.626 128 33.126c0 0 18 32.625 18 72.875 0 0-10.625 18.125-38.25 19zM49.625 66.626c-7.125 0-12.75 6.25-12.75 13.875s5.75 13.875 12.75 13.875c7.125 0 12.75-6.25 12.75-13.875.125-7.625-5.625-13.875-12.75-13.875zm45.625 0c-7.125 0-12.75 6.25-12.75 13.875s5.75 13.875 12.75 13.875c7.125 0 12.75-6.25 12.75-13.875s-5.625-13.875-12.75-13.875z"--}}
{{--									      fill-rule="nonzero"--}}
{{--									></path>--}}
{{--								</svg>--}}
{{--							</a>--}}
{{--						</div>--}}
{{--					</div>--}}
{{--				</div>--}}
{{--			</div>--}}
{{--		</div>--}}
{{--	</div>--}}
{{--</div>--}}


{{--<nav data-controller="autocomplete"--}}
{{--     data-autocomplete-url="{{ route('klanten.search',false) }}"--}}
{{-->--}}
{{--	@svg('icon-111-search', ['class'=>'fill-current inline-block w-8 h-8'])--}}
{{--	<input type="text"--}}
{{--	       data-target="autocomplete.input"--}}
{{--	       placeholder="Zoek Klant..."--}}
{{--	/>--}}
{{--	<input type="hidden"--}}
{{--	       name="q"--}}
{{--	       value="{{ request('q') }}"--}}
{{--	       data-target="autocomplete.hidden"--}}
{{--	/>--}}
{{--	<ul>--}}
{{--		<!-- Authentication Links -->--}}
{{--		@guest--}}
{{--			<li>--}}
{{--				<a href="{{ route('login', false) }}"--}}
{{--				>{{ __('Login') }}</a>--}}
{{--			</li>--}}
{{--			@if (Route::has('register'))--}}
{{--				<li>--}}
{{--					<a href="{{ route('register', false) }}"--}}
{{--					>{{ __('Register') }}</a>--}}
{{--				</li>--}}
{{--			@endif--}}
{{--		@else--}}
{{--			<li>--}}
{{--				<a href="#"--}}
{{--				   role="button"--}}
{{--				   data-toggle="dropdown"--}}
{{--				   aria-haspopup="true"--}}
{{--				   aria-expanded="false"--}}
{{--				>--}}
{{--					{{ Auth::user()->name }} <span class="caret"></span>--}}
{{--				</a>--}}
{{--				<div aria-labelledby="navbarDropdown"--}}
{{--				>--}}
{{--					<a href="{{ route('logout', false) }}"--}}
{{--					   onclick="event.preventDefault();document.getElementById('logout-form').submit();"--}}
{{--					>--}}
{{--						{{ __('Logout') }}--}}
{{--					</a>--}}
{{--					<form id="logout-form"--}}
{{--					      action="{{ route('logout', false) }}"--}}
{{--					      method="POST"--}}
{{--					      style="display: none;"--}}
{{--					>@csrf</form>--}}
{{--				</div>--}}
{{--			</li>--}}
{{--			<li>--}}
{{--				<a href="{{ route('klanten.index', false) }}">Klanten</a>--}}
{{--			</li>--}}
{{--			<li>--}}
{{--				<a href="{{ route('klanten.create', false) }}">Nieuwe Klant</a>--}}
{{--			</li>--}}
{{--		@endguest--}}
{{--	</ul>--}}
{{--	<ul data-target="autocomplete.results"--}}
{{--	    hidden--}}
{{--	></ul>--}}
{{--</nav>--}}

