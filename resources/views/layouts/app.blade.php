
<nav>
	<div>
		<a class="navbar-brand"
			 href="{{ url('/') }}"
		>{{ config('app.name', 'Laravel') }}</a>
		
		<button type="button"
						data-toggle="collapse"
						data-target="#navbarSupportedContent"
						aria-controls="navbarSupportedContent"
						aria-expanded="false"
						aria-label="Toggle navigation"
		></button>
		
		<div id="navbarSupportedContent">
			<!-- Left Side Of Navbar -->
			<ul>
			</ul>
			<!-- Right Side Of Navbar -->
			<ul>
				<!-- Authentication Links -->
				@guest
					<li><a href="{{ route('login') }}"
						>{{ __('Login') }}</a></li>
					<li><a href="{{ route('register') }}"
						>{{ __('Register') }}</a></li>
				@else
					<li>
						<a id="navbarDropdown"
							 href="#"
							 role="button"
							 data-toggle="dropdown"
							 aria-haspopup="true"
							 aria-expanded="false"
							 v-pre
						>{{ Auth::user()->name }} <span class="caret"></span></a>
						
						<div aria-labelledby="navbarDropdown">
							<a href="{{ route('logout') }}"
								 onclick="event.preventDefault();document.getElementById('logout-form').submit();"
							>{{ __('Logout') }}</a>
							
							<form id="logout-form"
										action="{{ route('logout') }}"
										method="POST"
										style="display: none;"
							>@csrf</form>
						</div>
					</li>
					<li><a href="{{route('klanten.index')}}"
						>Klanten</a></li>
					<li><a href="{{route('klanten.create')}}"
						>Create Klant</a></li>
				@endguest
			
			</ul>
		</div>
	</div>
</nav>

<main class="py-4">
	@yield('content')
</main>

@if (count($errors))
	@foreach($errors->all() as $error)
		<ul class="alert alert-danger">
			<li>{{ $error }}</li>
		</ul>
	@endforeach
@endif
