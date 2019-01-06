<form action="{{route('notities.update',$note)}}"
			method="post"
>@method('PATCH') @csrf
	<label for="body"
	>Notitie:</label>
	<br>
	<textarea type="text"
						rows="5"
						name="body"
						placeholder="Hoe is de behandeling gegaan? Zijn er veder noemenswaardigheden"
						required
	>{{ old('body') ?:$note->body}}
		</textarea>
	<br>
	<button type="submit"
	>Update
	</button>
</form>
