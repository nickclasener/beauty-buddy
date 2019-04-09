<div data-controller="huidanalyse toggle"
     data-target="huidanalyses.huidanalyse huidanalyse.huidanalyse"
     data-huidanalyse-update="{{ route('huidanalyses.update', $huidanalyse, false) }}"
     data-huidanalyse-destroy="{{ route('huidanalyses.destroy', $huidanalyse, false) }}"
     @if ( isset($huidanalyseCreated) && $huidanalyse->id === $huidanalyseCreated)
     data-huidanalyse-created="{{ true }}"
		@endif
>
	<div class="w-full flex-shrink flex pt-5 pl-5">
		<div class="mt-0.5 w-2.5 h-2.5 border border-buddy-teal rounded-full flex-no-shrink"></div>
		<p class="ml-5 font-thin flex-no-shrink">{{ dayMonth($huidanalyse) }}</p>
		<div class="ml-5 w-full"
		     data-action="click->toggle#toggle "
		     data-target="toggle.show"
		>
			<div class="flex justify-between">
				<p data-target="huidanalyse.content"
				>
					{{ $huidanalyse->body }}
				</p>
			</div>
			<div class="flex justify-between">
				<small class="font-hairline">{{ timeAmPm($huidanalyse) }}</small>
			</div>
		</div>
		<div class="hidden w-full"
		     data-target="toggle.hide"
		>
			@include('klanten.huidanalyses.edit',[$huidanalyse])
		</div>
		<a href=""
		   data-action="huidanalyse#delete monthyear#remove huidanalyse#remove"
		>
			@svg('icon-27-trash-can', ['class'=>'fill-current text-red-lighter hover:text-red-light float-right mr-1'])
		</a>
	</div>
</div>
