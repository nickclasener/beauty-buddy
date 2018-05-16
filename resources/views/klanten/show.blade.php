@extends('layouts.app')

@section('content')
	
	@include('notes.create')
	
	<button>
		Delete
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
	
	@if($customer->notes != null)
		@include('notes.show')
	@endif
	
	@if($customer->intake != null)
		@include('klanten._intake')
	@endif
@endsection
