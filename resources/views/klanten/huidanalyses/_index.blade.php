<div data-controller="huidanalyses">
	<div class="pb-10">
		@include('klanten.huidanalyses.create')
		@foreach ($customer->monthYearHuidanalyses() as $monthYear => $huidanalyses)
			<h2 class="font-hairline text-buddy-teal pb-10"
			    {{--data-controller="monthyear"--}}
			    {{--data-target="monthyear.monthyear"--}}
			    data-target="huidanalyses.monthyear"
			>{{ $monthYear }}</h2>
			@foreach ($huidanalyses as $huidanalyse)
				@include('klanten.huidanalyses.show',$huidanalyse)
			@endforeach
		@endforeach
	</div>
</div>