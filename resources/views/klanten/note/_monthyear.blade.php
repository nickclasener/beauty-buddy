@if (count($models) === 0)
	<div data-controller="monthyear"
	     data-target="{{ $stimulusJs }}s.monthyear monthyear.monthyear"
	></div>
@endif
<div id="monthyear"
     data-controller="monthyear"
     data-monthyear-created="{{ true }}"
     data-target="monthyear.monthyear"
>
	<h2 class="font-hairline text-buddy-teal pt-10 ">
		{{ $monthYear }}
	</h2>
	@foreach ($models as $model)
		@include('klanten.'.$stimulusJs.'.show')
	@endforeach
</div>
