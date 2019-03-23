<div data-target="notes.list">
	@if (count($notes) === 0)
		<div data-controller="monthyear"
		     data-target="notes.monthyear monthyear.monthyear"
		></div>
	@endif
	@foreach (monthYearDesc($notes) as $monthYear => $notes)
		<div id="monthyear"
		     data-controller="monthyear"
		     data-target="notes.monthyear monthyear.monthyear"
		>
			<h2 class="font-hairline text-buddy-teal pt-10 "
			    data-target="monthyear.content"
			>{{ $monthYear }}</h2>
			@foreach ($notes as $note)
				@include('klanten.notes.show',[$note])
			@endforeach
		</div>
	@endforeach
</div>
