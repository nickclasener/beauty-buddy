@extends('layouts.main')
@section('main')

	<div class="flex flex-col lg:flex-row lg:-mt-20 -mt-20 h-full">
		<div class="w-full lg:w-1/3  hidden lg:block lg:sticky lg:top-0  lg:pt-20 mt-16 h-full"
		     data-target="toggle.klantHide"
		     id="{{ $customer->slug }}"
		>
			<div class="bg-white shadow-lg p-4"
			     data-controller="toggle customer"
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
		<div class="lg:ml-4 w-full lg:w-2/3 pt-20 ">
			@include('layouts._submenu',['customer'=>$customer])
			<div class="w-full bg-white mb-4  lg:block  lg:mt-4 shadow-lg "
			     data-target="toggle.klantShow"
			>
				@yield('content')
			</div>
		</div>
	</div>
@stop
