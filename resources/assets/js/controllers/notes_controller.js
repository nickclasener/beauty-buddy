import {Controller} from "stimulus";

export default class extends Controller {
    static targets = ["body", "note", "monthyear"];

    create(event) {
        event.preventDefault();
        axios.post(this.data.get('store'), this.form).then(response => {
            this.form = null;
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
        this.form = '';
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

    get form() {
        return {
            body: this.bodyTarget.value,
        };
    }

    set form(text) {
        this.bodyTarget.value = text;
    }
}