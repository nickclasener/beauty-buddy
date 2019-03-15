<form action="{{ route('notities.update', $note, false) }}"
      method="POST"
      data-action="note#edit toggle#grow toggle#toggle"
      class="w-full"
      data-target="note.form"
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
			<button data-action="toggle#toggle"
			        class="w-1/2 px-5 py-5 rounded mb-5 mx-5 text-red-lighter hover:text-red-light"
			>Cancel
			</button>
			<button type="submit"
			        class="w-1/2  py-5 border rounded mb-5 mx-5  border-buddy-lightest hover:border-buddy-lighter text-buddy-lightest hover:text-buddy-darkest"
			>Update Notitie
			</button>
		</div>
	</div>
</form>
