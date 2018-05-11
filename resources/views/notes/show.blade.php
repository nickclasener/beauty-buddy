@if($customer->notes != null)
	<notes>
		@foreach($customer->notes as $note)
			<note data-controller="notes">
				<div id="note"
						 data-target="notes.note"
				>
					<a data-controller="notes"
						 data-notes-url="{{$note->basePath()}}"
						 data-action="notes#deleteNote"
					>Delete
					</a>
					<button data-action="click->notes#editNote"
					>Edit
					</button>
					<p>{{$note->body}}</p>
					<p>{{$note->date}}</p>
					<hr>
				</div>
				
				{{--<div id="editNote"--}}
				{{--data-target="notes.noteEdit"--}}
				{{-->--}}
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
				{{----}}
				{{--<a data-controller="notes"--}}
				{{--data-notes-url="{{$note->path()}}"--}}
				{{--data-action="notes#updateNote"--}}
				{{-->Update {{$note->path()}}--}}
				{{--</a>--}}
				{{--<button data-controller="notes"--}}
				{{--data-action="click->notes#cancelEditNote"--}}
				{{-->Cancel--}}
				{{--</button>--}}
				{{--</div>--}}
			</note>
		@endforeach
	</notes>
@endif



