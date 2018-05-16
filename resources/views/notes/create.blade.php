Voeg een nieuwe notitie toe
<div data-controller="notes"
		 data-notes-url="{{$customer->notesBasePath()}}"
		 data-notes-customerurl="{{$customer->path()}}"
		 data-notes-user-id="{{$customer->user_id}}"
>
	<label for="body"
	>Notitie:</label>
	<br>
	<textarea type="text"
						rows="5"
						name="body"
						placeholder="Hoe is de behandeling gegaan? Zijn er veder noemenswaardigheden"
						value="{{ old('body') }}"
						data-target="notes.body"
						required
	></textarea>
	<span data-target="notes.errorBody"></span>
	<hr>
	<label for="date"
	>Datum:</label>
	<input type="date"
				 name="date"
				 placeholder="dd-mm-yyyy"
				 value="{{ old('date') }}"
				 data-target="notes.date"
				 required
	>
	<span data-target="notes.errorDate"></span>
	<hr>
	
	<button type="submit"
					data-action="click->notes#addNote"
	>Voeg Notitie Toe
	</button>
</div>