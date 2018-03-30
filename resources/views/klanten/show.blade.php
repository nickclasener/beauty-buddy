@extends('layouts.app')

@section('content')
	<div data-controller="content-loader"
			 data-content-loader-url="{{$customer->dataPath()}}"
	>
	</div>
	{{--@include('klanten.data.notes')--}}
	{{--@foreach($customer->notes as $note)--}}
	{{--<p>{{$note->body}}</p>--}}
	{{--@endforeach--}}
	@if($customer->intake != null)
	@endif
@endsection
