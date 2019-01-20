@include('notes.create')
<div class="pt-10">
	@foreach($customer->monthYearNotes() as $monthYear => $notes)
		<div id="monthYear"
		>
			<h2 class="font-hairline text-buddy-teal pb-10"
			>{{ $monthYear }}</h2>
			@foreach($notes as $note)
				<div class="w-full flex-shrink flex pt-5 pl-5"
						 id="note"
				>
					<div class="w-2.5 h-2.5 border border-buddy-teal  rounded-full flex-no-shrink"></div>
					<p class="ml-5 font-thin flex-no-shrink">{{ dayMonth($note) }}</p>
					<div class="ml-5 w-full">
						@include('notes.show')
					</div>
				</div>
			@endforeach
		</div>
	@endforeach
</div>
