import {Controller} from "stimulus";

export default class extends Controller {
    static targets = ["body", "huidanalyse", "monthyear"];

    create(event) {
        event.preventDefault();
        axios.post(this.data.get('store'), this.form).then(response => {
            this.form = null;
            if (response.headers[0] === 'huidanalyse') {
                this.huidanalyse = response.data;
            } else if (response.headers[0] === 'monthyear') {
                this.monthyear = response.data;
            }
            Swal.fire({
                type: 'success',
                title: 'Huidanalyse is toegevoegd',
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

    get huidanalyse() {
        return this.huidanalyseTarget;
    }

    set huidanalyse(text) {
        return this.huidanalyseTarget.insertAdjacentHTML('beforebegin', text);
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
