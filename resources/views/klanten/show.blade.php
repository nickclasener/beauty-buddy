@extends('layouts.app')

@section('content')
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
	
	@if($customer->notes != null)
		@include('klanten._notes')
	@endif
	
	@if($customer->intake != null)
		@include('klanten._intake')
	@endif
@endsection
