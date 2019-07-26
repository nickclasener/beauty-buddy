<div data-target="dailyadvices.list">
	<div data-controller="monthyear"
	     data-target="dailyadvices.monthyear monthyear.monthyear"
	></div>
	@foreach ( monthYear($dailyAdvices) as $monthYear => $dailyAdvices )
		@include('klanten.dailyadvice._monthyear')
	@endforeach
</div>

