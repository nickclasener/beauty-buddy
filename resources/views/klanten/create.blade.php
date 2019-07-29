@extends('layouts.main')
@section('main')
	<div class="w-full pt-4"></div>
	<div class="container mx-auto flex">
		<div class="bg-white mx-auto w-1/2 my-4 py-4 h-full shadow-2xl">

			<h1 class="font-hairline w-full text-center pt-4">Nieuwe Klant?</h1>
			<hr class="border-b border-dashed my-8 lg:mx-4">
			<form action="{{ route('customer.store', false) }}"
			      data-controller="customer"
			      data-customer-url="{{ route('customer.store', false) }}"
			      data-action="customer#create"
			>@method('POST')@csrf
				<div class="mx-4 lg:mx-8 customer">
					<h2 class="font-hairline mb-4">Contactinformatie:</h2>
					<div class="mx-4">
						<label for="naam"
						       class="font-hairline"
						>Naam</label>
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
							       placeholder="Jane@Doe.com"
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
							       placeholder="06 87 65 43 21"
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
							       placeholder="03 15 45 76 12"
							       class="p-1 transition bg-white shadow focus:shadow-inner focus:outline-none border border-transparent focus:border-gray-300 placeholder-gray-700 block w-full appearance-none"

							></div>
					</div>
				</div>

				<hr class="border-b border-dashed my-8 lg:mx-4">
				<div class="mx-4 lg:mx-8 customer -mt-2">
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
							       placeholder="Bourbon Street "
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
							       placeholder="1"
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
							       placeholder="Laraville"
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
							       placeholder="6986AD"
							       class="p-1 transition bg-white shadow focus:shadow-inner focus:outline-none border border-transparent focus:border-gray-300 placeholder-gray-700 block w-full appearance-none"
							></div>
					</div>
					<p class="w-full text-red-500 px-4  py-4  border-t border-dashed hidden"
					   data-target="customer.error"
					></p>
					<div class="flex justify-between px-4   border-t border-dashed">
						<button data-action="customer#cancel toggle#toggle"
						        class="cursor-pointer py-2 px-4 bg-transparent text-red-200 hover:text-red-500 focus:outline-none"
						>{{ svg_image('lineicons/close', 'h-6 fill-current') }}
						</button>
						<button class="cursor-pointer py-2 px-4 bg-transparent text-teal-200 hover:text-teal-500 focus:outline-none"
						        type="submit"
						>{{ svg_image('lineicons/save', 'fill-current h-6') }}
						</button>
					</div>
				</div>
			</form>
			<hr>
		</div>
	</div>
@stop
