<form action="{{ route($stimulusJs.'.update', $model, false) }}"
      method="POST"
      data-action="{{ $stimulusJs }}#edit toggle#toggle"
      class="w-full"
>@method('PATCH') @csrf
	<div class="border-b border-dashed focus-within:border-teal-300 ">
	<textarea type="text"
	          class="resize-none  shadow border border-gray-200 p-4 focus:shadow-inner focus:outline-none overflow-hidden w-full"
	          name="body"
	          placeholder="Hoe is de behandeling gegaan?
Zijn er veder noemenswaardigheden"
	          data-target="{{ $stimulusJs }}s.body textarea.textarea"
	          data-action="click->textarea#grow input->textarea#grow"
	          required
	>{{ old('body') ?: $model->body }}</textarea>
		<hr>
		<div class="w-full flex mb-5">
			<button type="submit"
			        class="w-1/2 text-buddy-lightest hover:text-buddy-darker"
			>Wijzig Notitie
			</button>
			<button data-action="{{ $stimulusJs }}#cancel toggle#toggle"
			        class="w-1/2 rounded text-red-lighter hover:text-red-light"
			>Cancel
			</button>
		</div>
	</div>
</form>
