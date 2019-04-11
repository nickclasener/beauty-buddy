<div data-controller="dailyadvices"
     data-dailyadvices-store="{{ route('dailyadvice.store', $customer, false) }}"
     data-dailyadvices-index="{{ route('dailyadvice.store', $customer, false) }}"
>
	<div class="pb-10">
		@include('klanten.dailyadvice.create')
		@include('klanten.dailyadvice._list')
	</div>
</div>
