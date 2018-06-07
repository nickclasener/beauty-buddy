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
	<label for="date"
	>Datum:</label>
	<input type="date"
				 name="date"
				 placeholder="dd-mm-yyyy"
				 value="{{ old('date') ?:$note->date}}"
				 required
	>
	<br>
	<button type="submit"
	>Update
	</button>
</form>
