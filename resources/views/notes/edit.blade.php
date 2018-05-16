<form action="{{$customer->notesBasePath()}}"
			method="post"
>@method('PATCH') @csrf
	<label for="body"
	>Notitie:</label>
	<textarea type="text"
						rows="5"
						name="body"
						placeholder="Hoe is de behandeling gegaan? Zijn er veder noemenswaardigheden"
						required
	>
		{{ old('body') ?:$note->body}}
		</textarea>
	<hr>
	<label for="date"
	>Datum:</label>
	<input type="date"
				 name="date"
				 placeholder="dd-mm-yyyy"
				 value="{{ old('date') ?:$note->date}}"
				 required
	>
	<hr>
	
	<button type="submit"
	>Update
	</button>
</form>
