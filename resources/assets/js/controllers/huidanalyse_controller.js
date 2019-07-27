import {Controller} from "stimulus";

export default class extends Controller {
    static targets = [
        "body",
        "huidanalyse",
        "saveButton",
        "error"
    ];

    initialize() {
        if (this.data.get('created') !== null) {
            TweenLite.set(this.huidanalyse, {
                height: "auto"
            });
            TweenLite.from(this.huidanalyse, 1, {
                delay: 0.5,
                opacity: 0,
                height: 0,
            });
        }
    }

    errors() {
        this.errorTarget.innerText = '';
        this.errorTarget.classList.add('hidden');
    }

    edit(event) {
        event.preventDefault();
        if (this.body === '') {
            this.errorTarget.classList.remove('hidden');
            this.errorTarget.innerText = 'U moet het veld vullen of annuleren';
            event.stopImmediatePropagation();
        } else {
            axios.patch(this.data.get("update"), this.form).then(response => {
                this.huidanalyse = response.data;
                Swal.fire({
                    type: 'success',
                    title: 'Huidanalyse is gewijzigd',
                    showConfirmButton: false,
                    timer: 1000
                });
            }).catch(error => console.log(error));
        }
    }

    remove() {
        TweenLite.to(this.huidanalyse, 1, {
            delay: 0.5,
            opacity: 0,
            height: 0,
            onCompleteScope: this.huidanalyse,
            onComplete: function () {
                this.remove();
            }
        });
    }

    delete(event) {
        event.preventDefault();
        axios.delete(this.data.get("destroy"))
            .then(() => {
            })
            .catch(error => console.log(error));
        Swal.fire({
            type: 'error',
            title: 'Huidanalyse is verwijderd',
            showConfirmButton: false,
            timer: 2000
        });
    }

    cancel(event) {
        event.preventDefault();
    }

    get huidanalyse() {
        return this.huidanalyseTarget;
    }

    set huidanalyse(text) {
        return this.huidanalyseTarget.outerHTML = text;
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

