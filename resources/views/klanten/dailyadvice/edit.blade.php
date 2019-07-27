<form action="{{ route('dailyadvice.update', $dailyAdvice, false) }}"
      method="POST"
      data-action="dailyadvice#edit toggle#toggle"
      class="w-full"
>@method('PATCH') @csrf
	<div class="group relative w-full shadow  border border-transparent focus-within:border-gray-200 focus-within:shadow-inner focus-within:outline-none">
		<div class="w-full px-4 pt-4 overflow-hidden outline-none resize-none bg-transparent">
			<h3 class="font-hairline">
				Ochtend:
			</h3>
			<textarea type="text"
			          class="w-full overflow-hidden outline-none resize-none bg-transparent border-b border-dashed pb-1"
			          name="morning"
			          placeholder="Hoe is de behandeling gegaan?
Zijn er veder noemenswaardigheden"
			          data-target="dailyadvice.morning textarea.textarea"
			          data-action="click->textarea#grow input->textarea#grow input->dailyadvice#errors"
			>{{ old('morning') ?: $dailyAdvice->morning }}</textarea>
		</div>
		<div class="w-full px-4 overflow-hidden outline-none resize-none bg-transparent">
			<h3 class="font-hairline ">
				Middag:
			</h3>
			<textarea type="text"
			          class="w-full overflow-hidden outline-none resize-none bg-transparent border-b border-dashed pb-1"
			          name="midday"
			          placeholder="Hoe is de behandeling gegaan?
Zijn er veder noemenswaardigheden"
			          data-target="dailyadvice.midday textarea.textarea"
			          data-action="click->textarea#grow input->textarea#grow input->dailyadvice#errors"
			>{{ old('midday') ?: $dailyAdvice->midday }}</textarea>
		</div>
		<div class="w-full px-4 pb-4 overflow-hidden outline-none resize-none bg-transparent border-b border-dashed">
			<h3 class="font-hairline">
				Avond:
			</h3>
			<textarea type="text"
			          class="w-full overflow-hidden outline-none resize-none bg-transparent"
			          name="evening"
			          placeholder="Hoe is de behandeling gegaan?
Zijn er veder noemenswaardigheden"
			          data-target="dailyadvice.evening textarea.textarea"
			          data-action="click->textarea#grow input->textarea#grow input->dailyadvice#errors"
			>{{ old('evening') ?: $dailyAdvice->evening }}</textarea>
		</div>
		<p class="w-full text-red-500 px-4 py-2 my-0.5 border-b border-dashed hidden"
		   data-target="dailyadvice.error"
		></p>
		<div class="flex justify-between">
			<a href="#"
			   class="cursor-pointer  py-2 px-8 bg-transparent text-red-200 hover:text-red-500"
			   data-action="toggle#toggle dailyadvice#delete"
			>{{ svg_image('lineicons/trash', 'fill-current  h-6') }}
			</a>
			<button class="cursor-pointer py-2 px-8 bg-transparent text-teal-200 hover:text-teal-500"
			        data-target="dailyadvice.saveButton"
			        type="submit"
			>
				{{ svg_image('lineicons/save', 'fill-current  h-6') }}
			</button>
		</div>
	</div>
</form>
