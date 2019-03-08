<div data-controller="huidanalyses"
     data-huidanalyses-url="{{ route('huidanalyses.store', $customer, false) }}"
>
	@include('klanten.huidanalyses.create')
	<div class="pt-10">
		@foreach ($customer->monthYearHuidanalyses() as $monthYear => $huidanalyses)
			<div data-controller="monthyear"
			     data-target="monthyear.monthyear"
			>
				<h2 class="font-hairline text-buddy-teal pb-10"
				>{{ $monthYear }}</h2>
				@foreach ($customer->huidanalyses as $huidanalyse)
					@include('klanten.huidanalyses.show',[$huidanalyse])
				@endforeach
			</div>
		@endforeach
	</div>
</div>