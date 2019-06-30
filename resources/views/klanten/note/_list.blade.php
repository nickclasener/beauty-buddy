<div data-target="{{ $route }}s.list">
	<div data-controller="monthyear"
	     data-target="{{ $route }}.monthyear monthyear.monthyear"
	></div>
	@foreach ( monthYear($models) as $monthYear => $model )
		<div data-controller="monthyear"
		     data-target="{{ $route }}s.monthyear monthyear.monthyear"
		>
			<h2 class="font-hairline text-teal-500">
				{{ $monthYear }}</h2>
			@foreach ($models as $model)
				@include('klanten.'.$route.'.show' )
			@endforeach
		</div>
	@endforeach
</div>
