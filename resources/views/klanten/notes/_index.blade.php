<div data-controller="autocomplete"
     data-autocomplete-url="{{ route('notes.search',$customer,false) }}"
>
	<form action="{{ route('notes.search',$customer,false) }}">
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
	<div class="flex items-center flex-grow ">
		@svg('icon-111-search', ['class'=>'fill-current inline-block w-5 h-5'])
		<input type="text"
		       class="ml-1 w-full"
		       data-target="autocomplete.input"
		       placeholder="Zoek Klant..."
		/>
		<input type="hidden"
		       name="q"
		       value="{{ request('q') }}"
		       data-target="autocomplete.hidden"
		/>
	</div>
	{{--	<div class="container mx-auto h-full flex items-center w-full">--}}
	{{--		<ul class="list-reset bg-white flex-grow p-6"--}}
	{{--		    data-target="autocomplete.results"--}}
	{{--		></ul>--}}
	{{--		<div class="list-reset bg-white flex-grow p-6"--}}
	{{--		     data-target="autocomplete.results"--}}
	{{--		></div>--}}
	{{--	</div>--}}
	<div data-controller="notes"
	     data-notes-store="{{ route('notes.store', $customer, false) }}"
	     data-notes-index="{{ route('notes.index', $customer, false) }}"
	>
		<div class="pb-10">
			@include('klanten.notes.create')
			<div data-target="autocomplete.results">
			</div>
			@include('klanten.notes._list')
		</div>
	</div>
</div>
