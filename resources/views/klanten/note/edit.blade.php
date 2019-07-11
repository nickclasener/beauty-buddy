<form action="{{ route($stimulusJs.'.update', $model, false) }}"
      method="POST"
      data-action="{{ $stimulusJs }}#edit toggle#toggle"
      class="w-full"
>@method('PATCH') @csrf
	<div class="group relative w-full shadow  border border-transparent focus-within:border-gray-200 focus-within:shadow-inner focus-within:outline-none">
	<textarea type="text"
	          class="w-full p-4 overflow-hidden outline-none resize-none bg-transparent  border-b border-dashed"
	          name="body"
	          placeholder="Hoe is de behandeling gegaan?
Zijn er veder noemenswaardigheden"
	          data-target="{{ $stimulusJs }}.body textarea.textarea "
	          data-action="click->textarea#grow input->textarea#grow"
	          required
	>{{ old('body') ?: $model->body }}</textarea>
		<div class="flex justify-between">
			<a href="#"
			   class="cursor-pointer  py-2 px-8 bg-transparent text-red-200 hover:text-red-500"
			   {{--			   data-action="{{ $stimulusJs }}#delete monthyear#remove {{ $stimulusJs }}#remove"--}}
			   data-action="toggle#toggle {{ $stimulusJs }}#delete "
			>{{ svg_image('lineicons/trash', 'fill-current  h-6') }}
			</a>
			<button class="cursor-pointer py-2 px-8 bg-transparent text-teal-200 hover:text-teal-500"
			        type="submit"
			>
				{{ svg_image('lineicons/save', 'fill-current  h-6') }}
			</button>
		</div>
	</div>
</form>

