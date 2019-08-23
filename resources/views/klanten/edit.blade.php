<div class="flex flex-col items-center lg:mt-0">
	<div class="flex justify-between w-full">
		<form action="{{ route('customer.destroy', $customer, false) }}"
		      method="POST"
		      data-action="customer#delete"
		>
			@method('DELETE')@csrf
			<button type="submit"
			        class="p-4 group"
			>{{ svg_image('lineicons/trash', 'fill-current self-center text-red-300 group-hover:text-red-600 h-8') }}
			</button>
		</form>
		<h1 class="font-hairline w-full text-center pt-4">Update Klant Gegevens</h1>
		<button data-action="toggle#toggle"
		        class="p-4 group flex items-center"
		>{{ svg_image('lineicons/close', 'fill-current self-center text-blue-300 group-hover:text-blue-600 h-8 p-1') }}
		</button>
	</div>
</div>
<hr class="border-b border-dashed mb-4 mt-0">
<form action="{{ route('customer.update', $customer, false) }}"
      method="post"
      data-action="customer#update"
>@method('PATCH')@csrf
	<div class="px-4 customer">
		<h2 class="font-hairline pb-2">Contactinformatie:</h2>
		<div class="pb-4">
			<label for="naam"
			       class="font-hairline"
			>Naam</label>
			<input data-target="customer.naam"
			       type="text"
			       value="{{ old('naam') ?: $customer->naam }}"
			       name="naam"
			       class="p-1 transition bg-white shadow-md focus:shadow-inner focus:outline-none border border-transparent border-gray-200 focus:border-gray-300 placeholder-gray-700 block w-full appearance-none"
			>
		</div>
		<div class="pb-4">
			<label for="geboortedatum"
			       class="font-hairline"
			>Geboortedatum:</label>
			<input data-target="customer.geboortedatum"
			       type="text"
			       name="geboortedatum"
			       data-controller="flatpickr"
			       data-flatpickr-enable-time="false"
			       data-flatpickr-date-format="d-m-Y"
			       data-flatpickr-now="{{ now()->format('d-m-Y') }}"
			       placeholder="{{ now()->format('d-m-Y') }}"
			       value="{{ old('geboortedatum') ?: $customer->geboortedatum  }}"
			       class="p-1 transition bg-white shadow-md focus:shadow-inner focus:outline-none border border-transparent border-gray-200 focus:border-gray-400 placeholder-gray-700 block w-full appearance-none"
			></div>
		<div class="pb-4">
			<label for="email"
			       class="font-hairline"
			>Email</label>
			<input data-target="customer.email"
			       type="text"
			       value="{{ old('email') ?: $customer->email }}"
			       name="email"
			       class="p-1 transition bg-white shadow-md focus:shadow-inner focus:outline-none border border-transparent border-gray-200 focus:border-gray-400 placeholder-gray-700 block w-full appearance-none"
			></div>

		<div class="pb-4">
			<label for="mobiel"
			       class="font-hairline"
			>Mobiel</label>
			<input data-target="customer.mobiel"
			       type="text"
			       value="{{ old('mobiel') ?: $customer->mobiel }}"
			       name="mobiel"
			       class="p-1 transition bg-white shadow-md focus:shadow-inner focus:outline-none border border-transparent border-gray-200 focus:border-gray-400 placeholder-gray-700 block w-full appearance-none"
			></div>

		<div class="pb-4">
			<label for="telefoon"
			       class="font-hairline"
			>Telefoon</label>
			<input data-target="customer.telefoon"
			       type="text"
			       value="{{ old('telefoon') ?: $customer->telefoon }}"
			       name="telefoon"
			       class="p-1 transition bg-white shadow-md focus:shadow-inner focus:outline-none border border-transparent border-gray-200 focus:border-gray-400 placeholder-gray-700 block w-full appearance-none"
			></div>
	</div>
	<hr class="border-b border-dashed my-4">
	<div class="px-4 customer">
		<h2 class="font-hairline pb-2">Adresinformatie</h2>
		<div class="pb-4">
			<label for="straatnaam"
			       class="font-hairline"
			>Straatnaam</label>
			<input data-target="customer.straatnaam"
			       type="text"
			       value="{{ old('straatnaam') ?: $customer->straatnaam }}"
			       name="straatnaam"
			       class="p-1 transition bg-white shadow-md focus:shadow-inner focus:outline-none border border-transparent border-gray-200 focus:border-gray-400 placeholder-gray-700 block w-full appearance-none"
			></div>
		<div class="pb-4">
			<label for="huisnummer"
			       class="font-hairline"
			>Huisnummer</label>
			<input data-target="customer.huisnummer"
			       type="text"
			       value="{{ old('huisnummer') ?: $customer->huisnummer }}"
			       name="huisnummer"
			       class="p-1 transition bg-white shadow-md focus:shadow-inner focus:outline-none border border-transparent border-gray-200 focus:border-gray-400 placeholder-gray-700 block w-full appearance-none"
			></div>
		<div class="pb-4">
			<label for="plaats"
			       class="font-hairline"
			>Plaats</label>
			<input data-target="customer.plaats"
			       type="text"
			       value="{{ old('plaats') ?: $customer->plaats }}"
			       name="plaats"
			       class="p-1 transition bg-white shadow-md focus:shadow-inner focus:outline-none border border-transparent border-gray-200 focus:border-gray-400 placeholder-gray-700 block w-full appearance-none"
			></div>
		<div class="pb-4">
			<label for="postcode"
			       class="font-hairline"
			>Postcode</label>
			<input data-target="customer.postcode"
			       type="text"
			       value="{{ old('postcode') ?: $customer->postcode }}"
			       name="postcode"
			       class="p-1 transition bg-white shadow-md focus:shadow-inner focus:outline-none border border-transparent border-gray-200 focus:border-gray-400 placeholder-gray-700 block w-full appearance-none"
			></div>
	</div>
	<hr class="border-b border-dashed mb-0 mt-1">
	<div class="flex justify-end items-baseline">
		<button class="cursor-pointer p-4 bg-transparent text-teal-200 hover:text-teal-500 focus:outline-none"
		        type="submit"
		>{{ svg_image('lineicons/save', 'fill-current h-8') }}
		</button>
	</div>
</form>
