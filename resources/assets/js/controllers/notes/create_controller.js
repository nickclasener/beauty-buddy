import { NotesController } from "./notes_controller";

export default class extends NotesController
{
	static targets = [ "body" ];

	submit( event ) {
		event.preventDefault();
		axios.post(this.data.get('url'), {
			body: this.body
		}).then(response => {
			this.element.innerHTML = response.data;
		}).catch(error => console.log(error));
	}

	get body() {
		return this.bodyTarget.value;
	}
}
