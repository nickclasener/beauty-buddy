<div class="pt-10">
	<form action="{{ route('dailyadvice.store', $customer, false) }}"
	      method="POST"
	      data-action="autocomplete2#removeResults dailyadvices#create"
	>@method('POST')@csrf
		<div class="border-b border-dashed focus-within:border-buddy-lightest px-10">
	<textarea type="text"
	          class="resize-none w-full border-b border-dashed focus-within:border-buddy-lightest"
	          rows="5"
	          name="morning"
	          data-controller="textarea"
	          data-action="input->textarea#grow"
	          placeholder="Dit is hoe u het product gebruikt in de ochtend"
	          data-target="dailyadvices.morning textarea.textarea"
			{{--required--}}
	>{{ old('morning') }}</textarea>
			<hr>
			<textarea type="text"
			          class="resize-none w-full border-b border-dashed focus-within:border-buddy-lightest"
			          rows="5"
			          name="midday"
			          placeholder="Dit is hoe u het product gebruikt in de ochtend"
			          data-target="dailyadvices.midday"
					{{--required--}}
			>{{ old('midday') }}</textarea>
			<hr>
			<textarea type="text"
			          class="resize-none w-full border-b border-dashed focus-within:border-buddy-lightest"
			          rows="5"
			          name="evening"
			          placeholder="Dit is hoe u het product gebruikt in de ochtend"
			          data-target="dailyadvices.evening"
					{{--required--}}
			>{{ old('evening') }}</textarea>
			<hr>
			<div class="w-full flex my-5">
				<button type="submit"
				        class="w-1/2  text-buddy-lightest hover:text-buddy-darker"
				>Voeg Notitie
				</button>
				<button data-action="dailyadvices#cancel  toggle#toggle"
				        class="w-1/2 rounded text-red-lighter hover:text-red-light"
				>
					Annuleer
				</button>
			</div>
		</div>
	</form>
</div>
