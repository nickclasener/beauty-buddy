@extends('layouts.app')

@section('content')

	@foreach ($customers as $customer)
		<a href="{{ route('notities.index', $customer, false) }}">
			<p>{{ $customer->naam }} | {{ $customer->email }} | {{ $customer->mobiel }} | {{ $customer->telefoon }}</p>
		</a>
		<hr class="border-b">
	@endforeach

@endsection
