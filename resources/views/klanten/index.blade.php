@extends('layouts.app')

@section('content')
	<div data-controller="content-loader"
			 data-content-loader-url="/data/klanten"
					{{--data-content-loader-refresh-interval="5000"--}}
	>
	</div>
@endsection