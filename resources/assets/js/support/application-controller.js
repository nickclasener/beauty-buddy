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
			     .then(response => {
				     resolve(Turbolinks.visit(response.request.responseURL));
			     })
			     .catch(error => {
				     reject(error);
			     });
		});
	}

	laravelUpdate( url, field, value ) {
		return new Promise(( resolve, reject ) => {
			const data = new FormData();
			data.append(field, value);

			Rails.ajax({
				url,
				type: "PUT",
				data,
				success: data => {
					resolve(data);
				},
				error: ( _jqXHR, _textStatus, errorThrown ) => {
					reject(errorThrown);
				}
			});
		});
	}

	laravelDelete( url ) {
		return new Promise(( resolve, reject ) => {
			Rails.ajax({
				url,
				type: "DELETE",
				success: response => {
					resolve(response);
				},
				error: ( _jqXHR, _textStatus, errorThrown ) => {
					reject(errorThrown);
				}
			});
		});
	}
}