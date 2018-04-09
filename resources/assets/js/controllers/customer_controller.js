// import { Controller } from "stimulus";
import { ApplicationController } from '../support/application-controller';

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
		'mobiel'
	];

	// connect() {
	// this.addCustomer();
	// }

	//
	addCustomer() {
		this.laravelCreate('/klanten', {
			// naam: "nick",
			// email: "nick@nick.com",
			naam: this.naam,
			email: this.email,
			geboortedatum: this.geboortedatum,
			adres: this.adres,
			huisnummer: this.huisnummer,
			plaats: this.plaats,
			postcode: this.postcode,
			telefoon: this.telefoon,
			mobiel: this.mobiel
		});
		// .then(( response ) => this.getCustomerUrl(response.request.responseURL));
	}

	// getCustomerUrl( newurl ) {
	// 	console.log(axios.get(newurl).then(response => response.data).then(html => {
	// 		document.body.innerHTML = html;
	// 	}));
	// }

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