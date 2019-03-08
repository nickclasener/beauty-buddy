import {Controller} from "stimulus";

export default class extends Controller {
    static targets = [
        "body",
        "exist",
        "form",
        "list",
        "notes",
    ];

    create(event) {
        event.preventDefault();
        axios.post(this.data.get('url'), {
            body: this.body,
        }).then(response => {
            this.body = null;
            this.list = response.data;
        }).catch(error => console.log(error));
    }

    cancel(event) {
        event.preventDefault();
        this.body = '';
    }

    get body() {
        return this.bodyTarget.value;
    }

    set body(text) {
        this.bodyTarget.value = text;
    }


    get list() {
        return this.listTarget;
    }

    set list(text) {
        this.list.outerHTML = text;
    }

    get notes() {
        return this.notesTarget;
    }

    set notes(text) {
        this.notes.outerHTML = text;
    }

    get form() {
        return this.formTarget;
    }
}