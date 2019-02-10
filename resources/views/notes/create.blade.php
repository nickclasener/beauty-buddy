<form action="{{ route('notities.store', $customer) }}"
      method="POST"
      data-action="notes#create"
>
	@method('POST')@csrf
	<div class=" border-b border-buddy-teal-light focus-within:border-buddy-teal-dark pt-10 pl-10 pr-10">
	<textarea type="text"
	          class="resize-none w-full"
	          rows="5"
	          name="body"
	          placeholder="Hoe is de behandeling gegaan?
Zijn er veder noemenswaardigheden"
	          data-target="notes.body"
	          required
	>{{ old('body') }}</textarea>
		<hr>
		<div class="w-full flex">
			<button data-action="notes#cancel"
			        class="w-1/2 px-5 py-5 rounded mb-5 mx-5 text-red"
			>
				Annuleer
			</button>
			<button type="submit"
			        class="w-1/2  py-5 border rounded mb-5 mx-5"
			>Voeg Notitie
			</button>
		</div>
	</div>
</form>
