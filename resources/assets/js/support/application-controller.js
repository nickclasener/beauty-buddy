import { Controller } from "stimulus";

export class ApplicationController extends Controller
{

	getControllerByIdentifier( identifier ) {
		return this.application.controllers.find(controller => {
			return controller.context.identifier === identifier;
		});
	}

	laravelCreate( url, payload ) {
		return new Promise(( resolve, reject ) => {
			axios.post(url, payload)
			     .then(response => resolve(response))
			     .catch(error => reject(error));
		});
	}

	laravelUpdate( url, payload ) {
		return new Promise(( resolve, reject ) => {
			axios.put(url, payload)
			     .then(response => resolve(response))
			     .catch(error => reject(error));
		});
	}

	laravelDelete( url ) {
		return new Promise(( resolve, reject ) => {
			axios.delete(url)
			     .then(response =>
				     resolve(Turbolinks
					     .visit(response.data.responseURL)))
			     .catch(error => reject(error));
		});
	}
}