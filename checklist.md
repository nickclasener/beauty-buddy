## Before start
[ ]  activate - Turbolinks

## Stuck on
[ ] Testing Elasticsearch

in you're data base you have this
$table->boolean('active')->nullable();

in youre view you have this
class="{{ $announcement->active ? 'active' : '' }}"

	<form action="{{  route('announcements.update',$announcement) }}"
				method="POST">
				@method('UPDATE')@csrf
		<button type="submit" value="{{ old('active') ? 'true' : 'false' }}">Toggle Active
		</button>
	</form>