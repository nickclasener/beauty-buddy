import { Controller } from "stimulus";

export default class extends Controller
{
	static targets = [ "body" ];

	create( event ) {
		event.preventDefault();
		axios.post(this.data.get('url'), {
			body: this.bodyTarget.value
		}).then(response => {
			this.element.innerHTML = response.data;
		}).catch(error => console.log(error));
	}

	cancel( event ) {
		event.preventDefault();
		this.bodyTarget.value = '';
	}
}