import { Controller } from "stimulus";

export class NotesController extends Controller
{


	getControllerByIdentifier( identifier ) {
		return this.application.controllers.find(controller => {
			return controller.context.identifier === identifier;
		});
	}

	deleteNote( event, route, parent, child ) {
		event.preventDefault();
		axios.delete(route);
		if ( event.target.closest(parent).querySelectorAll(child).length > 1 ) {
			event.target.closest(child).remove();
		} else {
			event.target.closest(parent).remove();
		}
	}

}