@extends('layouts.app')

@section('content')
	
	Voeg een nieuwe klant toe
	{{--<form action="/klanten"--}}
	{{--method="post"--}}
	{{-->{{ csrf_field() }}--}}
	
		<label for="naam"
		>Naam:</label>
		<input type="text"
					 name="naam"
					 placeholder="Naam"
					 value="{{ old('naam') }}"
					 required
		>
		<hr>
		
		<label for="email"
		>Email:</label>
		<input type="text"
					 name="email"
					 placeholder="Email"
					 value="{{ old('email') }}"
					 required
		>
		<hr>
		
		<label for="geboortedatum"
		>Geboortedatum:</label>
		<input type="text"
					 name="geboortedatum"
					 placeholder="Geboortedatum"
					 value="{{ old('geboortedatum') }}"
		>
		
		<hr>
		
		<label for="adres"
		>Adres:</label>
		<input type="text"
					 name="adres"
					 placeholder="Adres"
					 value="{{ old('adres') }}"
		>
		<hr>
		
		<label for="huisnummer"
		>Huisnummer:</label>
		<input type="text"
					 name="huisnummer"
					 placeholder="Huisnummer"
					 value="{{ old('huisnummer') }}"
		>
		<hr>
		
		<label for="plaats"
		>Plaats:</label>
		<input type="text"
					 name="plaats"
					 placeholder="Plaats"
					 value="{{ old('plaats') }}"
		>
		<hr>
		
		<label for="postcode"
		>Postcode:</label>
		<input type="text"
					 name="postcode"
					 placeholder="Postcode"
					 value="{{ old('postcode') }}"
		>
		<hr>
		
		<label for="telefoon"
		>Telefoon:</label>
		<input type="text"
					 name="telefoon"
					 placeholder="Telefoon"
					 value="{{ old('telefoon') }}"
		>
		<hr>
		
		<label for="mobiel"
		>Mobiel:</label>
		<input type="text"
					 name="mobiel"
					 placeholder="Mobiel"
					 value="{{ old('mobiel') }}"
		>
		<hr>
		
		<button type="submit"
		>Voeg toe
		</button>
	
@endsection

