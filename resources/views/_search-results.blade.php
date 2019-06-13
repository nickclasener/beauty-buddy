@foreach ($customers as $customer)
	<li role="option"
	    data-autocomplete-value="1"
	>
		<a href="{{ route('notes.index', $customer, false) }}">
			<p>{{ $customer->naam }} | {{ $customer->email }} | {{ $customer->mobiel }} | {{ $customer->telefoon }}</p>
		</a>
	</li>
@endforeach
