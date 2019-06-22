<div data-controller="autocomplete2"
     data-autocomplete2-url="{{ route('dailyadvice.search', $customer, false) }}"
>
	<div data-controller="dailyadvices"
	     data-dailyadvices-store="{{ route('dailyadvice.store', $customer, false) }}"
	     data-dailyadvices-index="{{ route('dailyadvice.store', $customer, false) }}"
	>
		<div class="pb-10">
			@include('klanten.dailyadvice.create')
			<form action="{{ route('dailyadvice.search', $customer, false) }}">
				@method('get')@csrf
				<div class="form-group">
					<input
							type="text"
							name="q"
							class="form-control"
							placeholder="Search..."
							value="{{ request('q') }}"
					/>
					<button type="submit">send</button>
				</div>
			</form>
			<div class="flex items-center flex-grow pt-10">
				@svg('icon-111-search', ['class'=>'fill-current inline-block w-8 h-8'])
				<input type="text"
				       class="ml-2 w-full"
				       data-target="autocomplete2.input"
				       placeholder="Zoek Product Advies..."
				       name="q"
				       value="{{ request('q') }}"
				/>
			</div>

			<div data-target="autocomplete2.results"
			     class="shadow-lg px-10 pb-10"
			     hidden
			>
			</div>
			@include('klanten.dailyadvice._list')
		</div>
	</div>
</div>
