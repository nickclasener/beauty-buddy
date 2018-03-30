@extends('layouts.app')

@section('content')
	<div data-controller="content-loader"
			 {{--data-content-loader-url="{{$client->dataPath()}}"--}}
			 data-content-loader-url="{{$client->dataPath()}}"
					{{--data-content-loader-refresh-interval="5000"--}}
	>
	</div>
	{{--@foreach($client->notes as $note)--}}
	{{--<p>{{$note->body}}</p>--}}
	{{--@endforeach--}}
@endsection
