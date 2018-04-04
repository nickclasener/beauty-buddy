@if($customer->notes != null)
	@foreach($customer->notes as $note)
		<p>{{$note->body}}</p>
		<hr>
	@endforeach
@endif



