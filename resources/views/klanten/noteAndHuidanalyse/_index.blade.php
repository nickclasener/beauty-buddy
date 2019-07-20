<div data-controller="autocomplete2"
     data-autocomplete2-url="{{ route($stimulusJs.'.search', $customer, false) }}"
>
	<div data-controller="{{ $stimulusJs }}s"
	     data-{{ $stimulusJs }}s-store="{{ route($stimulusJs.'.store', $customer, false) }}"
	     data-{{ $stimulusJs }}s-index="{{ route($stimulusJs.'.index', $customer, false) }}"
	>
		<div class="pb-4 pt-4">
			@include('klanten.noteAndHuidanalyse.create')
			@include('layouts._search-bar-submenu')
			@include('klanten.noteAndHuidanalyse._list')
		</div>
	</div>
</div>
