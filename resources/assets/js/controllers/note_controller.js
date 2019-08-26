import {Controller} from "stimulus";

export default class extends Controller {
    static targets = [
        "body",
        "note",
        "error"
    ];

    initialize() {
        if (this.data.get('created') !== null) {
            TweenLite.set(this.note, {
                height: "auto"
            });
            TweenLite.from(this.note, 1, {
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
                this.note = response.data;
                Swal.fire({
                    type: 'success',
                    title: 'Notitie is gewijzigd',
                    showConfirmButton: false,
                    timer: 1000
                });
            }).catch(error => console.log(error));
        }
    }

    removeNote() {
        TweenLite.to(this.note, 1, {
            delay: 0.5,
            autoAlpha: 0,
            height: 0,
            onCompleteScope: this.note,
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
            title: 'Wilt u deze notitie permanent verwijderen?',
            // text: "Deze handeling kan niet terug gedraaid worden",
            type: 'error',
            showCancelButton: true,
            confirmButtonText: 'Ja, verwijder notitie',
            cancelButtonText: 'Annuleer'
        }).then(result => {
            if (result.value) {
                Swal.fire({
                    title: 'Verwijderd!',
                    text: 'Uw notitie is verwijderd.',
                    type: 'success',
                    showConfirmButton: false,
                    timer: 2000,
                    onClose: () => {
                        axios.delete(this.data.get("destroy"))
                            .catch(error => console.log(error));
                        if (monthyear.children.length <= 2) {
                            monthyear.dispatchEvent(newEvent);
                        }
                        this.removeNote();
                    }
                });
            }
        });
    }

    cancel(event) {
        event.preventDefault();
    }

    get note() {
        return this.noteTarget;
    }

    set note(text) {
        return this.noteTarget.outerHTML = text;
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

