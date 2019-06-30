<div data-controller="autocomplete2"
     data-autocomplete2-url="{{ route('huidanalyse.search', $customer, false) }}"
>
	<div data-controller="huidanalyses"
	     data-huidanalyses-store="{{ route('huidanalyse.store', $customer, false) }}"
	     data-huidanalyses-index="{{ route('huidanalyse.index', $customer, false) }}"
	> Who are you. Mijn naam is nick ik kom uit de achterhoek geleden in Gelderland.
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
