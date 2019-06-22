<div id="{{ $dailyAdvice->id }}"
     data-controller="dailyadvice toggle"
     data-target="dailyadvices.dailyadvice dailyadvice.dailyadvice"
     data-dailyadvice-update="{{ route('dailyadvice.update', $dailyAdvice, false) }}"
     data-dailyadvice-destroy="{{ route('dailyadvice.destroy', $dailyAdvice, false) }}"
     @if ( isset($dailyAdviceCreated) && $dailyAdvice->id === $dailyAdviceCreated)
     data-dailyadvice-created="{{ true }}"
     @endif
     role="option"
     data-autocomplete2-value="{{ $dailyAdvice->id }}"
     data-action="click->autocomplete2#goto"
     data-autocomplete2-goto="{{ $dailyAdvice->id }}"
>
	<div class="w-full flex-shrink flex pt-5 pl-5">
		<div class="mt-0.5 w-2.5 h-2.5 border border-buddy-teal rounded-full flex-no-shrink"></div>
		<p class="ml-5 font-thin flex-no-shrink">{{ dayMonth($dailyAdvice) }}</p>
		<div class="pl-5 w-full"
		     data-action="click->toggle#toggle "
		     data-target="toggle.show"
		>
			@isset( $dailyAdvice->highlight )
				<div>
					@isset(   $dailyAdvice->highlight->morning[0])
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
				<p>{{ $dailyAdvice->morning }}</p>
				<hr class="border-b border-dashed focus-within:border-buddy-lightest px-10 ">
				<h3 class="font-hairline">
					Middag:
				</h3>
				<p>{{ $dailyAdvice->midday }}</p>
				<hr class="border-b border-dashed focus-within:border-buddy-lightest px-10 ">
				<h3 class="font-hairline">
					Avond:
				</h3>
				<p>{{ $dailyAdvice->evening }}</p>
				{{--<hr class="border-b border-dashed focus-within:border-buddy-lightest px-10 ">--}}
			</div>
			<div class="flex justify-between">
				<small class="font-hairline">{{ timeAmPm( $dailyAdvice ) }}</small>
			</div>
		</div>
		<div class="hidden w-full"
		     data-target="toggle.hide"
		>
			@include('klanten.dailyadvice.edit', [ $dailyAdvice ])
		</div>
		<a href=""
		   data-action="dailyadvice#delete monthyear#remove dailyadvice#remove"
		>
			@svg('icon-27-trash-can', ['class'=>'fill-current text-red-lighter hover:text-red-light float-right mr-1'])
		</a>
	</div>
</div>
