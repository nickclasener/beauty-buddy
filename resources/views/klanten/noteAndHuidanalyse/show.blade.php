<div id="{{ $model->id }}"
     data-controller="{{ $stimulusJs }} toggle textarea"
     data-target="{{ $stimulusJs }}s.{{ $stimulusJs }} {{ $stimulusJs }}.{{ $stimulusJs }}"
     data-{{ $stimulusJs }}-update="{{ route($stimulusJs.'.update', $model, false) }}"
     data-{{ $stimulusJs }}-destroy="{{ route($stimulusJs.'.destroy', $model, false) }}"
     @isset( $modelCreated )
     data-{{ $stimulusJs }}-created="{{ true }}"
     @endisset
     @isset($searched)
     role="option"
     data-autocomplete2-value="{{ $model->id }}"
     data-action="click->autocomplete2#goto"
     data-autocomplete2-goto="{{ $model->id }}"
		@endisset
>
	<div class="w-full flex-shrink flex pt-4 pl-4">
		<div class="mt-1.5 w-2.5 h-2.5 border border-teal-400 rounded-full flex-shrink-0"></div>
		<p class="ml-4 font-thin w-16 align-baseline flex-no-shrink">{{ dayMonth($model) }}</p>
		<a class="ml-4 w-full cursor-pointer"
		   data-action="click->toggle#toggle click->textarea#grow click->textarea#focus"
		   data-target="toggle.show"
		>
			@isset( $model->highlight->body[0] )
				<div class="pb-2 border-b">
					<span>{!! $model->highlight->body[0] !!}</span>
				</div>
			@endisset
			<p @isset( $model->highlight->body[0] )
			   class="pt-2"
					@endisset
			>{{ $model->body }}</p>
			<div class="flex justify-between">
				<small class="font-hairline">
					{{ timeAmPm($model) }}
				</small>
			</div>
		</a>
		<div class="hidden w-full flex-shrink flex"
		     data-target="toggle.hide"
		     data-action="click@window->toggle#hidden"
		>@include('klanten.noteAndHuidanalyse.edit',[$model])
		</div>

	</div>
</div>
