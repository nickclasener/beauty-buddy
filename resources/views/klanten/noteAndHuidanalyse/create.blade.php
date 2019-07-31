<form action="{{ route($stimulusJs.'.store', $customer) }}"
      method="POST"
      data-action="autocomplete2#removeResults {{ $stimulusJs }}s#create"
      class="px-4 pt-4 pb-8 border-b border-dashed"
>@method('POST')@csrf
	<div class="group relative w-full shadow border border-transparent focus-within:border-gray-200 focus-within:shadow-inner focus-within:outline-none">
 <textarea type="text"
           class="w-full p-4 overflow-hidden outline-none resize-none bg-transparent border-b border-dashed "
           name="body"
           placeholder="Hoe is de behandeling gegaan?
Zijn er veder noemenswaardigheden"
           data-controller="textarea"
           data-target="{{ $stimulusJs }}s.body textarea.textarea"
           data-action="input->textarea#grow input->{{ $stimulusJs }}s#errors"
 >{{ old('body') }}</textarea>
		<div class="-mt-1.5">
			<p class="w-full text-red-500 px-4 py-2 border-b border-dashed hidden"
			   data-target="{{ $stimulusJs }}s.error"
			></p>
			<div class="flex justify-between items-baseline">
				<button data-action="{{ $stimulusJs }}s#cancel toggle#toggle"
				        class="cursor-pointer py-2 px-8 bg-transparent text-red-200 hover:text-red-500 focus:outline-none"
				>{{ svg_image('lineicons/close', 'h-6 fill-current') }}
				</button>
				<button class="cursor-pointer py-2 px-8 bg-transparent text-teal-200 hover:text-teal-500 focus:outline-none"
				        type="submit"
				>{{ svg_image('lineicons/save', 'fill-current h-6') }}
				</button>
			</div>
		</div>
	</div>
</form>
