<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
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
@isset( $image)
	@yield('background-image')
@else
	<body class="bg-gray-200 font-sans text-base-font text-gray-700">
	@endif
	@include('layouts._navbar2')

	{{--<div class="pt-16 lg:pt-0">--}}
	@yield('main')
	{{--</div>--}}
	</body>
</html>
