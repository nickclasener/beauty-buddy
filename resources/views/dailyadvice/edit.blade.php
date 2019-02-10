{{--{{ $dailyAdvice->morning }}--}}
{{--{{ $dailyAdvice->midday }}--}}
{{--{{ $dailyAdvice->evening }}--}}

<form action="{{ route('dailyadvice.update', $dailyAdvice) }}"
      method="POST"
		{{--data-action="note#edit"--}}
>@method('PATCH') @csrf
	<div class="border-b border-buddy-teal-light focus-within:border-buddy-teal-dark pt-10 pl-10 pr-10">
	<textarea type="text"
	          class="resize-none w-full"
	          rows="5"
	          name="morning"
	          placeholder="Hoe is de behandeling gegaan?
Zijn er veder noemenswaardigheden"
	          {{--data-target="note.body"--}}
	          required
	>{{ old('morning') ?: $dailyAdvice->morning }}</textarea>
		<textarea type="text"
		          class="resize-none w-full"
		          rows="5"
		          name="midday"
		          placeholder="Hoe is de behandeling gegaan?
Zijn er veder noemenswaardigheden"
		          {{--data-target="note.body"--}}
		          required
		>{{ old('midday') ?: $dailyAdvice->midday }}</textarea>
		<textarea type="text"
		          class="resize-none w-full"
		          rows="5"
		          name="evening"
		          placeholder="Hoe is de behandeling gegaan?
Zijn er veder noemenswaardigheden"
		          {{--data-target="note.body"--}}
		          required
		>{{ old('evening') ?: $dailyAdvice->evening }}</textarea>
		<button type="submit"
		        class="px-10 py-5 border rounded"
		>Voeg Notitie
		</button>
	</div>
</form>