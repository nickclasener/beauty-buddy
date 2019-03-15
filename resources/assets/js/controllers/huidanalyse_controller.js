import {ApplicationController} from "../controllers/application-controller";

export default class extends ApplicationController {
    static targets = [
        "body",
        "huidanalyse"
    ];

    connect() {

    }

    create(event) {
        event.preventDefault();
        fetch(this.data.get('create'), {
            method:'POST',
            body: this.body,
            // responseType: 'text/xml',
        })
            .then(response => console.log(response))
            .then(html => console.log(html))
            .then(/* Do what you need to do with Slick.js here */)
            // this.updateList(response.data);
            .catch(error => console.log(error));
    }

    edit(event) {
        event.preventDefault();
        axios.patch(this.data.get("update"), {
            body: this.body
        }).then(response => {
            this.element.outerHTML = response.data;
        });
    }

    delete(event) {
        event.preventDefault();
        axios.delete(this.data.get("destroy"))
            .then(() => {
                this.element.remove();
            });
    }

    updateList(huidanalyse) {
        const huidanalyseController = this.getControllerByIdentifier("huidanalyses");
        huidanalyseController.render(huidanalyse);
    }

    get body() {
        return this.bodyTarget.value;
    }

    set body(text) {
        this.bodyTarget.value = text;
    }
}