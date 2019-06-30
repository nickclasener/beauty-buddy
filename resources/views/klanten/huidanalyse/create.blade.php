<div class="pt-10">
	<form action="{{  route('huidanalyse.store', $customer, false) }}"
	      data-action="autocomplete2#removeResults huidanalyses#create"
	>@method('POST')@csrf
		<div class="border-b border-dashed focus-within:border-buddy-lightest px-10 ">
		<textarea contenteditable="true"
		          type="text"
		          class="resize-none w-full h-auto"
		          rows="5"
		          name="body"
		          placeholder="Hoe is de behandeling gegaan?
Zijn er veder noemenswaardigheden"
		          data-target="huidanalyses.body"
		          required
		>{{ old('body') }}</textarea>
			<hr>
			<div class="w-full flex mb-5">
				<button type="submit"
				        class="w-1/2 text-buddy-lightest hover:text-buddy-darker"
				>Voeg huidanalyse
				</button>
				<button data-action="huidanalyses#cancel  toggle#toggle"
				        class="w-1/2 px-5 rounded text-red-lighter hover:text-red-light"
				>
					Annuleer
				</button>

			</div>
		</div>
	</form>
</div>
