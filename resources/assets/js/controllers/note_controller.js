import {Controller} from "stimulus";

export default class extends Controller {
    static targets = [
        "body",
        "content",
        "note",
    ];

    initialize() {
        if (this.data.get('created') !== null) {
            TweenLite.set(this.note, {
                height: "auto"
            });
            TweenLite.from(this.note, 1, {
                delay: 0.5,
                opacity: 0,
                height: 0,
            });
        }
    }

    edit(event) {
        event.preventDefault();
        axios.patch(this.data.get("update"), {
            body: this.body
        }).then(response => {
            this.note = response.data;
            Swal.fire({
                type: 'success',
                title: 'Notitie is gewijzigd',
                showConfirmButton: false,
                timer: 1000
            });
        }).catch(error => console.log(error));
    }

    remove() {
        TweenLite.to(this.note, 1, {
            delay: 0.5,
            autoAlpha: 0,
            height: 0,
            onCompleteScope: this.note,
            onComplete: function () {
                this.remove();
            }
        });
    }

    delete(event) {
        event.preventDefault();
        axios.delete(this.data.get("destroy"))
            .catch(error => console.log(error));
        Swal.fire({
            type: 'error',
            title: 'Notitie is verwijderd',
            showConfirmButton: false,
            timer: 2000
        });
    }

    cancel(event) {
        event.preventDefault();
        // this.body = null;
    }

    get body() {
        return this.bodyTarget.value;
    }

    set body(text) {
        return this.bodyTarget.value = text;
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

}

