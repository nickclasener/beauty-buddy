@extends('layouts.main')
@section('main')

	<div class="flex flex-col lg:flex-row"
	     data-controller="toggle"
	>
		<div class="bg-white w-full lg:w-1/3 lg:my-16 lg:pb-4 lg:pt-0 h-full hidden lg:block rounded-lg shadow-lg"
		     data-target="toggle.klantHide"
		     id="{{ $customer->slug }}"
		>
			<div data-controller="toggle customer"
			     data-customer-update="{{ route('customer.update', $customer, false) }}"
			     data-customer-destroy="{{ route('customer.destroy', $customer, false) }}"
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
		<div class="lg:ml-4 w-full lg:w-2/3 mb-12 lg:block lg:-mt-16">
			@include('layouts._submenu',['customer'=>$customer])
			<div class="w-full bg-white mb-12  lg:block rounded-lg lg:mt-4 shadow-lg pb-4"
			     data-target="toggle.klantShow"
			>
				<div class="mx-4 lg:mx-8">
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
