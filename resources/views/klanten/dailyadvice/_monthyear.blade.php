@if (count($dailyAdvices) === 0)
	<div data-controller="monthyear"
	     data-target="dailyadvices.monthyear monthyear.monthyear"
	></div>
@endif
<div id="monthyear"
     data-controller="monthyear"
     data-monthyear-created="{{ true }}"
     data-target="monthyear.monthyear"
>
	<h2 class="font-hairline text-buddy-teal pt-10">
		{{ $monthYear }}
	</h2>
	@foreach ($dailyAdvices as $dailyAdvice)
		@include('klanten.dailyadvice.show',[$dailyAdvice])
	@endforeach
</div>