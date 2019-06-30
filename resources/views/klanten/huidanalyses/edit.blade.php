<form action="{{ route('huidanalyse.update', $huidanalyse, false) }}"
      method="POST"
      data-action="huidanalyse#edit toggle#toggle"
      class="w-full"
>@method('PATCH') @csrf
	<div class="border-b border-dashed focus-within:border-buddy-lightest pl-10 pr-10">
	<textarea type="text"
	          class="overflow-visible resize-none block w-full"
	          rows="5"
	          name="body"
	          placeholder="Hoe is de behandeling gegaan?
Zijn er veder noemenswaardigheden"
	          data-target="huidanalyse.body"
	          required
	>{{ old('body') ?: $huidanalyse->body }}</textarea>
		<hr>
		<div class="w-full flex mb-5">
			<button type="submit"
			        class="w-1/2 text-buddy-lightest hover:text-buddy-darker"
			>Wijzig huidanalyse
			</button>
			<button data-action="huidanalyse#cancel toggle#toggle"
			        class="w-1/2 rounded text-red-lighter hover:text-red-light"
			>Cancel
			</button>
		</div>
	</div>
</form>
