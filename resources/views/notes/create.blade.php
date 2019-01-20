<form action="{{ route('notities.store', $customer) }}"
			method="POST"
			data-controller="create"
			data-create-url="{{ route('notities.store', $customer) }}"
			data-action="submit->create#submit"
>  @method('POST')@csrf
	<div class=" border-b border-buddy-teal-light focus-within:border-buddy-teal-dark pt-10 pl-10 pr-10">
	<textarea type="text"
						class="resize-none w-full"
						rows="5"
						name="body"
						placeholder="Hoe is de behandeling gegaan?
Zijn er veder noemenswaardigheden"
						data-target="create.body"
						value="{{ old('body') }}"
						required
	></textarea>
		
		<hr>
		<button type="submit"
						class="px-10 py-5 border rounded"
		>Voeg Notitie
		</button>
	</div>
</form>
<hr>
