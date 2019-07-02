@extends('layouts.main')

@section('main')
	<div class=" bg-white gap gap-y-2 p-4">
		@foreach ($customers as $customer)
			<div>
				<a href="{{ route('note.index', $customer, false) }}"
				   class="hover:bg-teal-200 hover:text-teal-500"
				>
					<p class="">{{ $customer->naam }}  {{ $customer->email }}  {{ $customer->mobiel }}  {{ $customer->telefoon }}</p>
				</a>
			</div>
		@endforeach
	</div>
@endsection
