import {Controller} from "stimulus";

export default class extends Controller {
    static targets = ["morning", "midday", "evening", "dailyadvice", "monthyear", "saveButton", "error"];

    errors() {
        this.errorTarget.innerText = '';
        this.errorTarget.classList.add('hidden');
    }

    create(event) {
        event.preventDefault();
        if (this.form.morning + this.form.midday + this.form.evening === '') {
            this.errorTarget.classList.remove('hidden');
            this.errorTarget.innerText = 'U moet minimaal 1 van de velden invullen';
            event.stopImmediatePropagation();
        } else {
            axios.post(this.data.get('store'), this.form)
                .then(response => {
                    this.form = null;
                    if (response.headers[0] === 'dailyAdvice') {
                        this.dailyadvice = response.data;
                    } else if (response.headers[0] === 'monthyear') {
                        this.monthyear = response.data;
                    }
                    Swal.fire({
                        type: 'success',
                        title: 'Product advies is toegevoegd',
                        showConfirmButton: false,
                        timer: 2000
                    });
                }).catch(error => console.log(error));
        }
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

    get dailyadvice() {
        return this.dailyadviceTarget;
    }

    set dailyadvice(text) {
        return this.dailyadviceTarget.insertAdjacentHTML('beforebegin', text);
    }

    get form() {
        return {
            morning: this.morningTarget.value,
            midday: this.middayTarget.value,
            evening: this.eveningTarget.value
        };
    }

    set form(text) {
        this.morningTarget.value = text;
        this.middayTarget.value = text;
        this.eveningTarget.value = text;
    }
}
