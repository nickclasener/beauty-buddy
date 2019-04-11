import {Controller} from "stimulus";

export default class extends Controller {
    static targets = [
        "morning",
        "midday",
        "evening",
        "dailyadvice",
    ];

    initialize() {
        if (this.data.get('created') !== null) {
            TweenLite.set(this.dailyadvice, {
                height: "auto"
            });
            TweenLite.from(this.dailyadvice, 1, {
                delay: 0.5,
                opacity: 0,
                height: 0,
            });
        }
    }

    edit(event) {
        event.preventDefault();
        axios.patch(this.data.get("update"), this.form).then(response => {
            this.dailyadvice = response.data;
            Swal.fire({
                type: 'success',
                title: 'Product advies is gewijzigd',
                showConfirmButton: false,
                timer: 1000
            });
        }).catch(error => console.log(error));
    }

    remove() {
        TweenLite.to(this.dailyadvice, 1, {
            delay: 0.5,
            autoAlpha: 0,
            height: 0,
            onCompleteScope: this.dailyadvice,
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
    }

    get dailyadvice() {
        return this.dailyadviceTarget;
    }

    set dailyadvice(text) {
        return this.dailyadviceTarget.outerHTML = text;
    }

    get form() {
        return {
            morning: this.morningTarget.value,
            midday: this.middayTarget.value,
            evening: this.eveningTarget.value,
        };
    }

    set form(text) {
        this.morningTarget.value = text;
        this.middayTarget.value = text;
        this.eveningTarget.value = text;
    }
}

