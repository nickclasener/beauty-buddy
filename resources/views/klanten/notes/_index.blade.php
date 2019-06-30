<div data-controller="autocomplete2"
     data-autocomplete2-url="{{ route('notes.search', $customer, false) }}"
>
	<div data-controller="notes"
	     data-notes-store="{{ route('notes.store', $customer, false) }}"
	     data-notes-index="{{ route('notes.index', $customer, false) }}"
	>
		<div class="pb-4 pt-8">
			@include('klanten.notes.create')
			@include('layouts._search-bar-submenu',['route'=>'notes.search','placeholder'=>'Zoek in Notities...'])
			@include('klanten.notes._list')
		</div>
	</div>
</div>
