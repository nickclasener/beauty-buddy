@extends('layouts.main')
@section('main')
	<div class="container mx-auto flex">
		<div class="bg-white w-1/3 my-15 py-10 h-full">
			{{--<div data-controller="note"--}}
			     {{--data-note-update="{{ route('notities.update', $note) }}"--}}
			     {{--data-note-destroy="{{ route('notities.destroy', $note) }}"--}}
			{{-->--}}

				<div data-controller="toggle">
					<div data-target="toggle.show">
						@include('klanten._show')
					</div>
					<div data-target="toggle.hidden"
					     class="hidden"
					>
						@include('klanten.edit')
					</div>
				</div>
			</div>
		{{--</div>--}}
		<div class="ml-5 w-2/3 mb-15">
			@if ($customer!= null)
				@include('layouts._submenu',['customer'=>$customer])
			@endif
			<div class="w-full bg-white pb-10 mb-10">

				<div class="pt-8 pl-8 pr-15">
					@yield('content')
				</div>
			</div>
		</div>
	</div>
	@if (count($errors))
		@foreach ($errors->all() as $error)
			<ul class="alert alert-danger">
				<li>{{ $error }}</li>
			</ul>
		@endforeach
	@endif
@stop
