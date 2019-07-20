<div data-controller="autocomplete2"
     data-autocomplete2-url="{{ route('dailyadvice.search', $customer, false) }}"
>
	<div data-controller="dailyadvices"
	     data-dailyadvices-store="{{ route('dailyadvice.store', $customer, false) }}"
	     data-dailyadvices-index="{{ route('dailyadvice.store', $customer, false) }}"
	>
		<div class="pb-4 pt-4">
			@include('klanten.dailyadvice.create')
			@include('layouts._search-bar-submenu',[
			'route'=>'noteAndHuidanalys',
			'placeholder'=>'Zoek Product Advies...'
			])
			@include('klanten.dailyadvice._list')
		</div>
	</div>
</div>
