<form action="{{ route('notes.update', $note, false) }}"
      method="POST"
      data-action="note#edit toggle#toggle"
      class="w-full"
>@method('PATCH') @csrf
	<div class="border-b border-dashed focus-within:border-buddy-lightest pl-10 pr-10">
	<textarea type="text"
	          class="overflow-visible resize-none block w-full"
	          rows="5"
	          name="body"
	          placeholder="Hoe is de behandeling gegaan?
Zijn er veder noemenswaardigheden"
	          data-target="note.body"
	          required
	>{{ old('body') ?: $note->body }}</textarea>
		<hr>
		<div class="w-full flex">
			<button type="submit"
			        class="w-1/2  py-5  mb-5 text-buddy-lightest hover:text-buddy-darker"
			>Wijzig Notitie
			</button>
			<button data-action="note#cancel toggle#toggle"
			        class="w-1/2 px-5 py-5 rounded mb-5 text-red-lighter hover:text-red-light"
			>Cancel
			</button>
		</div>
	</div>
</form>
