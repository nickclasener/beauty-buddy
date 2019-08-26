import {Controller} from "stimulus";

export default class extends Controller {
    static targets = [
        "morning",
        "midday",
        "evening",
        "dailyadvice",
        "error"
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

    errors() {
        this.errorTarget.innerText = '';
        this.errorTarget.classList.add('hidden');
    }

    edit(event) {
        event.preventDefault();
        if (this.form.morning + this.form.midday + this.form.evening === '') {
            this.errorTarget.classList.remove('hidden');
            this.errorTarget.innerText = 'U moet minimaal 1 van de velden invullen';
            event.stopImmediatePropagation();
        } else {
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
    }

    removeProductAvice() {
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
        const monthyear = this.element.closest('[data-target="monthyear.monthyear"]');
        let newEvent = document.createEvent('Event');
        newEvent.initEvent('removeMonthyear', true, true);
        Swal.fire({
            title: 'Wilt u dit advies verwijderen',
            // text: "Deze handeling kan niet terug gedraaid worden",
            type: 'error',
            showCancelButton: true,
            confirmButtonText: 'Ja, verwijder dit Advies',
            cancelButtonText: 'Annuleer'
        }).then(result => {
            if (result.value) {
                Swal.fire({
                    title: 'Verwijderd!',
                    text: 'Uw advies is verwijderd.',
                    type: 'success',
                    showConfirmButton: false,
                    timer: 2000,
                    onClose: () => {
                        axios.delete(this.data.get("destroy"))
                            .catch(error => console.log(error));
                        if (monthyear.children.length <= 2) {
                            monthyear.dispatchEvent(newEvent);
                        }
                        this.removeProductAvice();
                    }
                });
            }
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

