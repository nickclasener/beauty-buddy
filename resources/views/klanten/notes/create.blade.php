<div data-controller="toggle"
     class="pt-5"
>
	<div data-target="toggle.show"
	     class="{{  count($customer->notes) !== 0 ? '' : 'hidden'  }}"
	>
		<div class="float-right">
			<button data-action=" toggle#toggle">
				{{--@svg('icon-136-document-edit',['class'=>'mr-2 fill-current self-center  text-buddy-lightest hover:text-buddy-darker'])--}}
				@svg('icon-136-document-edit',['class'=>'fill-current self-center text-buddy-lightest
				hover:text-buddy-lighter'])
			</button>
		</div>
	</div>
	<form action="{{  route('notities.store', $customer, false) }}"
	      {{--	      class="{{  count($customer->notes) === 0 ? '' : 'hidden'  }}"--}}
	      {{--data-action="notes#create toggle#toggle"--}}
	      data-action="notes#create"
	      data-target="toggle.hide notes.form"
	>@method('POST')@csrf
		{{--<div class="border-b border-dashed focus-within:border-buddy-lightest px-10 ">--}}
		<textarea contenteditable="true"
		          type="text"
		          class="resize-none w-full h-auto"
		          rows="5"
		          name="body"
		          placeholder="Hoe is de behandeling gegaan?
Zijn er veder noemenswaardigheden"
		          data-target="notes.body"
		          required
		>{{ old('body') }}</textarea>
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
		{{--</div>--}}
	</form>
</div>
