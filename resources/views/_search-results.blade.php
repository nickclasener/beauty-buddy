@foreach ($customers as $customer)
	<div role="option"
	     {{--	<li role="option"--}}
	     data-autocomplete-value="1"
	>
		<a href="{{ route('notes.index', $customer, false) }}">
			<p class="flex justify-between">
				<span>{{ $customer->naam }}</span>
				<span>{{ $customer->email }}</span>
				<span>{{ $customer->mobiel }}</span>
				<span>{{ $customer->telefoon }}</span>
			</p>
		</a>
	</div>
	{{--	</li>--}}
@endforeach
