<div class="flex flex-col items-center pb-4 lg:mt-0">
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
		<button data-action="toggle#toggle"
		        class="p-4 group"
		>{{ svg_image('lineicons/pencil-alt', 'fill-current self-center text-blue-300 group-hover:text-blue-600 h-8') }}
		</button>
	</div>
	<div class="h-50 w-50 md:w-64 md:h-64 lg:w-50 lg:h-50 mb-4 -mt-8">
		<img src="{{ asset('img/logan-browning.jpg') }}"
		     class="rounded-full w-50 h-50 md:w-64 md:h-64 lg:w-50 lg:h-50 object-cover object-center overflow-hidden"
		     alt="{{ $customer->naam }}"
		>
	</div>
	<h2 class="font-light">{{ $customer->naam }}</h2>
	<h2 class="font-hairline">{{ date('d-m-Y',strtotime($customer->geboortedatum)) }}</h2>
</div>
<hr class="border-b border-dashed my-4">
<div class="mx-4 customer">
	<h2 class="font-hairline pb-2">Contactinformatie:</h2>
	<label for="email"
	       class="font-hairline"
	>Email</label>
	<div class="flex justify-between items-center pb-4"
	     data-controller="clipboard"
	>
		<input data-target="clipboard.source"
		       type="text"
		       value="{{ $customer->email }}"
		       name="email"
		       class="bg-transparent appearance-none focus:outline-none w-full"
		       readonly
		>
		@include('layouts._clipboard')
	</div>

	<label for="mobiel"
	       class="font-hairline"
	>Mobiel</label>
	<div class="flex justify-between pb-4"
	     data-controller="clipboard"
	>
		<input data-target="clipboard.source"
		       type="text"
		       value="{{ $customer->mobiel }}"
		       name="mobiel"
		       class="bg-transparent appearance-none focus:outline-none w-full"
		       readonly
		>
		@include('layouts._clipboard')
	</div>

	<label for="telefoon"
	       class="font-hairline"
	>Telefoon</label>
	<div class="flex justify-between"
	     data-controller="clipboard"
	>
		<input data-target="clipboard.source"
		       type="text"
		       value="{{ $customer->telefoon }}"
		       name="telefoon"
		       class="bg-transparent appearance-none focus:outline-none w-full"
		       readonly
		>
		@include('layouts._clipboard')
	</div>
</div>
<hr class="border-b border-dashed my-4">
<div class="px-4 customer">
	<h2 class="font-hairline pb-2">Adresinformatie:</h2>

	<label for="straatnaam + huisnummer"
	       class="font-hairline"
	>Straatnaam + Huisnummer</label>
	<div class="flex justify-between pb-4"
	     data-controller="clipboard"
	>
		<input data-target="clipboard.source"
		       type="text"
		       value="{{ $customer->straatnaam }} {{ $customer->huisnummer }}"
		       name="straatnaam + huisnummer"
		       class="bg-transparent appearance-none focus:outline-none w-full"
		       readonly
		>
		@include('layouts._clipboard')
	</div>

	<label for="plaats"
	       class="font-hairline"
	>Plaats</label>
	<div class="flex justify-between pb-4"
	     data-controller="clipboard"
	>
		<input data-target="clipboard.source"
		       type="text"
		       value="{{ $customer->plaats }}"
		       name="plaats"
		       class="bg-transparent appearance-none focus:outline-none w-full"
		       readonly
		>
		@include('layouts._clipboard')
	</div>

	<label for="postcode"
	       class="font-hairline"
	>Postcode</label>
	<div class="flex justify-between pb-4"
	     data-controller="clipboard"
	>
		<input data-target="clipboard.source"
		       type="text"
		       value="{{ $customer->postcode }}"
		       name="postcode"
		       class="bg-transparent appearance-none focus:outline-none w-full"
		       readonly
		>
		@include('layouts._clipboard')
	</div>
</div>
