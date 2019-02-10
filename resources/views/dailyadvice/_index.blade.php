<div data-controller="notes"
		{{--     data-notes-url="{{ route('notities.store',$customer) }}"--}}
>
	@include('dailyadvice.create')
	<div class="pt-10">
		@foreach ( $customer->monthYearDailyAdvices() as $monthYear => $dailyAdvices )
			<div data-controller="monthyear"
			     data-target="monthyear.monthyear"
			>
				<h2 class="font-hairline text-buddy-teal pb-10"
				>{{ $monthYear }}</h2>
				@foreach ( $dailyAdvices as $dailyAdvice )
					@include('dailyadvice.show',[ $dailyAdvice ])
				@endforeach
			</div>
		@endforeach
	</div>
</div>
