import {ApplicationController} from "../controllers/application-controller";

export default class extends ApplicationController {
    static targets = [
        "body",
        "content",
        "note",
    ];

    initialize() {
        if (this.data.get("monthyear") !== null) {
            this.updateMonthYear(this.data.get("monthyear"));
        }

        if (this.data.get('created') !== null) {
            TweenLite.to(this.note, 1, {
                autoAlpha: 0,
                height: 0,
                scale: 0,
            }).reverse(1);
        }
        // console.log(this.note);
        // console.log(this.element);
    }

    // create(note) {
    //     this.note = note;
    //     // this.notes.for(div);
    //     // console.log(note);
    // }

    edit(event) {
        event.preventDefault();
        // this.laravelUpdate(this.data.get("update"), {body: this.body});
        axios.patch(this.data.get("update"), {
            body: this.body
        }).then(response => {
            this.note = response.data;
            Toast.fire({
                type: 'info',
                title: 'Notitie is gewijziged'
            });
        }).catch(error => console.log(error));
    }

    remove() {
        // const note = this.note;
        TweenLite.to(this.note, 1, {
            autoAlpha: 0,
            // delay: 0.3,
            height: 0,
            scale: 0,
            onCompleteScope: this.note,
            onComplete: function () {
                this.remove();
            }
        });
    }

    delete(event) {
        console.log(this.data.get("trash"));
        event.preventDefault();
        axios.delete(this.data.get("destroy"))
            .then(() => {
                Toast.fire({
                    type: 'error',
                    title: 'Notitie is verwijderd'
                });
            }).catch(error => console.log(error));

    }

    cancel(event) {
        event.preventDefault();
        this.body = null;
    }

    deleteNote(note) {
        let notesController = this.getControllerByIdentifier("notes");
        // monthyearController.update(monthyear);
        notesController.deleteNote(note);
    }

    updateMonthYear(monthyear) {
        let monthyearController = this.getControllerByIdentifier("monthyear");
        // monthyearController.update(monthyear);
        monthyearController.update();
    }

    get body() {
        return this.bodyTarget.value;
    }

    set body(text) {
        return this.bodyTarget.value = text;
    }

    get datastatus() {
        // return this.datastatusTarget;
        this.data.get("datastatus");
    }

    set datastatus(text) {
        // return this.datastatusTarget = text;
        this.data.set("datastatus", text);
    }

    get content() {
        return this.contentTarget.innerHTML;
    }

    set content(text) {
        return this.contentTarget.value = text;
    }

    get note() {
        return this.noteTarget;
    }


    set note(text) {
        return this.noteTarget.outerHTML = text;
    }

    get notes() {
        return this.noteTargets;
    }
}

