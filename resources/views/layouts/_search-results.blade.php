<div class="absolute flex text-left w-full">
	<div class="relative h-full mt-6  px-2 pb-2 bg-white border  w-full z-10 shadow-lg">
		<div class="flex flex-col h-full">
			@foreach ( $customers as $customer )
				<div data-autocomplete-href="{{ route('note.index', $customer, false) }}"
				     data-autocomplete-value="{{ $customer->id }}"
				     role="option"
				     @if ( $loop->first )
				     class="flex items-baseline mt-2 py-2 px-2 hover:bg-teal-100 cursor-pointer border-b"
				     @if ( $loop->last )
				     class="flex items-baseline py-2 px-2 hover:bg-teal-100 cursor-pointer "
				     @else
				     class="flex items-baseline py-2 px-2 border-b hover:bg-teal-100 cursor-pointer"
						@endif
				>
					@isset( $customer->highlight->naam[0] )
						<span class="flex-1">{!! $customer->highlight->naam[0] !!}</span>
					@else
						<span class="flex-1 flex-no-wrap">{{ $customer->naam }}</span>
					@endisset
				</div>
			@endforeach
		</div>
	</div>
</div>
