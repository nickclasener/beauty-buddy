<form action="{{ route('dailyadvice.store', $customer, false) }}"
      method="POST"
      data-controller="textarea"
      data-action="autocomplete2#removeResults dailyadvices#create"
>@method('POST')@csrf
	<div class="border-b border-dashed p-4 pb-8">
		<div class="group relative w-full shadow  border border-transparent focus-within:border-gray-200 focus-within:shadow-inner focus-within:outline-none">
			<div class="w-full px-4 pt-4 overflow-hidden outline-none resize-none bg-transparent">
				<h3 class="font-hairline">
					Ochtend:
				</h3><textarea type="text"
				               class="w-full overflow-hidden outline-none resize-none bg-transparent border-b border-dashed pb-1"
				               name="morning"
				               data-action="input->textarea#grow input->dailyadvices#errors"
				               placeholder="Dit is hoe u het product gebruikt in de ochtend"
				               data-target="dailyadvices.morning textarea.textarea"
				>{{ old('morning') }}</textarea>
			</div>
			<div class="w-full px-4 overflow-hidden outline-none resize-none bg-transparent">
				<h3 class="font-hairline ">
					Middag:
				</h3>
				<textarea type="text"
				          class="w-full overflow-hidden outline-none resize-none bg-transparent border-b border-dashed pb-1"
				          name="midday"
				          placeholder="Dit is hoe u het product gebruikt in de middag"
				          data-action="input->textarea#grow input->dailyadvices#errors"
				          data-target="dailyadvices.midday textarea.textarea"
				>{{ old('midday') }}</textarea>
			</div>
			<div class="w-full px-4 pb-4 overflow-hidden outline-none resize-none bg-transparent border-b border-dashed">
				<h3 class="font-hairline">
					Avond:
				</h3>
				<textarea type="text"
				          class="w-full overflow-hidden outline-none resize-none bg-transparent"
				          name="evening"
				          placeholder="Dit is hoe u het product gebruikt in de ochtend"
				          data-action="input->textarea#grow input->dailyadvices#errors"
				          data-target="dailyadvices.evening textarea.textarea"
				>{{ old('evening') }}</textarea>
			</div>
			<p class="w-full text-red-500 px-4 py-2 my-0.5 border-b border-dashed hidden"
			   data-target="dailyadvices.error"
			></p>
			<div class="flex justify-between">
				<button class="cursor-pointer  py-2 px-8 bg-transparent text-red-200 hover:text-red-500 focus:outline-none"
				        data-action="dailyadvices#cancel toggle#toggle"
				>{{ svg_image('lineicons/close', 'h-6 fill-current') }}
				</button>
				<button class="cursor-pointer py-2 px-8 bg-transparent text-teal-200 hover:text-teal-500 focus:outline-none"
				        data-target="dailyadvices.saveButton"
				        type="submit"
				>
					{{ svg_image('lineicons/save', 'fill-current  h-6') }}
				</button>
			</div>
		</div>
	</div>
</form>
