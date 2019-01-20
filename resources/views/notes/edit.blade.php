<form action="{{ route('notities.update', $note) }}"
			method="POST"
			data-controller="edit"
			data-edit-url="{{ route('notities.update', $note) }}"
			data-action="submit->edit#submit"
>@method('PATCH') @csrf
	<div class=" border-b border-buddy-teal-light focus-within:border-buddy-teal-dark pt-10 pl-10 pr-10">
	<textarea type="text"
						class="resize-none w-full"
						rows="5"
						name="body"
						placeholder="Hoe is de behandeling gegaan?
Zijn er veder noemenswaardigheden"
						data-target="edit.body"
						required
	>{{ old('body') ?: $note->body }}</textarea>
		<button type="submit"
						class=""
		>Voeg Notitie
		</button>
	</div>
</form>