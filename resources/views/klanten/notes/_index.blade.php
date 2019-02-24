<div data-controller="notes"
     data-notes-url="{{ route('notities.store',$customer) }}"
>
	@include('klanten.notes.create')
	<div class="pt-10">
		@foreach ($customer->monthYearNotes() as $monthYear => $notes)
			<div data-controller="monthyear"
			     data-target="monthyear.monthyear"
			>
				<h2 class="font-hairline text-buddy-teal pb-10"
				>{{ $monthYear }}</h2>
				@foreach ($notes as $note)
					@include('klanten.notes.show',[$note])
				@endforeach
			</div>
		@endforeach
	</div>
</div>
