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
	
	<title>{{ config('app.name', 'Laravel') }}</title>
	<!-- Scripts -->
	<script src="{{ asset('js/app.js') }}"
					defer
	></script>
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
<body class="bg-bg">
<nav class="w-full h-15 bg-white mb-5">
	<div class="container mx-auto h-full flex items-center">
		@svg('search', ['class'=>'fill-current inline-block w-5 h-5'])
		<input type="text"
					 class="ml-1"
					 placeholder="Zoek Klant..."
		>
	</div>
</nav>

<div class="container mx-auto flex">
	<div class="bg-white w-1/3 mt-15 py-10 h-full">
		<div class="flex flex-col items-center mb-5">
			
			<img src="{{asset('img/logan-browning.jpg')}}"
					 class="rounded-full h-50 w-50 object-cover overflow-hidden  mb-5"
					 alt="name"
			>
			<h2 class="font-light">{{$customer->naam}}</h2>
			<h2 class="font-hairline">{{$customer->geboortedatum}}</h2>
		</div>
		<hr class="border-b border-dashed mb-5 mx-10">
		<div class="mx-15">
			<h2 class="font-hairline text-green  mb-5">Contactinformatie</h2>
			
			<label for="email"
						 class="font-hairline"
			>Email</label>
			<div class="flex justify-between mb-5">
				<input type="text"
							 value="{{$customer->email}}"
							 name="email"
							 readonly
				>
				<button class="h-5 w-5 ">@svg('clipboard')</button>
			</div>
			{{$customer->slug}}
			<label for="mobiel"
						 class="font-hairline"
			>Mobiel</label>
			<div class="flex justify-between mb-5">
				<input type="text"
							 value="{{$customer->mobiel}}"
							 name="mobiel"
							 readonly
				>
				<button class="h-5 w-5 ">@svg('clipboard')</button>
			</div>
			
			<label for="telefoon"
						 class="font-hairline"
			>Telefoon</label>
			<div class="flex justify-between mb-5">
				<input type="text"
							 value="{{$customer->telefoon}}"
							 name="telefoon"
							 readonly
				>
				<button class="h-5 w-5 ">@svg('clipboard')</button>
			</div>
		</div>
		
		<hr class="border-b border-dashed mb-5 mx-10">
		<div class="mx-15">
			<h2 class="font-hairline text-green  mb-5">Adresinformatie</h2>
			
			<label for="straatnaam + huisnummer"
						 class="font-hairline"
			>Straatnaam + Huisnummer</label>
			<div class="flex justify-between mb-5">
				<input type="text"
							 value="{{$customer->straatnaam}} {{$customer->huisnummer}}"
							 name="straatnaam + huisnummer"
							 readonly
				>
				<button class="h-5 w-5 ">@svg('clipboard')</button>
			</div>
			
			<label for="plaats"
						 class="font-hairline"
			>Plaats</label>
			<div class="flex justify-between mb-5">
				<input type="text"
							 value="{{$customer->plaats}}"
							 name="plaats"
							 readonly
				>
				<button class="h-5 w-5 ">@svg('clipboard')</button>
			</div>
			
			<label for="postcode"
						 class="font-hairline"
			>Postcode</label>
			<div class="flex justify-between mb-5">
				<input type="text"
							 value="{{$customer->postcode}}"
							 name="postcode"
							 readonly
				>
				<button class="h-5 w-5 ">@svg('clipboard')</button>
			</div>
		</div>
	</div>
	<div class="ml-5 w-2/3">
		@include('layouts._submenu')
		@include('klanten._notes', ['customer' => $customer])
	</div>
</div>
@if($customer->intake != null)
	@include('intake.show')
@endif
</body>
</html>