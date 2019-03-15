<div data-controller="toggle"
     class="pt-5"
>
	<div data-target="toggle.show"
			{{--				     class=" {{ !array_first($customer->notes) ? 'hidden' : '' }} "--}}
	>
		<div class="float-right">
			{{--<div class="flex justify-end w-full">--}}
				<button
						class="bg-buddy-lightest rounded-full w-15 h-15 flex justify-center self-end"
				        data-action="toggle#grow toggle#toggle"
				>
					@svg('icon-136-document-edit',['class'=>'ml-1 fill-current text-white self-center'])
				</button>
			</div>
		{{--</div>--}}
	</div>
	<form action="{{  route('notities.store', $customer, false) }}"
	      {{--data-action="notes#create toggle#toggle"--}}
	      data-action="notes#create"
	      data-target="toggle.hide notes.form"
	>@method('POST')@csrf
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
				<button data-action="notes#cancel toggle#grow toggle#toggle"
				        class="w-1/2 px-5 py-5 rounded mb-5 mx-5 text-red-lighter hover:text-red-light"
				>
					Annuleer
				</button>
				<button type="submit"
				        class="w-1/2  py-5 border rounded mb-5 mx-5  border-buddy-lightest hover:border-buddy-lighter text-buddy-lightest hover:text-buddy-darkest"
				>Voeg Notitie
				</button>
			</div>
		</div>
	</form>
</div>
