<form action="{{  route('notes.store', $customer) }}"
      method="POST"
      data-action="autocomplete2#removeResults notes#create"
>@method('POST')@csrf
	<div class="border-b border-dashed focus-within:border-buddy-lightest px-4">
		<textarea contenteditable="true"
		          type="text"
		          class="resize-none w-full h-auto"
		          rows="4"
		          name="body"
		          placeholder="Hoe is de behandeling gegaan?
Zijn er veder noemenswaardigheden"
		          data-target="notes.body"
		          required
		>{{ old('body') }}</textarea>
		<div class="w-full flex h-12 my-4">
			<button type="submit"
			        class="w-1/2 text-buddy-lightest hover:text-buddy-darker"
			>Voeg Notitie
			</button>
			<button data-action="notes#cancel toggle#toggle"
			        class="w-1/2 px-4 rounded text-red-lighter hover:text-red-light"
			>
				Annuleer
			</button>
		</div>
	</div>
</form>
