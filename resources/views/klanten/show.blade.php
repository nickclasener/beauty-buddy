@extends('layouts.main')
@section('main')
	<div class="flex flex-col lg:flex-row h-full mt-12 mb-4">
		<div class="lg:pr-2 w-full lg:w-1/3 {{ Route::is('customer.show') ? 'block ':' hidden lg:block' }}  lg:sticky lg:top-0 lg:pt-20 lg:-mt-4 h-full"
		     data-controller="toggle customer"
		     data-customer-update="{{ route('customer.update', $customer, false) }}"
		     data-customer-destroy="{{ route('customer.destroy', $customer, false) }}"
		     id="{{ $customer->slug }}"
		>
			<div class="bg-white shadow-lg">
				<div data-target="toggle.show"
				>
					@include('klanten._show')
				</div>
				<div data-target="toggle.hide"
				     class="hidden"
				>
					@include('klanten.edit')
				</div>
			</div>
		</div>
		<div class="lg:pl-2 w-full lg:w-2/3 ">
			@include('layouts._submenu',['customer'=>$customer])
			<div class="w-full bg-white mb-4 lg:mt-4 shadow-lg ">
				@if( !Route::is('customer.show') )
					@yield('content')
				@endif
			</div>
		</div>
	</div>
@stop
