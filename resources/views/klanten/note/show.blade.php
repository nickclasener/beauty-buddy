<div id="{{ $model->id }}"
     data-controller="{{ $route }} toggle"
     data-target="{{ $route }}s.{{ $route }} {{ $route }}.{{ $route }}"
     data-{{ $route }}-update="{{ route($route.'.update', $model, false) }}"
     data-{{ $route }}-destroy="{{ route($route.'.destroy', $model, false) }}"
     @if ( isset($modelCreated) && $model->id === $modelCreated)
     data-{{ $route }}-created="{{ true }}"
     @endif
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
		<div class="ml-4 w-full"
		     data-action="click->toggle#toggle"
		     data-target="toggle.show"
		>@isset( $model->highlight->body[0] )
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
		</div>
		<div class="hidden w-full"
		     data-target="toggle.hide"
		>@include('klanten.' .$route .'.edit',[$model])
		</div>
		<a href="#"
		   class="h-8"
		   data-action="{{ $route }}#delete monthyear#remove {{ $route }}#remove"
		>{{ svg_image('lineicons/trash', 'fill-current text-red-300 hover:text-red-600 h-8 float-right') }}
		</a>
	</div>
</div>
