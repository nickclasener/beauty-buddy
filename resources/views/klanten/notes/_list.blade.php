<div data-target="notes.list">
	@foreach (monthYearDesc($customer->notes) as $monthYear => $notes)
		<div data-controller="monthyear"
		     data-target="monthyear.monthyear"
		>
			<h2 class="font-hairline text-buddy-teal pt-10 "
			    data-target="monthyear.content"
			>
				{{ $monthYear }}
			</h2>
			@foreach ($notes as $note)
				@include('klanten.notes.show',[$note])
			@endforeach
		</div>
	@endforeach
</div>
{{--</div>--}}
{{--</div>--}}
