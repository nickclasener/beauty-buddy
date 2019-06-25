@extends('layouts.main')
@section('main')
	<div class="container mx-auto flex">
		<div class="bg-white mx-auto w-1/2 my-15 py-10 h-full">
			<form action="{{ route('klanten.store', false) }}"
{{--			      method="POST"--}}
								      data-controller="customer"
										  data-customer-url="{{ route('klanten.store', false) }}"
										  data-action="customer#create"

			>@method('POST')@csrf
				<div class="px-15">
					<h2 class="font-hairline text-buddy-teal mb-5">Contactinformatie</h2>
					<label for="naam"
					       class="font-hairline"
					>Naam</label>
					<div class="flex justify-between items-center mb-5">
						<input data-target="customer.naam"
						       type="text"
						       value="{{ old('naam') }}"
						       name="naam"
						       class="bg-transparent appearance-none focus:outline-none"
						>
					</div>
					<label for="geboortedatum"
					       class="font-hairline"
					>Geboortedatum:</label>
					<div class="flex justify-between items-center mb-5">
						<input data-target="customer.geboortedatum"
						       type="text"
						       name="geboortedatum"
						       value="{{ old('geboortedatum')  }}"
						       class="bg-transparent appearance-none focus:outline-none"
						></div>
					<label for="email"
					       class="font-hairline"
					>Email</label>
					<div class="flex justify-between items-center mb-5">
						<input data-target="customer.email"
						       type="text"
						       value="{{ old('email') }}"
						       name="email"
						       class="bg-transparent appearance-none focus:outline-none"

						></div>

					<label for="mobiel"
					       class="font-hairline"
					>Mobiel</label>
					<div class="flex justify-between mb-5">
						<input data-target="customer.mobiel"
						       type="text"
						       value="{{ old('mobiel') }}"
						       name="mobiel"
						       class="bg-transparent appearance-none focus:outline-none"

						></div>

					<label for="telefoon"
					       class="font-hairline"
					>Telefoon</label>
					<div class="flex justify-between mb-5">
						<input data-target="customer.telefoon"
						       type="text"
						       value="{{ old('telefoon') }}"
						       name="telefoon"
						       class="bg-transparent appearance-none focus:outline-none"

						></div>
				</div>

				<hr class="border-b border-dashed mb-5 mx-10">
				<div class="mx-15">
					<h2 class="font-hairline text-buddy-teal  mb-5">Adresinformatie</h2>
					<label for="straatnaam"
					       class="font-hairline"
					>Straatnaam</label>
					<div class="flex justify-between mb-5">
						<input data-target="customer.straatnaam"
						       type="text"
						       value="{{ old('straatnaam') }}"
						       name="straatnaam"
						       class="bg-transparent appearance-none focus:outline-none"
						></div>
					<label for="huisnummer"
					       class="font-hairline"
					>Huisnummer</label>
					<div class="flex justify-between mb-5">
						<input data-target="customer.huisnummer"
						       type="text"
						       value="{{ old('huisnummer') }}"
						       name="huisnummer"
						       class="bg-transparent appearance-none focus:outline-none"
						></div>
					<label for="plaats"
					       class="font-hairline"
					>Plaats</label>
					<div class="flex justify-between mb-5">
						<input data-target="customer.plaats"
						       type="text"
						       value="{{ old('plaats') }}"
						       name="plaats"
						       class="bg-transparent appearance-none focus:outline-none"
						></div>
					<label for="postcode"
					       class="font-hairline"
					>Postcode</label>
					<div class="flex justify-between mb-5">
						<input data-target="customer.postcode"
						       type="text"
						       value="{{ old('postcode') }}"
						       name="postcode"
						       class="bg-transparent appearance-none focus:outline-none"
						></div>
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
