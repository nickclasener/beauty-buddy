import {ApplicationController} from "../controllers/application-controller";

export default class extends ApplicationController {
    static targets = ["body", "exist", "form", "list", "note", "monthyear"];

    create(event) {
        event.preventDefault();
        axios.post(this.data.get('url'), {
            body: this.body,
        }).then(response => {
            this.body = null;
            if (response.headers[0] === 'note') {
                this.note = response.data;
            } else if (response.headers[0] === 'monthyear') {
                this.monthyear = response.data;
            }
            Toast.fire({
                type: 'success',
                title: 'Notitie is toegevoegd'
            });
        }).catch(error => console.log(error));
    }

    cancel(event) {
        event.preventDefault();
        this.body = '';
    }

    updateNote(note) {
        let noteController = this.getControllerByIdentifier("note");
        noteController.create(note);
    }

    get body() {
        return this.bodyTarget.value;
    }

    set body(text) {
        this.bodyTarget.value = text;
    }

    get form() {
        return this.formTarget;
    }

    get list() {
        return this.listTarget;
    }

    set list(text) {
        this.list.outerHTML = text;
    }

    get monthyear() {
        return this.monthyearTarget;
    }

    set monthyear(text) {
        return this.monthyearTarget.insertAdjacentHTML('beforebegin', text);
        // return this.monthyearTarget.outerHTML = text;
    }

    get note() {
        return this.noteTarget;
    }

    set note(text) {
        return this.noteTarget.insertAdjacentHTML('beforebegin', text);
    }


    get notes() {
        return this.noteTargets;
    }


}