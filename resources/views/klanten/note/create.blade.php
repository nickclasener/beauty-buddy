<form action="{{  route($stimulusJs.'.store', $customer) }}"
      method="POST"
      data-action="autocomplete2#removeResults {{ $stimulusJs }}s#create"
>@method('POST')@csrf
	<div class="border-b border-dashed focus-within:border-teal-900 p-4">
		<textarea type="text"
		          class="resize-none border-box w-full shadow border border-transparent focus:border-gray-300 p-4 focus:shadow-inner focus:outline-none overflow-hidden"
		          name="body"
		          placeholder="Hoe is de behandeling gegaan?
Zijn er veder noemenswaardigheden"
		          data-controller="textarea"
		          data-target="{{ $stimulusJs }}s.body textarea.textarea"
		          data-action="input->textarea#grow"
		          required
		>{{ old('body') }}</textarea>
		<div class="flex flex-grow m-4 gap-padding gap gap-8 justify-around">

			<button type="submit"
			        class="w-1/4 text-teal-200 hover:text-teal-500 bg-teal-500 hover:bg-teal-200 shadow-md flex justify-center flex-shrink"
			>{{ svg_image('lineicons/save', 'h-8 fill-current') }}
			</button>
			<button data-action="{{ $stimulusJs }}s#cancel toggle#toggle"
			        class="w-1/4 text-red-200 hover:text-red-500 bg-red-500 hover:bg-red-200   shadow-md flex justify-center flex-shrink"
			>{{ svg_image('lineicons/close', 'h-8 fill-current') }}
			</button>
		</div>
	</div>
</form>
