<form action="{{ route('dailyadvice.store', $customer, false) }}"
      method="POST"
      data-action="autocomplete2#removeResults dailyadvices#create"
>@method('POST')@csrf
	<div class="border-b border-dashed p-4 ">
		<div class="group relative w-full shadow  border border-transparent focus-within:border-gray-200 focus-within:shadow-inner focus-within:outline-none">
	<textarea type="text"
	          class="w-full p-4 overflow-hidden outline-none resize-none bg-transparent border-b border-dashed"
	          name="morning"
	          data-controller="textarea"
	          data-action="input->textarea#grow"
	          placeholder="Dit is hoe u het product gebruikt in de ochtend"
	          data-target="dailyadvices.morning textarea.textarea"
	>{{ old('morning') }}</textarea>
			<hr>
			<textarea type="text"
			          class="w-full p-4 overflow-hidden outline-none resize-none bg-transparent border-b border-dashed"
			          name="midday"
			          placeholder="Dit is hoe u het product gebruikt in de ochtend"
			          data-controller="textarea"
			          data-action="input->textarea#grow"
			          data-target="dailyadvices.midday textarea.textarea"
			>{{ old('midday') }}</textarea>
			<hr>
			<textarea type="text"
			          class="w-full p-4 overflow-hidden outline-none resize-none bg-transparent border-b border-dashed"
			          name="evening"
			          placeholder="Dit is hoe u het product gebruikt in de ochtend"
			          data-controller="textarea"
			          data-action="input->textarea#grow"
			          data-target="dailyadvices.evening textarea.textarea"
			>{{ old('evening') }}</textarea>
			<div class="flex justify-between">
				<button data-action="dailyadvices#cancel toggle#toggle"
				        class="cursor-pointer  py-2 px-8 bg-transparent text-red-200 hover:text-red-500 focus:outline-none"
				        data-action="dailyadvices#delete monthyear#remove dailyadvices#remove"
				>{{ svg_image('lineicons/close', 'h-6 fill-current') }}
				</button>
				<button class="cursor-pointer py-2 px-8 bg-transparent text-teal-200 hover:text-teal-500 focus:outline-none"
				        type="submit"
				>
					{{ svg_image('lineicons/save', 'fill-current  h-6') }}
				</button>
			</div>
		</div>
	</div>
</form>
