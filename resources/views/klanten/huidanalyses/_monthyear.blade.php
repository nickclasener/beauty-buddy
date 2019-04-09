@if (count($huidanalyses) === 0)
	<div data-controller="monthyear"
	     data-target="huidanalyses.monthyear monthyear.monthyear"
	></div>
@endif
<div id="monthyear"
     data-controller="monthyear"
     data-monthyear-created="{{ true }}"
     data-target="monthyear.monthyear"
>
	<h2 class="font-hairline text-buddy-teal pt-10 "
	    data-target="monthyear.content"
	>
		{{ $monthYear }}
	</h2>
	@foreach ($huidanalyses as $huidanalyse)
		@include('klanten.huidanalyses.show',[$huidanalyse])
	@endforeach
</div>