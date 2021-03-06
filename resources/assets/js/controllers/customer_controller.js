import {Controller} from "stimulus";
import {convertDateFormat} from "stimulus-flatpickr/src/strftime_mapping";

export default class extends Controller {
    static targets = [
        "naam",
        "straatnaam",
        "huisnummer",
        "postcode",
        "plaats",
        "telefoon",
        "mobiel",
        "email",
        "geboortedatum",
        "error"
    ];

    errors() {
        this.errorTarget.innerText = '';
        this.errorTarget.classList.add('hidden');
    }

    create(event) {
        event.preventDefault();

        if (this.empty() === '') {
            this.errorTarget.classList.remove('hidden');
            this.errorTarget.innerText = 'U moet het veld vullen of annuleren';
            event.stopImmediatePropagation();
        } else {
            axios.post(this.data.get('url'), this.form).then(response => {
                Swal.fire({
                    type: 'success',
                    title: 'Nieuwe klant is toegevoegd',
                    showConfirmButton: false,
                    timer: 2000,
                    onClose: () => {
                        return [
                            Turbolinks.visit(response.request.responseURL)
                        ];
                    }
                });
            }).catch(error => console.log(error));
        }
    }

    update(event) {
        event.preventDefault();
        axios.put(this.data.get("update"), this.form).then(response => {
            Turbolinks.visit(response.data);
        }).catch(error => console.log(error));
    }

    delete(event) {
        event.preventDefault();
        //Todo: Change to personalized
        Swal.fire({
            title: 'Wilt u de klant permanent verwijderen?',
            // text: "Deze handeling kan niet terug gedraaid worden",
            type: 'error',
            showCancelButton: true,
            confirmButtonText: 'Ja, verwijder klant',
            cancelButtonText: 'Annuleer'
        }).then(result => {
            if (result.value) {
                Swal.fire({
                    title: 'Verwijderd!',
                    text: 'Uw Klant is verwijderd.',
                    type: 'success',
                    showConfirmButton: false,
                    timer: 2000,
                    onClose: () => {
                        return [
                            axios.delete(this.data.get("destroy"), this.form
                            ).then(response => {
                                Turbolinks.visit(response.data);
                            }).catch(error => console.log(error))
                        ];
                    }
                });
            }
        });
    }

    cancel(event) {
        event.preventDefault();
        this.errorTarget.classList.add('hidden');
        this.form = '';
    }

    empty() {
        return this.naamTarget.value + this.straatnaamTarget.value + this.huisnummerTarget.value + this.postcodeTarget.value + this.plaatsTarget.value + this.telefoonTarget.value + this.mobielTarget.value + this.emailTarget.value + this.geboortedatumTarget.value;
    }

    get form() {
        return {
            naam: this.naamTarget.value,
            straatnaam: this.straatnaamTarget.value,
            huisnummer: this.huisnummerTarget.value,
            postcode: this.postcodeTarget.value,
            plaats: this.plaatsTarget.value,
            telefoon: this.telefoonTarget.value,
            mobiel: this.mobielTarget.value,
            email: this.emailTarget.value,
            geboortedatum: this.geboortedatumTarget.value,
        };
    }

    set form(text) {
        this.naamTarget.value = text;
        this.straatnaamTarget.value = text;
        this.huisnummerTarget.value = text;
        this.postcodeTarget.value = text;
        this.plaatsTarget.value = text;
        this.telefoonTarget.value = text;
        this.mobielTarget.value = text;
        this.emailTarget.value = text;
        this.geboortedatumTarget.value = text;
    }
}
