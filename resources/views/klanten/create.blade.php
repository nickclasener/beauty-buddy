@extends('layouts.main')
@section('main')
	<div class="w-full pt-4"></div>
	<div class="container mx-auto flex">
		<div class="bg-white mx-auto w-1/2 my-4 py-4 h-full shadow-2xl">

			<h1 class="font-hairline w-full text-center py-4 mb-4">Nieuwe Klant?</h1>
			<hr class="border-b border-dashed my-4 lg:mx-4">
			<form action="{{ route('customer.store', false) }}"
			      data-controller="customer"
			      data-customer-url="{{ route('customer.store', false) }}"
			      data-action="customer#create"

			>@method('POST')@csrf
				<div class="mx-4 lg:mx-8 customer">
					<h2 class="font-hairline mb-2">Contactinformatie:</h2>
					<div class="mx-4">
						<label for="naam"
						       class="font-hairline"
						>Naam:</label>
						<div class="flex justify-between items-center mb-4">
							<input data-target="customer.naam"
							       type="text"
							       value="{{ old('naam') }}"
							       name="naam"
							       placeholder="Jane Doe"
							       class="p-1 transition bg-white shadow focus:shadow-inner focus:outline-none border border-transparent focus:border-gray-300 placeholder-gray-700 block w-full appearance-none"
							>
						</div>
						<label for="geboortedatum"
						       class="font-hairline"
						>Geboortedatum</label>
						<div class="flex justify-between items-center mb-4">
							<input data-target="customer.geboortedatum"
							       type="text"
							       name="geboortedatum"
							       value="{{ old('geboortedatum')  }}"
							       placeholder="20-12-1991"
							       class="p-1 transition bg-white shadow focus:shadow-inner focus:outline-none border border-transparent focus:border-gray-300 placeholder-gray-700 block w-full appearance-none"
							></div>
						<label for="email"
						       class="font-hairline"
						>Email</label>
						<div class="flex justify-between items-center mb-4">
							<input data-target="customer.email"
							       type="text"
							       value="{{ old('email') }}"
							       name="email"
							       class="p-1 transition bg-white shadow focus:shadow-inner focus:outline-none border border-transparent focus:border-gray-300 placeholder-gray-700 block w-full appearance-none"

							></div>

						<label for="mobiel"
						       class="font-hairline"
						>Mobiel</label>
						<div class="flex justify-between mb-4">
							<input data-target="customer.mobiel"
							       type="text"
							       value="{{ old('mobiel') }}"
							       name="mobiel"
							       class="p-1 transition bg-white shadow focus:shadow-inner focus:outline-none border border-transparent focus:border-gray-300 placeholder-gray-700 block w-full appearance-none"

							></div>

						<label for="telefoon"
						       class="font-hairline"
						>Telefoon</label>
						<div class="flex justify-between mb-4">
							<input data-target="customer.telefoon"
							       type="text"
							       value="{{ old('telefoon') }}"
							       name="telefoon"
							       class="p-1 transition bg-white shadow focus:shadow-inner focus:outline-none border border-transparent focus:border-gray-300 placeholder-gray-700 block w-full appearance-none"

							></div>
					</div>
				</div>

				<hr class="border-b border-dashed my-4 lg:mx-4">
				{{--				<div class="mx-15">--}}
				<div class="mx-4 lg:mx-8 customer">
					<h2 class="font-hairline text-buddy-teal mb-4">Adresinformatie</h2>
					<div class="mx-4">

						<label for="straatnaam"
						       class="font-hairline"
						>Straatnaam</label>
						<div class="flex justify-between mb-4">
							<input data-target="customer.straatnaam"
							       type="text"
							       value="{{ old('straatnaam') }}"
							       name="straatnaam"
							       class="p-1 transition bg-white shadow focus:shadow-inner focus:outline-none border border-transparent focus:border-gray-300 placeholder-gray-700 block w-full appearance-none"
							></div>
						<label for="huisnummer"
						       class="font-hairline"
						>Huisnummer</label>
						<div class="flex justify-between mb-4">
							<input data-target="customer.huisnummer"
							       type="text"
							       value="{{ old('huisnummer') }}"
							       name="huisnummer"
							       class="p-1 transition bg-white shadow focus:shadow-inner focus:outline-none border border-transparent focus:border-gray-300 placeholder-gray-700 block w-full appearance-none"
							></div>
						<label for="plaats"
						       class="font-hairline"
						>Plaats</label>
						<div class="flex justify-between mb-4">
							<input data-target="customer.plaats"
							       type="text"
							       value="{{ old('plaats') }}"
							       name="plaats"
							       class="p-1 transition bg-white shadow focus:shadow-inner focus:outline-none border border-transparent focus:border-gray-300 placeholder-gray-700 block w-full appearance-none"
							></div>
						<label for="postcode"
						       class="font-hairline"
						>Postcode</label>
						<div class="flex justify-between mb-4">
							<input data-target="customer.postcode"
							       type="text"
							       value="{{ old('postcode') }}"
							       name="postcode"
							       class="p-1 transition bg-white shadow focus:shadow-inner focus:outline-none border border-transparent focus:border-gray-300 placeholder-gray-700 block w-full appearance-none"
							></div>

					</div>
					<button type="submit"
					>Opslaan
					</button>
					<button data-action="customer#cancel"
					>Annuleer
					</button>
				</div>
			</form>
			<hr>
		</div>
	</div>
@stop
