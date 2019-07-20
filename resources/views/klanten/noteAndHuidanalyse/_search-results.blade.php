<div data-target="{{ $stimulusJs }}s.list">
	<div data-controller="monthyear"
	     data-target="{{ $stimulusJs }}s.monthyear monthyear.monthyear"
	></div>
	@foreach ( monthYear($models) as $monthYear => $models )
		@include('klanten.noteAndHuidanalyse._monthyear')
	@endforeach
</div>

