import {Controller} from "stimulus";

export default class extends Controller {
    static targets = ["body", "note", "monthyear"];

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
            Swal.fire({
                type: 'success',
                title: 'Notitie is toegevoegd',
                showConfirmButton: false,
                timer: 2000
            });
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