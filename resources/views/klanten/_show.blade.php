<div class="flex flex-col items-center mb-5">
	<div class="flex justify-between w-full px-12.5">
		<form action="{{ route('klanten.destroy', $customer, false) }}"
		      method="POST"
		      data-action="customer#delete"
		>
			@method('DELETE')@csrf
			<button type="submit"
			        class="p-4"
			>
				{{ svg_image('lineicons/trash', 'fill-current self-center text-red-300 hover:text-red-600 h-8') }}
			</button>
		</form>

		<button data-action="toggle#toggle"
		        class="p-4"
		>
			{{ svg_image('lineicons/pencil-alt', 'fill-current self-center text-red-300 hover:text-red-600 h-8') }}
		</button>
	</div>
	<div class="h-50 w-50 mb-4 -mt-8">
		<img src="{{ asset('img/logan-browning.jpg') }}"
		     class="rounded-full w-50 h-50 object-cover object-center overflow-hidden"
		     alt="{{ $customer->naam }}"
		>
	</div>


	<h2 class="font-light">{{ $customer->naam }}</h2>
	<h2 class="font-hairline">{{ $customer->geboortedatum }}</h2>
</div>
<hr class="border-b border-dashed mb-4 lg:mx-8">
<div class="px-12">
	<h2 class="font-hairline text-buddy-teal mb-4">Contactinformatie</h2>

	<label for="email"
	       class="font-hairline"
	>Email</label>
	<div class="flex justify-between items-center mb-4"
	     data-controller="clipboard"
	>
		<input data-target="clipboard.source"
		       type="text"
		       value="{{ $customer->email }}"
		       name="email"
		       class="bg-transparent appearance-none focus:outline-none"
		       readonly
		>
		<button data-action="clipboard#copy">
			{{ svg_image('lineicons/clipboard', 'fill-current text-gray-800 h-8 -mt-2') }}
		</button>
	</div>

	<label for="mobiel"
	       class="font-hairline"
	>Mobiel</label>
	<div class="flex justify-between mb-4"
	     data-controller="clipboard"
	>
		<input data-target="clipboard.source"
		       type="text"
		       value="{{ $customer->mobiel }}"
		       name="mobiel"
		       class="bg-transparent appearance-none focus:outline-none"
		       readonly
		>
		<button data-action="clipboard#copy">
			{{ svg_image('lineicons/clipboard', 'fill-current text-gray-800 h-8 -mt-2') }}
		</button>
	</div>

	<label for="telefoon"
	       class="font-hairline"
	>Telefoon</label>
	<div class="flex justify-between mb-5"
	     data-controller="clipboard"
	>
		<input data-target="clipboard.source"
		       type="text"
		       value="{{ $customer->telefoon }}"
		       name="telefoon"
		       class="bg-transparent appearance-none focus:outline-none"
		       readonly
		>
		<button data-action="clipboard#copy">
			{{ svg_image('lineicons/clipboard', 'fill-current text-gray-800 h-8 -mt-2') }}
		</button>
	</div>
</div>

<hr class="border-b border-dashed mb-5 lg:mx-10">
<div class="mx-14">
	<h2 class="font-hairline text-buddy-teal mb-5">Adresinformatie</h2>

	<label for="straatnaam + huisnummer"
	       class="font-hairline"
	>Straatnaam + Huisnummer</label>
	<div class="flex justify-between mb-5"
	     data-controller="clipboard"
	>
		<input data-target="clipboard.source"
		       type="text"
		       value="{{ $customer->straatnaam }} {{ $customer->huisnummer }}"
		       name="straatnaam + huisnummer"
		       class="bg-transparent appearance-none focus:outline-none"
		       readonly
		>
		<button data-action="clipboard#copy">
			{{ svg_image('lineicons/clipboard', 'fill-current text-gray-800 h-8 -mt-2') }}
		</button>
	</div>

	<label for="plaats"
	       class="font-hairline"
	>Plaats</label>
	<div class="flex justify-between mb-5"
	     data-controller="clipboard"
	>
		<input data-target="clipboard.source"
		       type="text"
		       value="{{ $customer->plaats }}"
		       name="plaats"
		       class="bg-transparent appearance-none focus:outline-none"
		       readonly
		>
		<button data-action="clipboard#copy">
			{{ svg_image('lineicons/clipboard', 'fill-current text-gray-800 h-8 -mt-2') }}
		</button>
	</div>

	<label for="postcode"
	       class="font-hairline"
	>Postcode</label>
	<div class="flex justify-between mb-5"
	     data-controller="clipboard"
	>
		<input data-target="clipboard.source"
		       type="text"
		       value="{{ $customer->postcode }}"
		       name="postcode"
		       class="bg-transparent appearance-none focus:outline-none"
		       readonly
		>
		<button data-action="clipboard#copy">
			{{ svg_image('lineicons/clipboard', 'fill-current text-gray-800 h-8 -mt-2') }}
		</button>
	</div>
</div>
