// import { Controller } from "stimulus";
import { ApplicationController } from '../support/application-controller';

// const ENTER_KEY = 13;
// const ESCAPE_KEY = 27;

export default class extends ApplicationController
{
	static  targets = [
		'naam',
		'email',
		'geboortedatum',
		'adres',
		'huisnummer',
		'plaats',
		'postcode',
		'telefoon',
		'mobiel',
	];

	addCustomer() {

		this.laravelCreate('/klanten', {
			naam: this.naam,
			email: this.email,
			geboortedatum: this.geboortedatum,
			adres: this.adres,
			huisnummer: this.huisnummer,
			plaats: this.plaats,
			postcode: this.postcode,
			telefoon: this.telefoon,
			mobiel: this.mobiel
		}).then(response => {
			let url = response.request.responseURL;
			if ( url.match(/\/create/) ) {
				document.body.innerHTML = response.data;
			} else {
				Turbolinks.visit(url);
			}
		});
	}

	deleteCustomer() {
		this.laravelDelete(this.url);
	}

	updateCustomer() {
		this.laravelUpdate(this.url, {
			naam: this.naam,
			email: this.email,
			geboortedatum: this.geboortedatum,
			adres: this.adres,
			huisnummer: this.huisnummer,
			plaats: this.plaats,
			postcode: this.postcode,
			telefoon: this.telefoon,
			mobiel: this.mobiel
		}).then(response => {
			console.log(response);
			if ( url.match(/\/edit/) ) {
				document.body.innerHTML = response.data;
			} else {
				Turbolinks.visit(`/klanten/${response.data.slug}`);
			}
		});
	}

	get url() {
		return this.data.get("url");
	}

	get naam() {
		return this.naamTarget.value;
	}

	get email() {
		return this.emailTarget.value;
	}

	get geboortedatum() {
		return this.geboortedatumTarget.value;
	}

	get adres() {
		return this.adresTarget.value;
	}

	get huisnummer() {
		return this.huisnummerTarget.value;
	}

	get plaats() {
		return this.plaatsTarget.value;
	}

	get postcode() {
		return this.postcodeTarget.value;
	}

	get telefoon() {
		return this.telefoonTarget.value;
	}

	get mobiel() {
		return this.mobielTarget.value;
	}


}