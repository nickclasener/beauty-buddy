<form action="{{ route($route.'.update', $model, false) }}"
      method="POST"
      data-action="{{ $route }}#edit toggle#toggle"
      class="w-full"
>@method('PATCH') @csrf
	<div class="border-b border-dashed focus-within:border-buddy-lightest pl-10 pr-10">
	<textarea type="text"
	          class="overflow-visible resize-none block w-full"
	          rows="5"
	          name="body"
	          placeholder="Hoe is de behandeling gegaan?
Zijn er veder noemenswaardigheden"
	          data-target="{{ $route }}.body"
	          required
	>{{ old('body') ?: $model->body }}</textarea>
		<hr>
		<div class="w-full flex mb-5">
			<button type="submit"
			        class="w-1/2 text-buddy-lightest hover:text-buddy-darker"
			>Wijzig Notitie
			</button>
			<button data-action="{{ $route }}#cancel toggle#toggle"
			        class="w-1/2 rounded text-red-lighter hover:text-red-light"
			>Cancel
			</button>
		</div>
	</div>
</form>
