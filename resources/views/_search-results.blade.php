@foreach ( $customers as $customer )
	<div data-complete-href="{{ route('notes.index', $customer, false) }}"
	     data-autocomplete-value="{{ $customer->id }}"
	     role="option"
	>
						@isset( $customer->highlight->naam[0] )
							<span>{!! $customer->highlight->naam[0] !!}</span>
						@else
							<span>{{ $customer->naam }}</span>
						@endisset
	</div>
	{{--	<li>--}}
	{{--		<a href="{{ route('notes.index', $customer, false) }}"--}}
	{{--		   data-autocomplete-value="{{ $customer->id }}"--}}
	{{--		   role="option"--}}
	{{--		>--}}
	{{--			<p class="flex justify-between">--}}
	{{--				@isset( $customer->highlight->naam[0] )--}}
	{{--					<span>{!! $customer->highlight->naam[0] !!}</span>--}}
	{{--				@else--}}
	{{--					<span>{{ $customer->naam }}</span>--}}
	{{--				@endisset--}}
	{{--				<span>{{ $customer->email }}</span>--}}
	{{--				<span>{{ $customer->mobiel }}</span>--}}
	{{--				<span>{{ $customer->telefoon }}</span>--}}
	{{--			</p>--}}
	{{--		</a>--}}
	{{--	</li>--}}
@endforeach

