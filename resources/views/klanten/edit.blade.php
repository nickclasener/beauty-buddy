@extends('layouts.app')

@section('content')
	
	<form action="{{route('klanten.update',$customer)}}"
				method="post"
	>
		@method('PATCH')
		@csrf
		<label for="naam"
		>Naam:</label>
		<input type="text"
					 name="naam"
					 placeholder="Naam"
					 value="{{ old('naam') ?:$customer->naam }}"
					 required
		>
		<hr>
		
		<label for="email"
		>Email:</label>
		<input type="text"
					 name="email"
					 placeholder="Email"
					 value="{{ old('email')?:$customer->email }}"
					 required
		>
		<hr>
		
		<label for="geboortedatum"
		>Geboortedatum:</label>
		<input type="text"
					 name="geboortedatum"
					 placeholder="Geboortedatum"
					 value="{{ old('geboortedatum') ?:$customer->geboortedatum }}"
		>
		<hr>
		
		<label for="straatnaam"
		>Straatnaam:</label>
		<input type="text"
					 name="straatnaam"
					 placeholder="Straatnaam"
					 value="{{ old('straatnaam') ?:$customer->straatnaam}}"
		>
		<hr>
		
		<label for="huisnummer"
		>Huisnummer:</label>
		<input type="text"
					 name="huisnummer"
					 placeholder="Huisnummer"
					 value="{{ old('huisnummer') ?:$customer->huisnummer}}"
		>
		<hr>
		
		<label for="plaats"
		>Plaats:</label>
		<input type="text"
					 name="plaats"
					 placeholder="Plaats"
					 value="{{ old('plaats') ?:$customer->plaats}}"
		>
		<hr>
		
		<label for="postcode"
		>Postcode:</label>
		<input type="text"
					 name="postcode"
					 placeholder="Postcode"
					 value="{{ old('postcode') ?:$customer->postcode}}"
		>
		<hr>
		
		<label for="telefoon"
		>Telefoon:</label>
		<input type="text"
					 name="telefoon"
					 placeholder="Telefoon"
					 value="{{ old('telefoon') ?:$customer->telefoon}}"
		>
		<hr>
		
		<label for="mobiel"
		>Mobiel:</label>
		<input type="text"
					 name="mobiel"
					 placeholder="Mobiel"
					 value="{{ old('mobiel') ?:$customer->mobiel}}"
		>
		<hr>
		
		<button type="submit"
		>Update
		</button>
	</form>
@endsection
