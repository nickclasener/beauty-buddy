{{--@extends('layouts.app')--}}

{{--@section('content')--}}

<div class="flex flex-col mb-5">
	<div class="self-end bg-buddy-lightest rounded-full w-15 h-15 flex justify-center mr-9"
	     data-action="click->toggle#toggle"
	>
		@svg('cross-circle',['class'=>'h-7 w-7 fill-current text-white self-center'])
	</div>
	<form action="{{ route('klanten.update', $customer, false) }}"
	      method="post"
	      data-action="customer#update"
	>@method('PATCH')@csrf
		<div class="px-15">
			<h2 class="font-hairline text-buddy-teal  mb-5">Contactinformatie</h2>
			<label for="naam"
			       class="font-hairline"
			>Naam</label>
			<div class="flex justify-between items-center mb-5">
				<input data-target="customer.naam"
				       type="text"
				       value="{{ old('naam') ?: $customer->naam }}"
				       name="naam"
				       class="bg-transparent appearance-none focus:outline-none"
				></div>
			<label for="geboortedatum"
			       class="font-hairline"
			>Geboortedatum:</label>
			<div class="flex justify-between items-center mb-5">

				<input data-target="customer.geboortedatum"
				       type="text"
				       name="geboortedatum"
				       value="{{ old('geboortedatum') ?: $customer->geboortedatum  }}"
				       class="bg-transparent appearance-none focus:outline-none"
				></div>
			<label for="email"
			       class="font-hairline"
			>Email</label>
			<div class="flex justify-between items-center mb-5">
				<input data-target="customer.email"
				       type="text"
				       value="{{ old('email') ?: $customer->email }}"
				       name="email"
				       class="bg-transparent appearance-none focus:outline-none"
				></div>

			<label for="mobiel"
			       class="font-hairline"
			>Mobiel</label>
			<div class="flex justify-between mb-5">
				<input data-target="customer.mobiel"
				       type="text"
				       value="{{ old('mobiel') ?: $customer->mobiel }}"
				       name="mobiel"
				       class="bg-transparent appearance-none focus:outline-none"
				></div>

			<label for="telefoon"
			       class="font-hairline"
			>Telefoon</label>
			<div class="flex justify-between mb-5">
				<input data-target="customer.telefoon"
				       type="text"
				       value="{{ old('telefoon') ?: $customer->telefoon }}"
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
				       value="{{ old('straatnaam') ?: $customer->straatnaam }}"
				       name="straatnaam"
				       class="bg-transparent appearance-none focus:outline-none"
				></div>
			<label for="huisnummer"
			       class="font-hairline"
			>Huisnummer</label>
			<div class="flex justify-between mb-5">
				<input data-target="customer.huisnummer"
				       type="text"
				       value="{{ old('huisnummer') ?: $customer->huisnummer }}"
				       name="huisnummer"
				       class="bg-transparent appearance-none focus:outline-none"
				></div>
			<label for="plaats"
			       class="font-hairline"
			>Plaats</label>
			<div class="flex justify-between mb-5">
				<input data-target="customer.plaats"
				       type="text"
				       value="{{ old('plaats') ?: $customer->plaats }}"
				       name="plaats"
				       class="bg-transparent appearance-none focus:outline-none"
				></div>
			<label for="postcode"
			       class="font-hairline"
			>Postcode</label>
			<div class="flex justify-between mb-5">
				<input data-target="customer.postcode"
				       type="text"
				       value="{{ old('postcode') ?: $customer->postcode }}"
				       name="postcode"
				       class="bg-transparent appearance-none focus:outline-none"
				></div>
			<button type="submit"
			>Update
			</button>
		</div>
	</form>
</div>
{{--@endsection--}}
