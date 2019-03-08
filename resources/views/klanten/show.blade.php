@extends('layouts.main')
@section('main')
	<div class="container mx-auto flex">
		<div class="bg-white w-1/3 my-15 py-10 h-full">

			<div data-controller="toggle customer"
			     data-customer-update="{{ route('klanten.update', $customer, false) }}"
			     data-customer-destroy="{{ route('klanten.destroy', $customer, false) }}"
			>
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
		<div class="ml-5 w-2/3 mb-15">
			@include('layouts._submenu',['customer'=>$customer])
			<div class="w-full bg-white mb-10">
				<div class="px-10">
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
