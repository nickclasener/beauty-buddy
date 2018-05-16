@foreach($customer->notes as $note)
	<br>
	<a>
		Delete
	</a>
	<button>
		Edit
	</button>
	<p>{{$note->body}}</p>
	<p>{{$note->date}}</p>
	<hr>
@endforeach



