Voeg een nieuwe notitie toe
<form action="{{ route('notities.store', $customer) }}"
			method="post"
>@csrf
	
	<label for="body"
	>Notitie:</label>
	<br>
	<textarea type="text"
						rows="5"
						name="body"
						placeholder="Hoe is de behandeling gegaan? Zijn er veder noemenswaardigheden"
						value="{{ old('body') }}"
						required
	></textarea>
	<hr>
	<button type="submit"
	>Voeg Notitie
	</button>
</form>
<hr>
