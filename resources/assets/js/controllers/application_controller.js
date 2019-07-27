import {Controller} from "stimulus";

export class Application_controller extends Controller {
    getControllerByIdentifier(identifier) {
        return this.application.controllers.find(controller => {
            return controller.context.identifier === identifier;
        });
    }


    laravelCreate(url, data) {
        return new Promise((resolve, reject) => {
            axios({
                url,
                type: "POST",
                data,
                success: data => {
                    resolve(data);
                },
                error: (_jqXHR, _textStatus, errorThrown) => {
                    reject(errorThrown);
                }
            });
        });
    }

    laravelUpdate(url, data) {
        return new Promise((resolve, reject) => {
            axios({
                url,
                type: "PUT",
                data,
                success: data => {
                    resolve(data);
                },
                error: (_jqXHR, _textStatus, errorThrown) => {
                    reject(errorThrown);
                }
            });
        });
    }

    laravelDelete(url) {
        return new Promise((resolve, reject) => {
            axios({
                url,
                type: "DELETE",
                success: response => {
                    resolve(response);
                },
                catch: (error) => {
                    reject(error);
                }
            });
        });
    }
}
