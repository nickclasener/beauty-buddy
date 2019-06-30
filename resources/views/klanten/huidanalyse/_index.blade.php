<div data-controller="autocomplete2"
     data-autocomplete2-url="{{ route('huidanalyse.search', $customer, false) }}"
>
	<div data-controller="huidanalyses"
	     data-huidanalyses-store="{{ route('huidanalyse.store', $customer, false) }}"
	     data-huidanalyses-index="{{ route('huidanalyse.index', $customer, false) }}"
	>
		<div class="pb-10">
			@include('klanten.huidanalyse.create')
			@include('layouts._search-bar-submenu',[
			'route'=>'huidanalyse',
			'placeholder'=>'Spelling? Zoek in Huidanalyses...'
			])
			@include('klanten.huidanalyse._list')
		</div>
	</div>
</div>
