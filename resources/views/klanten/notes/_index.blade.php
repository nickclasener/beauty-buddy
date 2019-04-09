<div data-controller="notes"
     data-notes-url="{{ route('notes.store', $customer, false) }}"
     data-notes-index="{{ route('notes.index', $customer, false) }}"
>
	<div class="pb-10">
		@include('klanten.notes.create')
		@include('klanten.notes._list')
	</div>
</div>
