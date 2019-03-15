<div data-controller="notes"
     data-notes-url="{{ route('notities.store', $customer, false) }}"
     data-notes-index="{{ route('notities.index', $customer, false) }}"
		{{--     data-notes-grow="{{  !array_first($customer->notes) ? 'true' : 'false' }}"--}}

>
	<div class="pb-10">
		@include('klanten.notes.create')
		@include('klanten.notes._list')
	</div>
</div>
