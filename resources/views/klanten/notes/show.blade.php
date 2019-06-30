<div id="{{ $note->id }}"
     data-controller="note toggle"
     data-target="notes.note note.note"
     data-note-update="{{ route('notes.update', $note, false) }}"
     data-note-destroy="{{ route('notes.destroy', $note, false) }}"
     @if ( isset($noteCreated) && $note->id === $noteCreated)
     data-note-created="{{ true }}"
     @endif
     @isset($searched)
     role="option"
     data-autocomplete2-value="{{ $note->id }}"
     data-action="click->autocomplete2#goto"
     data-autocomplete2-goto="{{ $note->id }}"
		@endisset

>
	<div class="w-full flex-shrink flex pt-4 pl-4">
		<div class="mt-1.5 w-2.5 h-2.5 border border-teal-400 rounded-full flex-shrink-0"></div>
		<p class="ml-4 font-thin w-16 align-baseline flex-no-shrink">{{ dayMonth($note) }}</p>
		<div class="ml-4 w-full"
		     data-action="click->toggle#toggle"
		     data-target="toggle.show"
		>
			@isset( $note->highlight->body[0] )
				<div class="pb-2 border-b">
					<span>{!! $note->highlight->body[0] !!}</span>
				</div>
			@endisset
			<p @isset( $note->highlight->body[0] )
			   class="pt-2"
					@endisset
			>
				{{ $note->body }}
			</p>
			<div class="flex justify-between">
				<small class="font-hairline">{{ timeAmPm($note) }}</small>
			</div>
		</div>
		<div class="hidden w-full"
		     data-target="toggle.hide"
		>
			@include('klanten.notes.edit',[$note])
		</div>
		<a href="#"
		   class="w-full"
		   data-action="note#delete monthyear#remove note#remove"
		>

			{{ svg_image('lineicons/trash', 'fill-current text-red-300 hover:text-red-600 h-8 float-right p-4') }}
			{{--			@svg('icon-27-trash-can', ['class'=>'fill-current text-red-lighter hover:text-red-light float-right mr-2'])--}}
		</a>
	</div>
</div>
