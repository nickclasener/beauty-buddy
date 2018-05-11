<note data-controller="notes"
			data-target="notes.note"
>
	
	<label for="body"
	>Notitie:</label>
	<textarea type="text"
						rows="5"
						name="body"
						placeholder="Hoe is de behandeling gegaan? Zijn er veder noemenswaardigheden"
						data-target="notes.body"
						required
	>
		{{ old('body') ?:$note->body}}
		</textarea>
	<span data-target="notes.errorBody"></span>
	<hr>
	<label for="date"
	>Datum:</label>
	<input type="date"
				 name="date"
				 placeholder="dd-mm-yyyy"
				 value="{{ old('date') ?:$note->date}}"
				 data-target="notes.date"
				 required
	>
	<span data-target="notes.errorDate"></span>
	<hr>
	
	<button type="submit"
					data-action="click->notes#updateNote"
	>Update
	</button>
</note>
