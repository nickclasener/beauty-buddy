@foreach ($customers as $customer)
	{{--	<div role="option"--}}
	<li
	>
		<a href="{{ route('notes.index', $customer, false) }}"
		   role="option"
		   data-autocomplete-value="1"
		>

			<p class="flex justify-between">
				@isset(   $customer->highlight->naam[0])
					<span>{!! $customer->highlight->naam[0] !!}</span>
				@else
					<span>{{ $customer->naam }}</span>
				@endisset
				<span>{{ $customer->email }}</span>
				<span>{{ $customer->mobiel }}</span>
				<span>{{ $customer->telefoon }}</span>
			</p>
		</a>
		{{--		</div>--}}
	</li>
@endforeach
