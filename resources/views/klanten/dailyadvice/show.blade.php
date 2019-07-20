<div data-controller="dailyadvice toggle"
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
		<div class="ml-4 w-full"
		     data-action="click->toggle#toggle "
		     data-target="toggle.show"
		>@isset( $dailyAdvice->highlight )
				<div>
					@isset(   $dailyAdvice->highlight->morning[0])a
					<h3 class="font-hairline">
						Ochtend:
					</h3>
					<span>{!! $dailyAdvice->highlight->morning[0] !!}</span>
					<hr class="border-b border-dashed focus-within:border-buddy-lightest">
					@endisset
					@isset(   $dailyAdvice->highlight->midday[0])
						<h3 class="font-hairline">
							Middag:
						</h3>
						<span>{!! $dailyAdvice->highlight->midday[0] !!}</span>
						<hr class="border-b border-dashed focus-within:border-buddy-lightest">
					@endisset
					@isset(   $dailyAdvice->highlight->evening[0])
						<h3 class="font-hairline">
							Avond:
						</h3>
						<span>{!! $dailyAdvice->highlight->evening[0] !!}</span>
						<hr class="border-b border-dashed focus-within:border-buddy-lightest px-10 ">
					@endisset
				</div>
			@endisset
			<div
					@isset( $dailyAdvice->highlight)
					class="pt-2.5"
					@endisset
			>
				<h3 class="font-hairline">
					Ochtend:
				</h3>
				<p class="border-b">{{ $dailyAdvice->morning }}</p>
				<hr class="border-b border-dashed focus-within:border-buddy-lightest">
				<h3 class="font-hairline">
					Middag:
				</h3>
				<p>{{ $dailyAdvice->midday }}</p>
				<hr class="border-b border-dashed focus-within:border-buddy-lightest ">
				<h3 class="font-hairline">
					Avond:
				</h3>
				<p>{{ $dailyAdvice->evening }}</p>
				<hr class="border-b border-dashed focus-within:border-buddy-lightest ">
			</div>
			<div class="flex justify-between">
				<small class="font-hairline">{{ timeAmPm( $dailyAdvice ) }}</small>
			</div>
		</div>
		<div class="hidden w-full"
		     data-target="toggle.hide"
		>@include('klanten.dailyadvice.edit', [ $dailyAdvice ])</div>
		<a href=""
		   class="h-8"
		   data-action="dailyadvice#delete monthyear#remove dailyadvice#remove"
		>{{ svg_image('lineicons/trash', 'fill-current text-red-300 hover:text-red-600 h-8 float-right') }}</a>
	</div>
</div>
