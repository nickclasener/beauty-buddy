<div data-target="dailyadvices.list">
	<div data-controller="monthyear"
	     data-target="dailyadvices.monthyear monthyear.monthyear"
	></div>
	@foreach ( monthYear($dailyAdvices) as $monthYear => $dailyAdvices )
		<div data-controller="monthyear"
		     data-target="dailyadvices.monthyear monthyear.monthyear"
		>
			<h2 class="font-hairline text-buddy-teal pt-10">
				{{ $monthYear }}</h2>
			@foreach ( $dailyAdvices as $dailyAdvice )
				@include('klanten.dailyadvice.show',[ $dailyAdvice ])
			@endforeach
		</div>
	@endforeach
</div>
