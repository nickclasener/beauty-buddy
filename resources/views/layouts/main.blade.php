<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
	<meta charset="utf-8">
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
	<meta name="csrf-param"
	      content="_token"
	/>
	<!-- Scripts -->
	<script src="{{ asset('js/app.js') }}"
	        defer
	></script>
	<title>{{ config('app.name', 'Laravel') }}</title>
	@routes

	<!-- Fonts -->
	<link rel="dns-prefetch"
	      href="https://fonts.gstatic.com"

	>
	<link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i"
	      rel="stylesheet"

	>
	<!-- Styles -->
	<link href="{{ asset('css/app.css') }}"
	      rel="stylesheet"
	>
</head>
<body class="bg-bg font-sans text-base-font">
@include('layouts._navbar')
@yield('main')
@if (count($errors))
	@foreach ($errors->all() as $error)
		<ul class="alert alert-danger">
			<li>{{ $error }}</li>
		</ul>
	@endforeach
@endif

@if(config('app.env') === 'local')
	<script src="http://localhost:35729/livereload.js"></script>
@endif
</body>
</html>