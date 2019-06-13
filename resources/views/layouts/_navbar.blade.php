<nav class="w-full  bg-white mb-5"
     data-controller="autocomplete"
     data-autocomplete-url="{{ route('klanten.search',false) }}"
>
	<div class="h-15">
		<div class="container mx-auto h-full flex items-center">
			<div class="flex items-center w-full justify-between">
				{{--				FIXME: DELETE--}}
								<form action="{{ route('klanten.search',false) }}">
									@method('get')@csrf
									<div class="form-group">
										<input
												type="text"
												name="q"
												class="form-control"
												placeholder="Search..."
												value="{{ request('q') }}"
										/>
										<button type="submit">send</button>
									</div>
								</form>
				<div class="flex items-center flex-grow ">
					@svg('icon-111-search', ['class'=>'fill-current inline-block w-5 h-5'])
					<input type="text"
					       class="ml-1 w-full"
					       data-target="autocomplete.input"
					       placeholder="Zoek Klant..."
					/>
					<input type="hidden"
					       name="q"
					       value="{{ request('q') }}"
					       data-target="autocomplete.hidden"
					/>
				</div>
				<div class="flex items-center ">
					<!-- Right Side Of Navbar -->
					<ul class="navbar-nav">
						<!-- Authentication Links -->
						@guest
							<li class="nav-item">
								<a class="nav-link"
								   href="{{ route('login', false) }}"
								>{{ __('Login') }}</a>
							</li>
							@if (Route::has('register'))
								<li class="nav-item">
									<a class="nav-link"
									   href="{{ route('register', false) }}"
									>{{ __('Register') }}</a>
								</li>
							@endif
						@else
							<li class="nav-item dropdown">
								<a id="navbarDropdown"
								   class="nav-link dropdown-toggle"
								   href="#"
								   role="button"
								   data-toggle="dropdown"
								   aria-haspopup="true"
								   aria-expanded="false"
								   v-pre
								>
									{{ Auth::user()->name }} <span class="caret"></span>
								</a>

								<div class="dropdown-menu dropdown-menu-right"
								     aria-labelledby="navbarDropdown"
								>
									<a class="dropdown-item"
									   href="{{ route('logout', false) }}"
									   onclick="event.preventDefault();document.getElementById('logout-form').submit();"
									>
										{{ __('Logout') }}
									</a>

									<form id="logout-form"
									      action="{{ route('logout', false) }}"
									      method="POST"
									      style="display: none;"
									>
										@csrf
									</form>
								</div>
							</li>
							<li>
								<a href="{{ route('klanten.index', false) }}">Klanten</a>
							</li>
							<li>
								<a href="{{ route('klanten.create', false) }}">Nieuwe Klant</a>
							</li>
						@endguest
					</ul>
				</div>
			</div>
		</div>
	</div>

	<ul class="list-reset"
	    data-target="autocomplete.results"
	></ul>
</nav>

