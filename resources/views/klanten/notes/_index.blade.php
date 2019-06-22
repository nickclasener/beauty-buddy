<div data-controller="autocomplete2"
     data-autocomplete2-url="{{ route('notes.search', $customer, false) }}"
>
	<div data-controller="notes"
	     data-notes-store="{{ route('notes.store', $customer, false) }}"
	     data-notes-index="{{ route('notes.index', $customer, false) }}"
	>
		<div class="pb-10">
			@include('klanten.notes.create')
			{{-- FIXME: DELETE--}}
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
			<div class="flex items-center flex-grow pt-10">
				@svg('icon-111-search', ['class'=>'fill-current inline-block w-8 h-8'])
				<input type="text"
				       class="ml-1 w-full"
				       placeholder="Zoek Notitie..."
				       data-target="autocomplete2.input"
				       {{--				/>--}}
				       {{--				<input type="hidden"--}}
				       name="q"
				       value="{{ request('q') }}"
						{{--				       data-target="autocomplete2.hidden"--}}
				/>
			</div>

			<div data-target="autocomplete2.results"
			     class="shadow-lg px-10 pb-10"
			     hidden
			>
			</div>
			@include('klanten.notes._list')
		</div>
	</div>
</div>
