@foreach($customer->notes as $note)
	<br>
	<a>
		Delete
	</a>
	<a href="">
		Edit
	</a>
	<p>{{$note->body}}</p>
	<p>{{$note->date}}</p>
	<hr>
@endforeach



