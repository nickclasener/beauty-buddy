<div class="pt-10">
	<form action="{{ route('dailyadvice.store', $customer, false) }}"
	      method="POST"
			{{--data-action="dailyadvice#create"--}}
	>
		@method('POST')@csrf
		<div class="border-b border-dashed focus-within:border-buddy-lightest px-10">
	<textarea type="text"
	          class="resize-none w-full border-b border-dashed focus-within:border-buddy-lightest"
	          rows="5"
	          name="morning"
	          placeholder="Voor de ochtend adviseer ik u"
	          {{--data-target="dailyAdvice.ochtend"--}}
	          required
	>{{ old('morning') }}</textarea>
			<hr>
			<textarea type="text"
			          class="resize-none w-full border-b border-dashed focus-within:border-buddy-lightest"
			          rows="5"
			          name="midday"
			          placeholder="Voor de middag adviseer ik u"
			          {{--data-target="dailyAdvice.ochtend"--}}
			          required
			>{{ old('midday') }}</textarea>
			<hr>
			<textarea type="text"
			          class="resize-none w-full border-b border-dashed focus-within:border-buddy-lightest"
			          rows="5"
			          name="evening"
			          placeholder="Voor de avond adviseer ik u"
		          {{--data-target="dailyAdvice.ochtend"--}}
					{{--required--}}
		>{{ old('evening') }}</textarea>
			<hr>
			<div class="w-full flex">
				<button type="submit"
				        class="w-1/2  py-5  mb-5 text-buddy-lightest hover:text-buddy-darker"
				>Voeg Notitie
				</button>
				<button data-action="notes#cancel  toggle#toggle"
				        class="w-1/2 px-5 py-5 rounded mb-5 text-red-lighter hover:text-red-light"
				>
					Annuleer
				</button>
			</div>
		</div>
	</form>
</div>