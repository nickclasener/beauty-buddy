<form action="{{ route('notities.update', $note, false) }}"
      method="POST"
      data-action="note#edit toggle#toggle"
>@method('PATCH') @csrf
	<div class="border-b border-buddy-teal-light focus-within:border-buddy-teal-dark pl-10 pr-10">
	<textarea type="text"
	          class="resize-none w-full"
	          rows="5"
	          name="body"
	          placeholder="Hoe is de behandeling gegaan?
Zijn er veder noemenswaardigheden"
	          data-target="note.body"
	          required
	>{{ old('body') ?: $note->body }}</textarea>
		<button type="submit"
		        class="px-10 py-5 border rounded"
		>Update Notitie
		</button>
		<button data-action="click->toggle#toggle"
		        class="px-10 py-5 border rounded"
		>Cancel
		</button>
	</div>
</form>
