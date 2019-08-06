@extends('layouts.main')
@section('main')
	<div class="container mx-auto flex lg:pt-0 items-center mt-16">
		<div class="bg-white mx-auto lg:w-2/3 md:w-3/4 sm:w-4/5 w-full pt-4">
			<h1 class="font-hairline w-full text-center pb-4">Nieuwe Klant</h1>
			<hr class="border-b border-dashed mb-4 mt-0">
			<form action="{{ route('customer.store', false) }}"
			      method="POST"
			>@method('POST')@csrf
				{{--			      data-controller="customer"--}}
				{{--			      data-customer-url="{{ route('customer.store', false) }}"--}}
				{{--			      data-action="customer#create"--}}
				{{--				>@method('POST')@csrf--}}
				<div class="mx-4 customer">
					<h2 class="font-hairline mb-2">Contactinformatie:</h2>
					<div class="pb-4">
						<label for="naam"
						       class="font-hairline"
						>Naam</label>
						<input data-target="customer.naam"
						       type="text"
						       value="{{ old('naam') }}"
						       name="naam"
						       placeholder="Jane Doe"
						       class="p-1 transition bg-white shadow focus:shadow-inner focus:outline-none border border-transparent focus:border-gray-300 placeholder-gray-700 block w-full appearance-none"
						>
					</div>
					<div class="pb-4">

						<label for="geboortedatum"
						       class="font-hairline"
						>Geboortedatum</label>
						<input data-target="customer.geboortedatum"
						       type="text"
						       name="geboortedatum"
						       value="{{ old('geboortedatum') }}"
						       data-controller="flatpickr"
						       data-flatpickr-enable-time="false"
						       data-flatpickr-date-format="d-m-Y"
						       data-flatpickr-now="{{ now()->format('d-m-Y') }}"
						       placeholder="{{ now()->format('d-m-Y') }}"
						       class="p-1 transition bg-white shadow focus:shadow-inner focus:outline-none border border-transparent focus:border-gray-300 placeholder-gray-700 block w-full appearance-none"
						>
						{{--						<input data-target="customer.geboortedatum"--}}
						{{--						       id="flatpicker"--}}
						{{--						       type="date"--}}
						{{--						       name="geboortedatum"--}}
						{{--						       value="{{ old('geboortedatum')  }}"--}}
						{{--						       placeholder="20-12-1991"--}}
						{{--						class="p-1 transition bg-white shadow focus:shadow-inner focus:outline-none border border-transparent focus:border-gray-300 placeholder-gray-700 block w-full appearance-none"--}}
						{{--						>--}}
					</div>
					<div class="pb-4">
						<label for="email"
						       class="font-hairline"
						>Email</label>
						<input data-target="customer.email"
						       type="text"
						       value="{{ old('email') }}"
						       name="email"
						       placeholder="Jane@Doe.com"
						       class="p-1 transition bg-white shadow focus:shadow-inner focus:outline-none border border-transparent focus:border-gray-300 placeholder-gray-700 block w-full appearance-none"

						></div>
					<div class="pb-4">

						<label for="mobiel"
						       class="font-hairline"
						>Mobiel</label>
						<input data-target="customer.mobiel"
						       type="text"
						       value="{{ old('mobiel') }}"
						       name="mobiel"
						       placeholder="06 87 65 43 21"
						       class="p-1 transition bg-white shadow focus:shadow-inner focus:outline-none border border-transparent focus:border-gray-300 placeholder-gray-700 block w-full appearance-none"
						></div>
					<div class="pb-4">

						<label for="telefoon"
						       class="font-hairline"
						>Telefoon</label>
						<input data-target="customer.telefoon"
						       type="text"
						       value="{{ old('telefoon') }}"
						       name="telefoon"
						       placeholder="03 15 45 76 12"
						       class="p-1 transition bg-white shadow focus:shadow-inner focus:outline-none border border-transparent focus:border-gray-300 placeholder-gray-700 block w-full appearance-none"

						></div>
				</div>
				<hr class="border-b border-dashed mt-0">
				<div class="mx-4 customer">
					<h2 class="font-hairline pb-2">Adresinformatie</h2>
					<div class="pb-4">
						<label for="straatnaam"
						       class="font-hairline"
						>Straatnaam</label>
						<input data-target="customer.straatnaam"
						       type="text"
						       value="{{ old('straatnaam') }}"
						       name="straatnaam"
						       placeholder="Bourbon Street "
						       class="p-1 transition bg-white shadow focus:shadow-inner focus:outline-none border border-transparent focus:border-gray-300 placeholder-gray-700 block w-full appearance-none"
						></div>
					<div class="pb-4">
						<label for="huisnummer"
						       class="font-hairline"
						>Huisnummer</label>
						<input data-target="customer.huisnummer"
						       type="text"
						       value="{{ old('huisnummer') }}"
						       name="huisnummer"
						       placeholder="1"
						       class="p-1 transition bg-white shadow focus:shadow-inner focus:outline-none border border-transparent focus:border-gray-300 placeholder-gray-700 block w-full appearance-none"
						></div>
					<div class="pb-4">
						<label for="plaats"
						       class="font-hairline"
						>Plaats</label>
						<input data-target="customer.plaats"
						       type="text"
						       value="{{ old('plaats') }}"
						       name="plaats"
						       placeholder="Laraville"
						       class="p-1 transition bg-white shadow focus:shadow-inner focus:outline-none border border-transparent focus:border-gray-300 placeholder-gray-700 block w-full appearance-none"
						></div>
					<div class="pb-4">
						<label for="postcode"
						       class="font-hairline"
						>Postcode</label>
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

				<hr class="border-b border-dashed my-0">
				<div class="flex justify-between mx-4">
					<button data-action="customer#cancel toggle#toggle"
					        class="cursor-pointer p-4 bg-transparent text-red-200 hover:text-red-500 focus:outline-none"
					>{{ svg_image('lineicons/close', 'h-8 fill-current') }}
					</button>
					<button class="cursor-pointer p-4 bg-transparent text-teal-200 hover:text-teal-500 focus:outline-none"
					        type="submit"
					>{{ svg_image('lineicons/save', 'fill-current h-8') }}
					</button>
				</div>
			</form>
		</div>
	</div>
@stop
