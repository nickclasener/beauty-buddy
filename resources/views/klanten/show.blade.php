@extends('layouts.main')
@section('main')

	<div class="flex flex-col lg:flex-row -mt-20">
		<div class=" w-full lg:w-1/3  hidden lg:block lg:sticky lg:top-0 h-full lg:pt-20  mt-16"
		     data-target="toggle.klantHide"
		     id="{{ $customer->slug }}"
		>
			{{--			<div class="w-full pt-2 -mt-4"></div>--}}
			<div class="bg-white shadow-lg pb-4"
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
		<div class="lg:ml-4 w-full lg:w-2/3 mb-4  ">
			@include('layouts._submenu',['customer'=>$customer])
			<div class="w-full bg-white mb-12  lg:block  lg:mt-4 shadow-lg pb-4"
			     data-target="toggle.klantShow"
			>
				{{--				<div class="mx-4 ">--}}
				@yield('content')
				{{--				</div>--}}
			</div>
		</div>
	</div>
@stop
