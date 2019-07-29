<div data-target="dailyadvices.list"
     class="list"
     data-controller="infinitescroll"
     data-action="scroll@window->infinitescroll#next"
>
	<!-- pagination has path -->
	<p class="pagination">
		<a class="pagination__next"
		   href="{{ $dailyAdvices->nextPageUrl() }}"
		></a>
	</p>
	<div data-controller="monthyear"
	     @isset( $monthyearCreated )
	     data-monthyear-created="{{ true }}"
	     @endisset
	     data-target="dailyadvices.monthyear monthyear.monthyear"
	>
	</div>
	@foreach ( monthYear($dailyAdvices) as $monthYear => $dailyAdvices )
		@include('klanten.dailyadvice._monthyear')
	@endforeach
</div>
{{--<!-- status elements -->--}}
<div class="flex justify-center">
	<p>
		...
	</p>
</div>
