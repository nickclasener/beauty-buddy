<div data-controller="dailyadvice toggle textarea"
     data-target="dailyadvices.dailyadvice dailyadvice.dailyadvice"
     data-dailyadvice-update="{{ route('dailyadvice.update', $dailyAdvice, false) }}"
     data-dailyadvice-destroy="{{ route('dailyadvice.destroy', $dailyAdvice, false) }}"
     @isset( $dailyAdviceCreated)
     data-dailyadvice-created="{{ true }}"
     @endif
     @isset($searched)
     role="option"
     data-autocomplete2-value="{{ $dailyAdvice->id }}"
     data-action="click->autocomplete2#goto"
     data-autocomplete2-goto="{{ $dailyAdvice->id }}"
		@endisset
>
	<div class="w-full flex-shrink flex pt-4 pl-4">
		<div class="mt-1.5 w-2.5 h-2.5 border border-teal-400 rounded-full flex-shrink-0"></div>
		<p class="ml-4 font-thin w-16 align-baseline flex-no-shrink">{{ dayMonth($dailyAdvice) }}</p>
		<a class="ml-4 w-full cursor-pointer"
		   data-action="click->toggle#toggle click->textarea#grow click->textarea#focus"
		   data-target="toggle.show"
		>
			@isset( $dailyAdvice->morning )
				<h3 class="font-hairline">
					Ochtend:
				</h3>
				@isset( $dailyAdvice->highlight->morning[0] )
					<div class="border-b">
						<span>{!! $dailyAdvice->highlight->morning[0] !!}</span>
					</div>
				@endisset
				<p class="border-b border-dashed pb-1">
					{{--					FIXME: Border --}}
					{{ $dailyAdvice->morning }}</p>
			@endisset

			@isset( $dailyAdvice->midday )
				@isset( $dailyAdvice->highlight->midday[0] )
					@isset( $dailyAdvice->highlight->morning[0] )
						<h3 class="font-hairline pt-2">Middag:</h3>
					@else
						<h3 class="font-hairline">Middag:</h3>
					@endif
				@else
					@isset( $dailyAdvice->morning )
						<h3 class="font-hairline pt-2">Middag:</h3>
					@else
						<h3 class="font-hairline">Middag:</h3>
					@endisset
				@endisset

				@isset( $dailyAdvice->highlight->midday[0] )
					<div class="border-b">
						<span>{!! $dailyAdvice->highlight->midday[0] !!}</span>
					</div>
				@endisset
				<p class="border-b border-dashed pb-1">{{ $dailyAdvice->midday }}</p>
			@endisset

			@isset( $dailyAdvice->evening )
				@isset( $dailyAdvice->highlight->evening[0] )
					@if( isset($dailyAdvice->highlight->morning[0]) || isset($dailyAdvice->highlight->midday[0]) )
						<h3 class="font-hairline pt-2">Avond:</h3>
					@else
						<h3 class="font-hairline">Avond:</h3>
					@endif
				@else
					@if( isset($dailyAdvice->morning) || isset($dailyAdvice->midday) )
						<h3 class="font-hairline pt-2">Avond:</h3>
					@else
						<h3 class="font-hairline">Avond:</h3>
					@endif
				@endisset
				@isset( $dailyAdvice->highlight->evening[0] )
					<div class="border-b">
						<span>{!! $dailyAdvice->highlight->evening[0] !!}</span>
					</div>
				@endisset
				<p>{{ $dailyAdvice->evening }}</p>
			@endisset
			<div class="flex justify-between">
				<small class="font-hairline">
					{{ timeAmPm($dailyAdvice) }}
				</small>
			</div>
		</a>
		<div class="hidden w-full flex-shrink flex"
		     data-target="toggle.hide"
		     data-action="click@window->toggle#hidden"
		>
			@include('klanten.dailyadvice.edit', [ $dailyAdvice ])
		</div>
	</div>
</div>
