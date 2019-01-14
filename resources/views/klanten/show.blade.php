@extends('layouts.app')

@section('content')
	
	@if($customer->intake == null)
		<a href="{{ route('intake.create',$customer) }}">
			Neem een intake af
		</a>
		<hr>
	@endif
	
	@include('notes.create')
	
	<form action="{{route('klanten.destroy',$customer)}}"
				method="POST"
	>
		@method('DELETE')@csrf
		<button type="submit">Delete</button>
	</form>
	<a href="{{route('klanten.edit',$customer)}}"
	>edit
	</a>
	<p>{{$customer->naam}}</p>
	<p>{{$customer->email}}</p>
	<p>{{$customer->telefoon}}</p>
	<p>{{$customer->mobiel}}</p>
	<p>{{$customer->geboortedatum}}</p>
	<p>{{$customer->straatnaam}}</p>
	<p>{{$customer->huisnummer}}</p>
	<p>{{$customer->postcode}}</p>
	<p>{{$customer->plaats}}</p>
	
	<hr>
	
	@if($customer->notes != null)
		@include('notes.show')
	@endif
	
	@if($customer->intake != null)
		@include('intake.show')
	@endif
@endsection
