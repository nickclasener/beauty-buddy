<div data-target="{{ $stimulusJs }}s.list"
     class="list px-4"
     data-controller="infinitescroll"
     data-action="scroll@window->infinitescroll#next"
>
	<!-- pagination has path -->
	<p class="pagination">
		<a class="pagination__next"
		   href="{{ $models->nextPageUrl() }}"
		></a>
	</p>
	<div data-controller="monthyear"
	     @isset( $monthyearCreated )
	     data-monthyear-created="{{ true }}"
	     @endisset
	     data-target="{{ $stimulusJs }}s.monthyear monthyear.monthyear"
	>
	</div>
	@foreach ( monthYear($models) as $monthYear => $models )
		@include('klanten.noteAndHuidanalyse._monthyear')
	@endforeach
</div>
{{--<!-- status elements -->--}}
<div class="flex justify-center pb-4">
	<p>
		...
	</p>
</div>



