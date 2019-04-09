<div data-controller="dailyadvice toggle"
     data-dailyadvice-update="{{ route('dailyadvice.update', $dailyAdvice, false) }}"
     data-dailyadvice-destroy="{{ route('dailyadvice.destroy', $dailyAdvice, false) }}"
     class="w-full flex-shrink flex pt-5 pl-5"
     @if ( isset($dailyAdviceCreated) && $dailyAdvice->id === $dailyAdviceCreated)
     data-huidanalyse-created="{{ true }}"
		@endif
>
	<div class="w-full flex-shrink flex pt-5 pl-5">
		<div class="w-2.5 h-2.5 border border-buddy-teal rounded-full flex-no-shrink"></div>
		<p class="ml-5 font-thin flex-no-shrink">{{ dayMonth( $dailyAdvice ) }}</p>
		<div class="ml-5 w-full"
		     data-action="click->toggle#toggle "
		     data-target="toggle.show"
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
			<small class="font-hairline">{{ timeAmPm( $dailyAdvice ) }}</small>
		</div>
		<div class="hidden w-full"
		     data-target="toggle.hide"
		>
			@include('klanten.dailyadvice.edit', [ $dailyAdvice ])
		</div>
		<a href=""
		   data-action="dailyadvice#delete monthyear#remove note#remove"
		>
			@svg('icon-27-trash-can', ['class'=>'fill-current text-red-lighter hover:text-red-light float-right mr-1'])
		</a>
	</div>
</div>