@foreach($customer->notes as $note)
	<form action="{{route('notities.destroy',$note)}}"
				method="POST"
	>@method('DELETE')@csrf
		<button type="submit">Verwijderen</button>
	</form>
	<a href="{{route('notities.edit',[$note->customer,$note->id])}}">
		Edit
	</a>
	<p>{{$note->body}}</p>
	<hr>
@endforeach



