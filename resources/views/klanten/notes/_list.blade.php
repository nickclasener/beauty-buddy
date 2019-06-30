<div data-target="notes.list">
	<div data-controller="monthyear"
	     data-target="notes.monthyear monthyear.monthyear"
	></div>
	@foreach ( monthYear($notes) as $monthYear => $notes )
		<div data-controller="monthyear"
		     data-target="notes.monthyear monthyear.monthyear"
		>
			<h2 class="font-hairline text-teal-500">
				{{ $monthYear }}</h2>
			@foreach ($notes as $note)
				@include('klanten.notes.show',[$note])
			@endforeach
		</div>
	@endforeach
</div>
