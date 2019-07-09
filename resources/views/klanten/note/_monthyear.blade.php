<div data-controller="monthyear"
     class="pt-4 append-list"
     @isset( $monthyearCreated )
     data-monthyear-created="{{ true }}"
     @endisset
     data-target="monthyear.monthyear"
>
	<h2 class="font-hairline text-teal-500">{{ $monthYear }}</h2>
	@foreach ($models as $model)
		@include('klanten.note.show')
	@endforeach
</div>
