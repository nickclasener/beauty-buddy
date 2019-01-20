import { NotesController } from "./notes_controller";

export default class extends NotesController
{
	submit( event ) {
		this.deleteNote(event, route('notities.destroy', this.data.get("data")), '#monthYear', '#note');
	}
}