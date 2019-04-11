@if (count($notes) === 0)
	<div data-controller="monthyear"
	     data-target="notes.monthyear monthyear.monthyear"
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
	@foreach ($notes as $note)
		@include('klanten.notes.show',[$note])
	@endforeach
</div>