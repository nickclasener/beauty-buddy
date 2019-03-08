<div data-controller="toggle"
     class="pt-5"
>
	<div data-target="toggle.show"
	     class="float-right"
	>
		<div class="flex justify-end w-full">
			<button class="bg-buddy-lightest rounded-full w-15 h-15 flex justify-center self-end mr-5"
			        data-action="toggle#toggle"
			>
				@svg('icon-136-document-edit',['class'=>'ml-2 fill-current text-white self-center'])
			</button>
		</div>
	</div>
	<form action="{{  route('notities.store', $customer, false) }}"
	      {{--TODO: Hidden--}}
	      class="{{  !array_first($customer->notes) ?: 'hidden' }} pb-5"
	      data-action="notes#create toggle#toggle"
	      data-target="toggle.hide notes.form "
	>@method('POST')@csrf
		{{--<div class="pb-10">--}}
		<div>
			<div class="border-b border-dashed focus-within:border-buddy-lightest px-10 ">
	<textarea type="text"
	          class="resize-none w-full"
	          rows="5"
	          name="body"
	          placeholder="Hoe is de behandeling gegaan?
Zijn er veder noemenswaardigheden"
	          data-target="notes.body"
	          required
	>{{ old('body') }}</textarea>
				<hr>
				<div class="w-full flex">
					<button data-action="notes#cancel toggle#toggle"
					        class="w-1/2 px-5 py-5 rounded mb-5 mx-5 text-red-light hover:text-red"
					>
						Annuleer
					</button>
					<button type="submit"
					        class="w-1/2  py-5 border rounded mb-5 mx-5  border-buddy-lightest hover:border-buddy-lighter text-buddy-lightest hover:text-buddy-darkest"
					>Voeg Notitie
					</button>
				</div>
			</div>
		</div>
	</form>
</div>
