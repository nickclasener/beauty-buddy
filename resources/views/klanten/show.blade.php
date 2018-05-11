@extends('layouts.app')

@section('content')
	Voeg een nieuwe notitie toe
	<div data-controller="notes"
			 data-notes-url="{{$customer->notesBasePath()}}"
			 data-notes-customerurl="{{$customer->path()}}"
	>
		<label for="body"
		>Notitie:</label>
		<br>
		<textarea type="text"
							rows="5"
							name="body"
							placeholder="Hoe is de behandeling gegaan? Zijn er veder noemenswaardigheden"
							value="{{ old('body') }}"
							data-target="notes.body"
							required
		></textarea>
		<span data-target="notes.errorBody"></span>
		<hr>
		<label for="date"
		>Datum:</label>
		<input type="date"
					 name="date"
					 placeholder="dd-mm-yyyy"
					 value="{{ old('date') }}"
					 data-target="notes.date"
					 required
		>
		<span data-target="notes.errorDate"></span>
		<hr>
		
		<button type="submit"
						data-action="click->notes#addNote"
		>Voeg Notitie Toe
		</button>
	</div>
	
	
	<button data-controller="customer"
					data-customer-url="{{$customer->path()}}"
					data-action="click->customer#deleteCustomer"
	>Delete
	</button>
	<a href="{{ $customer->path() }}/edit"
	>edit
	</a>
	<p>{{$customer->naam}}</p>
	<p>{{$customer->email}}</p>
	<p>{{$customer->telefoon}}</p>
	<p>{{$customer->mobiel}}</p>
	<p>{{$customer->geboortedatum}}</p>
	<p>{{$customer->adres}}</p>
	<p>{{$customer->huisnummer}}</p>
	<p>{{$customer->postcode}}</p>
	<p>{{$customer->plaats}}</p>
	
	@include('notes.show')
	
	@if($customer->intake != null)
		@include('klanten._intake')
	@endif
@endsection
