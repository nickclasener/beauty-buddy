<form action="{{ route('klanten.store') }}"
      method="POST"
>@method('POST')@csrf
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
			       value="{{ old('email') }}"
			       name="email"
			       class="bg-transparent appearance-none focus:outline-none"

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
			       value="{{ old('mobiel') }}"
			       name="mobiel"
			       class="bg-transparent appearance-none focus:outline-none"

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
			       value="{{ old('telefoon') }}"
			       name="telefoon"
			       class="bg-transparent appearance-none focus:outline-none"

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

		<label for="straatnaam"
		       class="font-hairline"
		>Straatnaam</label>
		<div class="flex justify-between mb-5"
		     data-controller="clipboard"
		>
			<input data-target="clipboard.source"
			       type="text"
			       value="{{ old('straatnaam') }}"
			       name="straatnaam"
			       class="bg-transparent appearance-none focus:outline-none"
			>
			<button class="h-5 w-5"
			        data-action="clipboard#copy"
			>@svg('icon-33-clipboard-add',['class'=>' -mt-2'])
			</button>
		</div>
		<label for="huisnummer"
		       class="font-hairline"
		>Huisnummer</label>
		<div class="flex justify-between mb-5"
		     data-controller="clipboard"
		>
			<input data-target="clipboard.source"
			       type="text"
			       value="{{ old('huisnummer') }}"
			       name="huisnummer"
			       class="bg-transparent appearance-none focus:outline-none"
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
			       value="{{ old('plaats') }}"
			       name="plaats"
			       class="bg-transparent appearance-none focus:outline-none"
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
			       value="{{ old('postcode') }}"
			       name="postcode"
			       class="bg-transparent appearance-none focus:outline-none"
			>
			<button class="h-5 w-5"
			        data-action="clipboard#copy"
			>@svg('icon-33-clipboard-add',['class'=>' -mt-2'])
			</button>
		</div>
	</div>
	<button type="submit"
	>Opslaan
	</button>
</form>

<hr>



