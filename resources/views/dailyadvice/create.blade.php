<form action="{{ route('dailyadvice.store', $customer) }}"
      method="POST"
		{{--data-action="dailyadvice#create"--}}
>
	@method('POST')@csrf
	<div class="border-b border-buddy-teal-light focus-within:border-buddy-teal-dark pt-10 pl-10 pr-10">
	<textarea type="text"
	          class="resize-none w-full border-b"
	          rows="5"
	          name="morning"
	          placeholder="Voor de ochtend adviseer ik u"
	          {{--data-target="dailyAdvice.ochtend"--}}
	          required
	>{{ old('morning') }}</textarea>
		<hr>
		<textarea type="text"
		          class="resize-none w-full border-b"
		          rows="5"
		          name="midday"
		          placeholder="Voor de middag adviseer ik u"
		          {{--data-target="dailyAdvice.ochtend"--}}
		          required
		>{{ old('midday') }}</textarea>
		<hr>
		<textarea type="text"
		          class="resize-none w-full border-b"
		          rows="5"
		          name="evening"
		          placeholder="Voor de avond adviseer ik u"
		          {{--data-target="dailyAdvice.ochtend"--}}
		          {{--required--}}
		>{{ old('evening') }}</textarea>
		<hr>
		<div class="w-full flex">
			<button
					{{--data-action="dailyAdvice#cancel"--}}
					class="w-1/2 px-5 py-5 rounded mb-5 mx-5 text-red"
			>
				Annuleer
			</button>
			<button type="submit"
			        class="w-1/2  py-5 border rounded mb-5 mx-5"
			>Voeg Notitie
			</button>
		</div>
	</div>
</form>