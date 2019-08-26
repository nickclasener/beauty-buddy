import {Controller} from "stimulus";

export default class extends Controller {
    static targets = [
        "body",
        "huidanalyse",
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

    removeHuidanalyse() {
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

        // Swal.fire({
        //     type: 'error',
        //     title: 'Huidanalyse is verwijderd',
        //     showConfirmButton: false,
        //     timer: 2000
        // });

        event.preventDefault();
        const monthyear = this.element.closest('[data-target="monthyear.monthyear"]');
        let newEvent = document.createEvent('Event');
        newEvent.initEvent('removeMonthyear', true, true);
        Swal.fire({
            title: 'Wilt u deze huidanalyse permanent verwijderen?',
            // text: "Deze handeling kan niet terug gedraaid worden",
            type: 'error',
            showCancelButton: true,
            confirmButtonText: 'Ja, verwijder huidanalyse',
            cancelButtonText: 'Annuleer'
        }).then(result => {
            if (result.value) {
                Swal.fire({
                    title: 'Verwijderd!',
                    text: 'Uw huidanalyse is verwijderd.',
                    type: 'success',
                    showConfirmButton: false,
                    timer: 2000,
                    onClose: () => {
                        axios.delete(this.data.get("destroy"))
                            .catch(error => console.log(error));
                        if (monthyear.children.length <= 2) {
                            monthyear.dispatchEvent(newEvent);
                        }
                        this.removeHuidanalyse();
                    }
                });
            }
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

