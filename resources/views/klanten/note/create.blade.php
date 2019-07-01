<form action="{{  route($stimulusJs.'.store', $customer) }}"
      method="POST"
      data-action="autocomplete2#removeResults {{ $stimulusJs }}s#create"
>@method('POST')@csrf
	<div class="border-b border-dashed focus-within:border-buddy-lightest p-4">
		<textarea contenteditable="true"
		          type="text"
		          class="resize-none w-full  shadow-md border border-gray-200 p-4 focus:outline-none"
		          rows="4"
		          name="body"
		          placeholder="Hoe is de behandeling gegaan?
Zijn er veder noemenswaardigheden"
		          data-target="{{ $stimulusJs }}s.body"
		          required
		>{{ old('body') }}</textarea>
		<div class="w-full flex h-8 my-4 justify-around">
			<button type="submit"
			        class="w-1/4 text-teal-200 hover:text-teal-500 bg-teal-500 hover:bg-teal-200   shadow-md flex justify-center"
			>{{ svg_image('lineicons/save', 'h-8 fill-current') }}
			</button>
			{{--			<button data-action="{{ $stimulusJs }}s#cancel toggle#toggle"--}}
			{{--			        class="w-1/4 text-red-200 hover:text-red-500 bg-red-500 hover:bg-red-200   shadow-md flex justify-center"--}}
			{{--			>{{ svg_image('lineicons/ban', 'h-8 fill-current') }}--}}
			{{--			</button>--}}
		</div>
	</div>
</form>
