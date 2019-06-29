<div data-controller="autocomplete2"
     data-autocomplete2-url="{{ route('huidanalyses.search', $customer, false) }}"
>
	<div data-controller="huidanalyses"
	     data-huidanalyses-store="{{ route('huidanalyses.store', $customer, false) }}"
	     data-huidanalyses-index="{{ route('huidanalyses.index', $customer, false) }}"
	>
		<div class="pb-10">
			@include('klanten.huidanalyses.create')
			@include('layouts._search-bar-submenu',[
			'route'=>'huidanalyses.search',
			'placeholder'=>'Spelling? Zoek in Huidanalyses...'
			])
			@include('klanten.huidanalyses._list')
		</div>
	</div>
</div>
