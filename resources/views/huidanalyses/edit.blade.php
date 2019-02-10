<form action="{{ route('huidanalyses.update', $huidanalyse) }}"
      method="POST"
      data-action="huidanalyse#edit"
>@method('PATCH') @csrf
	<div class="border-b border-buddy-teal-light focus-within:border-buddy-teal-dark pt-10 pl-10 pr-10">
	<textarea type="text"
	          class="resize-none w-full"
	          rows="5"
	          name="body"
	          placeholder="Hoe is de behandeling gegaan?
Zijn er veder noemenswaardigheden"
	          data-target="huidanalyse.body"
	          required
	>{{ old('body') ?: $huidanalyse->body }}</textarea>
		<button type="submit"
		        class="px-10 py-5 border rounded"
		>Voeg Notitie
		</button>
	</div>
</form>
