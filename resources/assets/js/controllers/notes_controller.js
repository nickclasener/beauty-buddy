import {ApplicationController} from "../controllers/application-controller";

export default class extends ApplicationController {
    static targets = ["body", "exist", "form", "list", "note"];


    create(event) {
        event.preventDefault();
        axios.post(this.data.get('url'), {
            body: this.body,
        }).then(response => {
            this.body = null;
            console.log(response);
            // this.updateNote(response.data);
            this.list = response.data;

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
        // monthyearController.update(monthyear);
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

    get note() {
        return this.noteTarget;
    }


    get notes() {
        return this.noteTargets;
    }

    // set notes(text) {
    //     this.notes.outerHTML = text;
    // }
}