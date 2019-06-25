@extends('layouts.main')
@section('main')

	<div class="flex flex-col md:flex-row"
	     data-controller="toggle"
	>
		<div class="bg-white w-full md:w-1/3 md:my-15 md:pb-10 md:pt-0 h-full hidden md:block"
		     data-target="toggle.klantHide"
		     id="{{ $customer->slug }}"
		>
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
		<div class="md:ml-5 w-full md:w-2/3 mb-15 md:block"
		>
			@include('layouts._submenu',['customer'=>$customer])
			<div class="w-full bg-white mb-10 md:block"
			     data-target="toggle.klantShow"
			>
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
