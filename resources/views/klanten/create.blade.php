@extends('layouts.app')

@section('content')
	Voeg een nieuwe klant toe
	<div data-controller="customer">
		<form action="/klanten"
					method="post"
		>{{ csrf_field() }}
			
			<label for="naam"
			>Naam:</label>
			<input type="text"
						 name="naam"
						 placeholder="Naam"
						 value="{{ old('naam') }}"
						 data-target="customer.naam"
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
			
			<label for="email"
			>Email:</label>
			<input type="text"
						 name="email"
						 placeholder="Email"
						 value="{{ old('email') }}"
						 required
			>
			<hr>
			
			<label for="straatnaam"
			>Straatnaam:</label>
			<input type="text"
						 name="straatnaam"
						 placeholder="Straatnaam"
						 value="{{ old('straatnaam') }}"
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
			>Voeg Toe
			</button>
			
			@if (count($errors))
				@foreach($errors->all() as $error)
					<ul class="alert alert-danger">
						<li>{{ $error }}</li>
					</ul>
				@endforeach
			@endif
		</form>
	</div>
@endsection