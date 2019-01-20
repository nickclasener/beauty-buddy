<div id="edit" data-controller="toggle">
	<p data-target="toggle.show"
		 data-action="click->toggle#toggle"
	>
		{{ $note->body }}</p>
	<div class="hidden"
			 data-target="toggle.hidden"
			 data-action="click->toggle#toggle"
	>
		@include('notes.edit')
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
						data-controller="delete index"
						data-delete-data="{{ $note->id }}"
						data-action="submit->delete#submit "
			>
				@method('DELETE')@csrf
				<button type="submit"
				>
					@svg('icon-26-trash-can', ['class'=>'mt-5 h-5
					fill-current text-red'])
				</button>
			</form>
		</div>
	</div>
</div>