@extends('layouts.main')
@section('main')
	<div class="w-full mt-16">
		<div class=" bg-white  shadow-md">
			@foreach ($customers as $customer)
				<div class="p-1 border-b border-dashed">
					<a href="{{ route('note.index', $customer, false) }}"
					   class="hover:bg-teal-200 hover:text-teal-500 "
					>
						<p class="hover:bg-teal-200 hover:text-teal-500 ">{{ $customer->naam }}  {{ $customer->email }}  {{ $customer->mobiel }}  {{ $customer->telefoon }}</p>
					</a>
				</div>
			@endforeach
		</div>
	</div>
@endsection
