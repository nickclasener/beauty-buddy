<div data-controller="autocomplete2"
     data-autocomplete2-url="{{ route('huidanalyses.search', $customer, false) }}"
>
	<div data-controller="huidanalyses"
	     data-huidanalyses-store="{{ route('huidanalyses.store', $customer, false) }}"
	     data-huidanalyses-index="{{ route('huidanalyses.index', $customer, false) }}"
	>
		<div class="pb-10">
			@include('klanten.huidanalyses.create')
			<div class="flex items-center flex-grow pt-10">
				@svg('icon-111-search', ['class'=>'fill-current inline-block w-8 h-8'])
				<input type="text"
				       class="ml-2 w-full"
				       data-target="autocomplete2.input"
				       placeholder="Zoek Huidanalyse..."
				       name="q"
				       value="{{ request('q') }}"
				/>
			</div>

			<div data-target="autocomplete2.results"
			     class="shadow-lg px-10 pb-10"
			     hidden
			>
			</div>
			@include('klanten.huidanalyses._list')
		</div>
	</div>
</div>
