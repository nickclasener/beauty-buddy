<div id="{{ $huidanalyse->id }}"
     data-controller="huidanalyse toggle"
     data-target="huidanalyses.huidanalyse huidanalyse.huidanalyse"
     data-huidanalyse-update="{{ route('huidanalyse.update', $huidanalyse, false) }}"
     data-huidanalyse-destroy="{{ route('huidanalyse.destroy', $huidanalyse, false) }}"
     @if ( isset($huidanalyseCreated) && $huidanalyse->id === $huidanalyseCreated)
     data-huidanalyse-created="{{ true }}"
     @endif
     @isset($searched)
     role="option"
     data-autocomplete2-value="{{ $huidanalyse->id }}"
     data-action="click->autocomplete2#goto"
     data-autocomplete2-goto="{{ $huidanalyse->id }}"
		@endisset
>
	<div class="w-full flex-shrink flex pt-5 pl-5">
		<div class="mt-0.5 w-2.5 h-2.5 border border-buddy-teal rounded-full flex-no-shrink"></div>
		<p class="ml-5 font-thin flex-no-shrink">{{ dayMonth($huidanalyse) }}</p>
		<div class="ml-5 w-full"
		     data-action="click->toggle#toggle"
		     data-target="toggle.show"
		>
			<div class="flex justify-between">
				<div>
					@isset(   $huidanalyse->highlight->body[0])
						<div class="pb-2.5 border-b">
							<span>{!! $huidanalyse->highlight->body[0] !!}</span>
						</div>
					@endisset
					<p @isset(   $huidanalyse->highlight->body[0])
					   class="pt-2.5"
							@endisset>
						{{ $huidanalyse->body }}
					</p>
				</div>
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
