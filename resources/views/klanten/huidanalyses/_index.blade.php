<div data-controller="huidanalyses"
     data-huidanalyses-store="{{ route('huidanalyses.store', $customer, false) }}"
     data-huidanalyses-index="{{ route('huidanalyses.index', $customer, false) }}"
>
	<div class="pb-10">
		@include('klanten.huidanalyses.create')
		@include('klanten.huidanalyses._list')
	</div>
</div>
