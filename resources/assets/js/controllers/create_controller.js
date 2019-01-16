import { Controller } from "stimulus";

export default class extends Controller
{
	static targets = [ "body" ];

	submit( event ) {
		event.preventDefault();
		// console.log(this.formTarget);
		// console.log(this.data.get('customer'));
		// let routes = route('notities.store', this.data.get('customer'));
		axios({
			method: 'post',
			url: this.data.get('url'),
			data: {
				body: this.bodyTarget
			}
		}).then(response =>{console.log(response)});
		// axios.post(
		// 	uri: this.data.get('url'),
		// 	body: this.bodyTarget
		// )
		//      .then(response => {
		// 	     console.log(response);
		//      });
		//      .then(console.log(response));
		// if ( event.target.closest(parent).querySelectorAll(child).length > 1 ) {
		// 	event.target.closest(child).remove();
		// } else {
		// 	event.target.closest(parent).remove();
		// }
	}
}