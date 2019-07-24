<div data-controller="monthyear"
     class="pt-4 append-list"
     @isset( $monthyearCreated )
     data-monthyear-created="{{ true }}"
     @endisset
     data-target="monthyear.monthyear"
>
	<h2 class="font-hairline text-teal-500">{{ monthYearFormat($dailyAdvice) }}</h2>
	@foreach ($dailyAdvices as $dailyAdvice)
		@include('klanten.dailyadvice.show')
	@endforeach
</div>
