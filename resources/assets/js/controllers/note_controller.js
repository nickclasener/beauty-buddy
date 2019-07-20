import {Controller} from "stimulus";

export default class extends Controller {
    static targets = [
        "body",
        "note",
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

    edit(event) {
        event.preventDefault();
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
        // const options = Array.from(this.element.closest('[data-controller="monthyear"]'));
        const monthyear = this.element.closest('[data-target="monthyear.monthyear"]');
        let newEvent = document.createEvent('Event');
        newEvent.initEvent('removeMonthyear', true, true);
        //
        // if (monthyear.children.length <= 2) {
        //     monthyear.dispatchEvent(newEvent);
        // }
        // this.removeNote();
        // const selected = this.resultsTarget.querySelector('[aria-selected="true"]');
        // const index = options.indexOf(selected);
        // console.log(monthyear..dispatchEvent('monthyear#remove'));
        // axios.delete(this.data.get("destroy"))
        //     .catch(error => console.log(error));
        //
        Swal.fire({
            title: 'Wilt u de klant permanent verwijderen?',
            // text: "Deze handeling kan niet terug gedraaid worden",
            type: 'error',
            showCancelButton: true,
            confirmButtonText: 'Ja, verwijder klant',
            cancelButtonText: 'Annuleer deze actie'
        }).then(result => {
            if (result.value) {
                Swal.fire({
                    title: 'Deleted!',
                    text: 'Your file has been deleted.',
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

    get form() {
        return {
            body: this.bodyTarget.value,
        };
    }

    set form(text) {
        this.bodyTarget.value = text;
    }
}

