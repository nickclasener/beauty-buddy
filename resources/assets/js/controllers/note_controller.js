import { Controller } from "stimulus";

export default class extends Controller
{
	static targets = [ "body" ];

	edit( event ) {
		event.preventDefault();
		axios.patch(this.data.get("update"), {
			body: this.bodyTarget.value
		}).then(response => {
			this.element.outerHTML = response.data;
		});
	}

	delete( event ) {
		event.preventDefault();
		// deleteNote(event, route('notities.destroy', this.data.get("data")), '#monthYear', '#note');
		axios.delete(this.data.get("destroy"))
		     .then(() => {
			     this.element.remove();
		     });
	}

	//
	// deleteNote( event, route, parent, child ) {
	// 	event.preventDefault();
	// 	axios.delete(route);
	// 	if ( event.target.closest(parent).querySelectorAll(child).length > 1 ) {
	// 		event.target.closest(child).remove();
	// 	} else {
	// 		event.target.closest(parent).remove();
	// 	}
	// }

	// getControllerByIdentifier( identifier ) {
	// 	return this.application.controllers.find(controller => {
	// 		return controller.context.identifier === identifier;
	// 	});
	// }
	//
	// deleteNote( event, route, parent, child ) {
	// 	event.preventDefault();
	// 	axios.delete(route);
	// 	if ( event.target.closest(parent).querySelectorAll(child).length > 1 ) {
	// 		event.target.closest(child).remove();
	// 	} else {
	// 		event.target.closest(parent).remove();
	// 	}
	// }
}