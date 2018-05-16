Voeg een nieuwe notitie toe
<form action="{{$customer->notesBasePath()}}"
			method="post"
>@csrf
	
	<label for="body"
	>Notitie:</label>
	<br>
	<textarea type="text"
						rows="5"
						name="body"
						placeholder="Hoe is de behandeling gegaan? Zijn er veder noemenswaardigheden"
						value="{{ old('body') }}"
						required
	></textarea>
	<hr>
	<label for="date"
	>Datum:</label>
	<input type="date"
				 name="date"
				 placeholder="dd-mm-yyyy"
				 value="{{ old('date') }}"
				 required
	>
	<hr>
	
	<button type="submit"
	>Voeg Notitie
	</button>
</form>
<hr>
