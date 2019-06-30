<div data-controller="autocomplete2"
     data-autocomplete2-url="{{ route($route.'.search', $customer, false) }}"
>
	<div data-controller="{{ $route }}s"
	     data-notes-store="{{ route($route.'.store', $customer, false) }}"
	     data-notes-index="{{ route($route.'.index', $customer, false) }}"
	>
		<div class="pb-4 pt-8">
			@include('klanten.'.$route.'.create')
			@include('layouts._search-bar-submenu',['route'=>$route,'placeholder'=>'Zoek in Notities...'])
			@include('klanten.'.$route.'._list')
		</div>
	</div>
</div>
