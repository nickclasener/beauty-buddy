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
            Turbolinks.visit(response.data);
        }).catch(error => console.log(error));
    }


    edit(event) {
        event.preventDefault();
        axios.patch(this.data.get("update"), this.form).then(response => {
            this.element.outerHTML = response.data;
        });
    }

    delete(event) {
        event.preventDefault();
        console.log(this.data.get("destroy"));
        axios.delete(this.data.get("destroy"))
            .then(() => {
                this.element.remove();
            });
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
}