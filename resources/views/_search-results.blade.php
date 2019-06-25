<div class="absolute flex text-left w-full">
	<div class="relative h-full mt-6 py-1 px-3 bg-white border rounded-one w-full z-10">
		<div class="flex flex-col h-full">
			@foreach ( $customers as $customer )
				<div data-autocomplete-href="{{ route('notes.index', $customer, false) }}"
				     data-autocomplete-value="{{ $customer->id }}"
				     role="option"
				     @if ($loop->last)
				     class="flex items-baseline py-2 hover:bg-teal-300 cursor-pointer "
				     @else
				     class="flex items-baseline py-2 border-b hover:bg-teal-300 cursor-pointer"
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
