import { NotesController } from "./notes_controller";

export default class extends NotesController
{
	static targets = [ "body" ];

	submit( event ) {
		event.preventDefault();
		axios.post(this.data.get('url'), {
			body: this.bodyTarget.value
		}).then(response => {
			this.element.closest('#notes').innerHTML = response.data;
		}).catch(error => console.log(error));
	}
}
