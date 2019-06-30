<div data-controller="autocomplete2"
     data-autocomplete2-url="{{ route($stimulusJs.'.search', $customer, false) }}"
>
	<div data-controller="{{ $stimulusJs }}s"
	     data-{{ $stimulusJs }}s-store="{{ route($stimulusJs.'.store', $customer, false) }}"
	     data-{{ $stimulusJs }}s-index="{{ route($stimulusJs.'.index', $customer, false) }}"
	>
		<div class="pb-4 pt-8">
			@include('klanten.note.create')
			@include('layouts._search-bar-submenu')
			@include('klanten.note._list')
		</div>
	</div>
</div>
