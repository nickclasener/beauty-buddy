<div data-controller="note"
		 data-note-update="{{ route('notities.update', $note) }}"
		 data-note-destroy="{{ route('notities.destroy', $note) }}"
		 class="w-full flex-shrink flex pt-5 pl-5"
>
	<div class="w-2.5 h-2.5 border border-buddy-teal rounded-full flex-no-shrink"></div>
	<p class="ml-5 font-thin flex-no-shrink">{{ dayMonth($note) }}</p>
	<div class="ml-5 w-full">
		<div data-controller="toggle"
		>
			<p data-target="toggle.show"
				 data-action="click->toggle#toggle"
			>
				{{ $note->body }}</p>
			<div class="hidden"
					 data-target="toggle.hidden"
			>
				@include('notes.edit',[$note])
			</div>
			<div class="flex justify-between">
				<small class="font-hairline">{{ timeAmPm($note) }}</small>
				<div class="flex ">
					<button data-action="click->toggle#toggle"
									class="h-5"
					>
						@svg('icon-136-document-edit',['class'=>'ml-1 fill-current text-teal'])
					</button>
					<form action="{{  route('notities.destroy',$note) }}"
								method="POST"
								data-action="note#delete monthyear#update"
					>
						@method('DELETE')@csrf
						<button type="submit">
							@svg('icon-26-trash-can', ['class'=>'mt-5 h-5 fill-current text-red'])
						</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
