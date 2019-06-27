<div data-target="huidanalyses.list">
	<div data-controller="monthyear"
	     data-target="huidanalyses.monthyear monthyear.monthyear"
	></div>
	@foreach ( monthYear($huidanalyses) as $monthYear => $huidanalyses )
		<div
				data-controller="monthyear"
				data-target="huidanalyses.monthyear monthyear.monthyear"
		>
			<h2 class="font-hairline text-buddy-teal pt-10"
			>{{ $monthYear }}</h2>
			@foreach ($huidanalyses as $huidanalyse)
				@include('klanten.huidanalyses.show',[$huidanalyse])
			@endforeach
		</div>
	@endforeach
</div>
