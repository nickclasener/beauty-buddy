<div data-target="huidanalyses.list">
	@if (count($huidanalyses) === 0)
		<div data-controller="monthyear"
		     data-target="huidanalyses.monthyear monthyear.monthyear"
		></div>
	@endif
	@foreach (monthYearDesc($huidanalyses) as $monthYear => $huidanalyses)
		<div id="monthyear"
		     data-controller="monthyear"
		     data-target="huidanalyses.monthyear monthyear.monthyear"
		>
			<h2 class="font-hairline text-buddy-teal pt-10 "
			    data-target="monthyear.content"
			>{{ $monthYear }}</h2>
			@foreach ($huidanalyses as $huidanalyse)
				@include('klanten.huidanalyses.show',[$huidanalyse])
			@endforeach
		</div>
	@endforeach
</div>
