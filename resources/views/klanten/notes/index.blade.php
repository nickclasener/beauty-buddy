@extends('klanten.show')
@section('content')
	<div data-controller="notes"
	     data-target="notes.notes"
	     data-notes-url="{{ route('notities.store', $customer, false) }}"
	>
		{{--data-notes-exist="{{  !array_first($customer->notes) ? 'true': 'false' }}">--}}
		{{--		data-notes-exist="{{  array_first($customer->notes)  }}">--}}
		<div class="pb-10">
			@include('klanten.notes.create')
			@include('klanten.notes._list')

		</div>
	</div>
@stop
