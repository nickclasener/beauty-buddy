import {Controller} from "stimulus";

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
        "geboortedatum"
    ];

    create(event) {
        event.preventDefault();
        axios.post(this.data.get('url'), this.form).then(response => {
            Turbolinks.visit(response.request.responseURL);
        }).catch(error => console.log(error));
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
        if (confirm('Weet je zeker dat je de klant wil verwijderen')) {
            axios.delete(this.data.get("destroy"), this.form)
                .then(response => {
                    Turbolinks.visit(response.data);
                }).catch(error => console.log(error));
        }
    }

    cancel(event) {
        event.preventDefault();
        this.form = '';
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