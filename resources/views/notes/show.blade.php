@foreach($customer->notes as $note)
	<note data-controller="notes"
				data-notes-id="{{$note->id}}"
				data-target="notes.note"
				class=""
	>
		<br>
		<a data-controller="notes"
			 data-notes-url="{{$note->basePath()}}"
			 data-action="notes#deleteNote"
		>Delete
		</a>
		<button data-action="click->notes#editNote"
		>Edit
		</button>
		<p data-target="notes.body">{{$note->body}}</p>
		<p data-target="notes.date">{{$note->date}}</p>
		<hr>
		{{--<label for="body"--}}
		{{-->Notitie:</label>--}}
		{{--<textarea type="text"--}}
		{{--rows="5"--}}
		{{--name="body"--}}
		{{--placeholder="Hoe is de behandeling gegaan? Zijn er veder noemenswaardigheden"--}}
		{{--data-target="notes.body"--}}
		{{--required--}}
		{{-->--}}
		{{--{{ old('body') ?:$note->body}}--}}
		{{--</textarea>--}}
		{{--<span data-target="notes.errorBody"></span>--}}
		{{--<hr>--}}
		{{----}}
		{{--<label for="date"--}}
		{{-->Datum:</label>--}}
		{{--<input type="date"--}}
		{{--name="date"--}}
		{{--placeholder="dd-mm-yyyy"--}}
		{{--value="{{ old('date') ?:$note->date}}"--}}
		{{--data-target="notes.date"--}}
		{{--required--}}
		{{-->--}}
		{{--<span data-target="notes.errorDate"></span>--}}
		{{--<hr>--}}
		{{--<br>--}}
		{{--<button--}}
		{{--data-notes-url="{{$note->path()}}"--}}
		{{--data-action="notes#updateNote"--}}
		{{-->Update--}}
		{{--</button>--}}
		{{--<button--}}
		{{--data-action="click->notes#cancelEditNote"--}}
		{{-->Cancel--}}
		{{--</button>--}}
	</note>
@endforeach



