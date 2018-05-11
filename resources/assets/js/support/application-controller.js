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
			     .catch(error => reject(console.log(error)));
		});
	}

	laravelGet( url ) {
		return new Promise(( resolve, reject ) => {
			axios.get(url)
			     .then(response => resolve(response))
			     .catch(error => reject(console.log(error)));
		});
	}

	laravelUpdate( url, payload ) {
		return new Promise(( resolve, reject ) => {
			console.log(url);
			axios.put(url, payload)
			     .then(response => resolve(response))
			     .catch(error => reject(console.log(error)));
		});
	}

	laravelDelete( url ) {
		return new Promise(( resolve, reject ) => {
			axios.delete(url)
			     .then(response => resolve(response))
			     // resolve(Turbolinks
			     //    .visit(response.data.responseURL)))
			     .catch(error => reject(console.log(error)));
		});
	}

	// Fixme: see notes_controller
	application;
	controllers;
}
