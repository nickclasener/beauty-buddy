<form action="{{ route($stimulusJs.'.store', $customer) }}"
      method="POST"
      data-action="autocomplete2#removeResults {{ $stimulusJs }}s#create"
>@method('POST')@csrf
	<div class="border-b border-dashed p-4 pb-8">
		<div class="group relative w-full shadow border border-transparent focus-within:border-gray-200 focus-within:shadow-inner focus-within:outline-none">
 <textarea type="text"
           class="w-full p-4 overflow-hidden outline-none resize-none bg-transparent border-b border-dashed"
           name="body"
           placeholder="Hoe is de behandeling gegaan?
Zijn er veder noemenswaardigheden"
           data-controller="textarea"
           data-target="{{ $stimulusJs }}s.body textarea.textarea"
           data-action="input->textarea#grow"
 >{{ old('body') }}</textarea>
			<div class="flex justify-between">
				<button data-action="{{ $stimulusJs }}s#cancel toggle#toggle"
				        class="cursor-pointer py-2 px-8 bg-transparent text-red-200 hover:text-red-500 focus:outline-none"
				        data-action="{{ $stimulusJs }}#delete monthyear#remove {{ $stimulusJs }}#remove"
				>{{ svg_image('lineicons/close', 'h-6 fill-current') }}
				</button>
				<button class="cursor-pointer py-2 px-8 bg-transparent text-teal-200 hover:text-teal-500 focus:outline-none"
				        type="submit"
				>
					{{ svg_image('lineicons/save', 'fill-current h-6') }}
				</button>
			</div>
		</div>
	</div>
</form>
