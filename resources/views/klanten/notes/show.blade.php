<div data-controller="note toggle"
     data-target="notes.note note.note"
     data-note-update="{{ route('notes.update', $note, false) }}"
     data-note-destroy="{{ route('notes.destroy', $note, false) }}"
     @if ( isset($noteCreated) && $note->id === $noteCreated)
     data-note-created="{{ true }}"
		@endif
>
	<div class="w-full flex-shrink flex pt-5 pl-5">
		<div class="mt-0.5 w-2.5 h-2.5 border border-buddy-teal rounded-full flex-no-shrink"></div>
		<p class="ml-5 font-thin flex-no-shrink">{{ dayMonth($note) }}</p>
		<div class="ml-5 w-full"
		     data-action="click->toggle#toggle "
		     data-target="toggle.show"
		>
			<div class="flex justify-between">
				<p data-target="note.content"
				>
					{{ $note->body }}
				</p>
			</div>
			<div class="flex justify-between">
				<small class="font-hairline">{{ timeAmPm($note) }}</small>
			</div>
		</div>
		<div class="hidden w-full"
		     data-target="toggle.hide"
		>
			@include('klanten.notes.edit',[$note])
		</div>
		<a href=""
		   data-action="note#delete monthyear#remove note#remove"
		>
			@svg('icon-27-trash-can', ['class'=>'fill-current text-red-lighter hover:text-red-light float-right mr-1'])
		</a>
	</div>
</div>
