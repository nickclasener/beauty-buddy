<form action="{{ route('dailyadvice.update', $dailyAdvice, false) }}"
      method="POST"
      data-action="dailyadvice#edit toggle#toggle"
>@method('PATCH') @csrf
	<div class="border-b border-dashed focus-within:border-buddy-lightest pl-5 w-full">
		<h3 class="font-hairline">
			Ochtend:
		</h3>
		<textarea type="text"
		          {{--class="overflow-visible resize-none block w-full"--}}
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
		<hr>
		<div class="w-full flex mb-5">
			<button type="submit"
			        class="w-1/2  text-buddy-lightest hover:text-buddy-darker"
			>Wijzig Notitie
			</button>
			<button data-action="dailyadvice#cancel toggle#toggle"
			        class="w-1/2 rounded text-red-lighter hover:text-red-light"
			>Cancel
			</button>
		</div>
	</div>
</form>