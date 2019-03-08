import {Controller} from "stimulus";

export default class extends Controller {
    static targets = [
        "body",
        "content",
        "note"
    ];



    edit(event) {
        event.preventDefault();
        axios.patch(this.data.get("update"), {
            body: this.body
        }).then(response => {
            this.note = response.data;
        }).catch(error => console.log(error));
    }

    delete(event) {
        event.preventDefault();
        axios.delete(this.data.get("destroy"))
            .then(() => {
                TweenLite.to(this.note, 0.5, {
                    height: 0,
                    opacity: 0,
                    onCompleteScope: this.note,
                    onComplete: function () {
                        this.remove();
                    }
                });
            }).catch(error => console.log(error));
    }

    cancel(event) {
        event.preventDefault();
        this.body = null;
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

    // }
    get note() {
        return this.noteTarget;
    }

    set note(text) {
        return this.noteTarget.outerHTML = text;
    }
}