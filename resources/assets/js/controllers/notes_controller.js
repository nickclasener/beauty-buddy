import {Controller} from "stimulus";

export default class extends Controller {
    static targets = ["body", "note", "monthyear", "saveButton", "error"];

    errors() {
        this.errorTarget.innerText = '';
        this.errorTarget.classList.add('hidden');
    }

    create(event) {
        event.preventDefault();
        if (this.body === '') {
            this.errorTarget.classList.remove('hidden');
            this.errorTarget.innerText = 'U kunt geen lege notitie opslaan';
            event.stopImmediatePropagation();
        } else {
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
    }

    cancel(event) {
        event.preventDefault();
        this.errorTarget.classList.remove('hidden');
        this.errorTarget.innerText = 'U kunt geen lege notitie opslaan';
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

    get body() {
        return this.bodyTarget.value;
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
