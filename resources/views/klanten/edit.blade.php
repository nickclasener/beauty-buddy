@extends('layouts.app')

@section('content')
	
	{{--<form action="/klanten"--}}
	{{--method="post"--}}
	{{-->{{ csrf_field() }}--}}
	
	<div data-controller="customer"
			 data-customer-url="{{$customer->path()}}"
	>
		<label for="naam"
		>Naam:</label>
		<input type="text"
					 name="naam"
					 placeholder="Naam"
					 value="{{ old('naam') ?:$customer->naam }}"
					 data-target="customer.naam"
					 required
		>
		<span data-target="customer.errorNaam"></span>
		<hr>
		
		<label for="email"
		>Email:</label>
		<input type="text"
					 name="email"
					 placeholder="Email"
					 value="{{ old('email')?:$customer->email }}"
					 data-target="customer.email"
					 required
		>
		<span data-target="customer.errorEmail"></span>
		<hr>
		
		<label for="geboortedatum"
		>Geboortedatum:</label>
		<input type="text"
					 name="geboortedatum"
					 placeholder="Geboortedatum"
					 value="{{ old('geboortedatum') ?:$customer->geboortedatum }}"
					 data-target="customer.geboortedatum"
		>
		<span data-target="customer.errorGeboortedatum"></span>
		<hr>
		
		<label for="adres"
		>Adres:</label>
		<input type="text"
					 name="adres"
					 placeholder="Adres"
					 value="{{ old('adres') ?:$customer->adres}}"
					 data-target="customer.adres"
		>
		<hr>
		
		<label for="huisnummer"
		>Huisnummer:</label>
		<input type="text"
					 name="huisnummer"
					 placeholder="Huisnummer"
					 value="{{ old('huisnummer') ?:$customer->huisnummer}}"
					 data-target="customer.huisnummer"
		>
		<hr>
		
		<label for="plaats"
		>Plaats:</label>
		<input type="text"
					 name="plaats"
					 placeholder="Plaats"
					 value="{{ old('plaats') ?:$customer->plaats}}"
					 data-target="customer.plaats"
		>
		<hr>
		
		<label for="postcode"
		>Postcode:</label>
		<input type="text"
					 name="postcode"
					 placeholder="Postcode"
					 value="{{ old('postcode') ?:$customer->postcode}}"
					 data-target="customer.postcode"
		>
		<hr>
		
		<label for="telefoon"
		>Telefoon:</label>
		<input type="text"
					 name="telefoon"
					 placeholder="Telefoon"
					 value="{{ old('telefoon') ?:$customer->telefoon}}"
					 data-target="customer.telefoon"
		>
		<hr>
		
		<label for="mobiel"
		>Mobiel:</label>
		<input type="text"
					 name="mobiel"
					 placeholder="Mobiel"
					 value="{{ old('mobiel') ?:$customer->mobiel}}"
					 data-target="customer.mobiel"
		>
		<hr>
		
		<button type="submit"
						data-action="click->customer#updateCustomer"
		>Update
		</button>
	
	</div>
@endsection
