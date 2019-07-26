<form action="{{ route('dailyadvice.update', $dailyAdvice, false) }}"
      method="POST"
      data-action="dailyadvice#edit toggle#toggle"
>@method('PATCH') @csrf
	<div class="border-b border-dashed focus-within:border-buddy-lightest pl-5 w-full">
		<h3 class="font-hairline">
			Ochtend:
		</h3>
		<textarea type="text"
		          class="resize-none w-full border-b border-dashed focus-within:border-buddy-lightest"
		          rows="5"
		          name="morning"
		          placeholder="Hoe is de behandeling gegaan?
Zijn er veder noemenswaardigheden"
		          data-target="dailyadvice.morning"
		          required
		>{{ old('morning') ?: $dailyAdvice->morning }}</textarea>
		<h3 class="font-hairline pt-5">
			Middag:
		</h3>
		<textarea type="text"
		          {{--class="overflow-visible resize-none block w-full"--}}
		          class="resize-none w-full border-b border-dashed focus-within:border-buddy-lightest"
		          rows="5"
		          name="midday"
		          placeholder="Hoe is de behandeling gegaan?
Zijn er veder noemenswaardigheden"
		          data-target="dailyadvice.midday"
		          required
		>{{ old('midday') ?: $dailyAdvice->midday }}</textarea>
		<h3 class="font-hairline pt-5">
			Avond:
		</h3>
		<textarea type="text"
		          {{--class="overflow-visible resize-none block w-full"--}}
		          class="resize-none w-full border-b border-dashed focus-within:border-buddy-lightest"
		          rows="5"
		          name="evening"
		          placeholder="Hoe is de behandeling gegaan?
Zijn er veder noemenswaardigheden"
		          data-target="dailyadvice.evening"
		          required
		>{{ old('evening') ?: $dailyAdvice->evening }}</textarea>
		<div class="flex justify-between">
			<a href="#"
			   class="cursor-pointer  py-2 px-8 bg-transparent text-red-200 hover:text-red-500"
			   data-action="toggle#toggle dailyadvice#delete "
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
