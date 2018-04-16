<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
	<meta charset="utf-8" >
	<meta http-equiv="X-UA-Compatible"
				content="IE=edge"
	>
	<meta name="viewport"
				content="width=device-width, initial-scale=1"
	>
	<!-- CSRF Token -->
	<meta name="csrf-token"
				content="{{ csrf_token() }}"
	>
	
	<title>{{ config('app.name', 'Laravel') }}</title>
	<!-- Scripts -->
	<script src="{{ asset('js/app.js') }}"
					defer
	></script>
	<!-- Fonts -->
	<link rel="dns-prefetch"
				href="https://fonts.gstatic.com"
	>
	<link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600"
				rel="stylesheet"
				type="text/css"
	>
	<!-- Styles -->
	<link href="{{ asset('css/app.css') }}"
				rel="stylesheet"
	>
</head>
<body>
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
				@endguest
				<li><a href="/klanten"
					>Klanten</a></li>
				<li><a href="/klanten/create"
					>Create Klant</a></li>
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
</body>
</html>
