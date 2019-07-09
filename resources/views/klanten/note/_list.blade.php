<div data-target="{{ $stimulusJs }}s.list"
     class="list"
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
	     class="pt-4"
	     @isset( $monthyearCreated )
	     data-monthyear-created="{{ true }}"
	     @endisset
	     data-target="{{ $stimulusJs }}s.monthyear monthyear.monthyear"
	>
	</div>
	@foreach ( monthYear($models) as $monthYear => $models )
		@include('klanten.note._monthyear')
	@endforeach
</div>
{{--<!-- status elements -->--}}
<div class="flex justify-center"
>
	<p>
		...
	</p>
</div>



