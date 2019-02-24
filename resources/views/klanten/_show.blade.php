<div class="flex flex-col items-center mb-5">
	<div class="self-end bg-buddy-lightest rounded-full w-15 h-15 flex justify-center mr-9"
	     data-action="click->toggle#toggle"
	>
		@svg('icon-136-document-edit',['class'=>'ml-2 fill-current text-white self-center'])
	</div>
	<div class="h-50 w-50 mb-5">
		<img src="{{ asset('img/logan-browning.jpg') }}"
		     class="rounded-full w-50 h-50 object-cover object-center overflow-hidden"
		     alt="name"
		>
	</div>


	<h2 class="font-light">{{ $customer->naam }}</h2>
	<h2 class="font-hairline">{{ $customer->geboortedatum }}</h2>
</div>
<hr class="border-b border-dashed mb-5 mx-10">
<div class="px-15">
	<h2 class="font-hairline text-buddy-teal  mb-5">Contactinformatie</h2>

	<label for="email"
	       class="font-hairline"
	>Email</label>
	<div class="flex justify-between items-center mb-5"
	     data-controller="clipboard"
	>
		<input data-target="clipboard.source"
		       type="text"
		       value="{{ $customer->email }}"
		       name="email"
		       class="bg-transparent appearance-none focus:outline-none"
		       readonly
		>
		<button class="h-5 w-5"
		        data-action="clipboard#copy"
		>@svg('icon-33-clipboard-add',['class'=>' -mt-2'])
		</button>
	</div>

	<label for="mobiel"
	       class="font-hairline"
	>Mobiel</label>
	<div class="flex justify-between mb-5"
	     data-controller="clipboard"
	>
		<input data-target="clipboard.source"
		       type="text"
		       value="{{ $customer->mobiel }}"
		       name="mobiel"
		       class="bg-transparent appearance-none focus:outline-none"
		       readonly
		>
		<button class="h-5 w-5"
		        data-action="clipboard#copy"
		>@svg('icon-33-clipboard-add',['class'=>' -mt-2'])
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
		<button class="h-5 w-5"
		        data-action="clipboard#copy"
		>@svg('icon-33-clipboard-add',['class'=>' -mt-2'])
		</button>
	</div>
</div>

<hr class="border-b border-dashed mb-5 mx-10">
<div class="mx-15">
	<h2 class="font-hairline text-buddy-teal  mb-5">Adresinformatie</h2>

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
		<button class="h-5 w-5"
		        data-action="clipboard#copy"
		>@svg('icon-33-clipboard-add',['class'=>' -mt-2'])
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
		<button class="h-5 w-5"
		        data-action="clipboard#copy"
		>@svg('icon-33-clipboard-add',['class'=>' -mt-2'])
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
		<button class="h-5 w-5"
		        data-action="clipboard#copy"
		>@svg('icon-33-clipboard-add',['class'=>' -mt-2'])
		</button>
	</div>
</div>
