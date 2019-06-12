<nav class="w-full h-15 bg-white mb-5">
	<div class="container mx-auto h-full flex items-center">
		<div class="flex items-center w-full">

			@svg('icon-111-search', ['class'=>'fill-current inline-block w-5 h-5'])
			<form action="{{ route('klanten.search') }}"

			>@method('POST')@csrf
				<input type="text"
				       name="q"
				       value="{{ request('q') }}"
				       class="ml-1"
				       placeholder="Zoek Klant..."
				>
				<button type="submit"> search</button>
			</form>

			<!-- Right Side Of Navbar -->
			<ul class="navbar-nav ml-auto">
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
</nav>

{{--<a class="navbar-brand"--}}
{{--href="{{ url('/') }}"--}}
{{-->--}}
{{--{{ config('app.name', 'BeautyBuddy') }}--}}
{{--</a>--}}
{{--<button class="navbar-toggler"--}}
{{--type="button"--}}
{{--data-toggle="collapse"--}}
{{--data-target="#navbarSupportedContent"--}}
{{--aria-controls="navbarSupportedContent"--}}
{{--aria-expanded="false"--}}
{{--aria-label="{{ __('Toggle navigation') }}"--}}
{{-->--}}
{{--<span class="navbar-toggler-icon"></span>--}}
{{--</button>--}}

{{--<div class="collapse navbar-collapse"--}}
{{--id="navbarSupportedContent"--}}
{{-->--}}
{{--<!-- Left Side Of Navbar -->--}}
{{--<ul class="navbar-nav mr-auto">--}}

{{--</ul>--}}

{{--<!-- Right Side Of Navbar -->--}}
{{--<ul class="navbar-nav ml-auto">--}}
{{--<!-- Authentication Links -->--}}
{{--@guest--}}
{{--<li class="nav-item">--}}
{{--<a class="nav-link"--}}
{{--href="{{ route('login', false) }}"--}}
{{-->{{ __('Login') }}</a>--}}
{{--</li>--}}
{{--@if (Route::has('register', false))--}}
{{--<li class="nav-item">--}}
{{--<a class="nav-link"--}}
{{--href="{{ route('register', false) }}"--}}
{{-->{{ __('Register') }}</a>--}}
{{--</li>--}}
{{--@endif--}}
{{--@else--}}
{{--<li class="nav-item dropdown">--}}
{{--<a id="navbarDropdown"--}}
{{--class="nav-link dropdown-toggle"--}}
{{--href="#"--}}
{{--role="button"--}}
{{--data-toggle="dropdown"--}}
{{--aria-haspopup="true"--}}
{{--aria-expanded="false"--}}
{{--v-pre--}}
{{-->--}}
{{--{{ Auth::user()->name }} <span class="caret"></span>--}}
{{--</a>--}}

{{--<div class="dropdown-menu dropdown-menu-right"--}}
{{--aria-labelledby="navbarDropdown"--}}
{{-->--}}
{{--<a class="dropdown-item"--}}
{{--href="{{ route('logout', false) }}"--}}
{{--onclick="event.preventDefault();document.getElementById('logout-form').submit();"--}}
{{-->--}}
{{--{{ __('Logout') }}--}}
{{--</a>--}}

{{--<form id="logout-form"--}}
{{--action="{{ route('logout', false) }}"--}}
{{--method="POST"--}}
{{--style="display: none;"--}}
{{-->--}}
{{--@csrf--}}
{{--</form>--}}
{{--</div>--}}
{{--</li>--}}
{{--<li>--}}
{{--<a href="{{ route('klanten.index', false) }}">Klanten</a>--}}
{{--</li>--}}
{{--<li>--}}
{{--<a href="{{ route('klanten.create', false) }}">Nieuwe Klant</a>--}}
{{--</li>--}}
{{--@endguest--}}
{{--</ul>--}}
{{--</div>--}}
