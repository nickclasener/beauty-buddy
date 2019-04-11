import {Controller} from "stimulus";

export default class extends Controller {
    static targets = ["body", "huidanalyse", "monthyear"];

    create(event) {
        event.preventDefault();
        axios.post(this.data.get('store'), {
            body: this.body,
        }).then(response => {
            this.body = null;
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

    get huidanalyse() {
        return this.huidanalyseTarget;
    }

    set huidanalyse(text) {
        return this.huidanalyseTarget.insertAdjacentHTML('beforebegin', text);
    }


    get huidanalyses() {
        return this.huidanalyseTargets;
    }


}