@foreach($clients as $client)
	<a href="{{$client->path()}}">
		<p>{{$client->naam}} | {{$client->email}} | {{$client->mobiel}} | {{$client->telefoon}}</p>
	</a>
	<hr>
@endforeach