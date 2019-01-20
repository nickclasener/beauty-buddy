import { NotesController } from "./notes_controller";

export default class extends NotesController
{
	static targets = [ "body" ];


	submit( event ) {
		event.preventDefault();
		axios.patch(this.data.get('url'), {
			body: this.body
		}).then(response => {
			console.log(response.data);
			this.element.closest('#edit').innerHTML = response.data;
		}).catch(error => console.log(error));
	}

	get body() {
		return this.bodyTarget.value;
	}
}