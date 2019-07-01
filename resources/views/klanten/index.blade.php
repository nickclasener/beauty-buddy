@extends('layouts.main')

@section('main')
	{{--	{{ $image }}--}}
	<div class="p-4 bg-white ">
		@foreach ($customers as $customer)
			<a href="{{ route('note.index', $customer, false) }}">
				<p class="">{{ $customer->naam }}  {{ $customer->email }}  {{ $customer->mobiel }}  {{ $customer->telefoon }}</p>
			</a>
			<hr class="border-b">
		@endforeach
	</div>
@endsection
