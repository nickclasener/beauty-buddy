<div data-target="{{ $stimulusJs }}s.list">
	<div data-controller="monthyear"
	     data-target="{{ $stimulusJs }}s.monthyear monthyear.monthyear"
	></div>
	@foreach ( monthYear($models) as $monthYear => $models )
		<div data-controller="monthyear"
		     data-target="{{ $stimulusJs }}s.monthyear monthyear.monthyear"
		>
			<h2 class="font-hairline text-teal-500">{{ $monthYear }}</h2>
			@foreach ( $models as $model)
				@include('klanten.note.show' )
			@endforeach
		</div>
	@endforeach
</div>
