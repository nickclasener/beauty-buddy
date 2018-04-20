// import { Controller } from "stimulus";
import { ApplicationController } from '../support/application-controller';

// const ENTER_KEY = 13;
// const ESCAPE_KEY = 27;

export default class extends ApplicationController
{
	static  targets = [
		'url',
		'naam',
		'email',
		'geboortedatum',
		'adres',
		'huisnummer',
		'plaats',
		'postcode',
		'telefoon',
		'mobiel',
		'errorNaam',
		'errorEmail',
		'errorGeboortedatum',
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
			if ( !response.data.errors ) {
				Turbolinks.visit(response.request.responseURL);
			} else {
				this.errorNaam = response.data.errors.naam;
				this.errorEmail = response.data.errors.email;
				this.errorGeboortedatum = response.data.errors.geboortedatum;
			}
		}).catch(error => console.log(error));
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
			if ( !response.data.errors ) {
				Turbolinks.visit(response.data);
			} else {
				this.errorNaam = response.data.errors.naam;
				this.errorEmail = response.data.errors.email;
				this.errorGeboortedatum = response.data.errors.geboortedatum;
			}
		}).catch(error => console.log(error));
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

	set errorNaam( error ) {
		return this.errorNaamTarget.innerHTML = ( error ? error : "" );
	}

	set errorEmail( error ) {
		return ( this.errorEmailTarget.innerHTML = error ? error : "" );
	}

	set errorGeboortedatum( error ) {
		return this.errorGeboortedatumTarget.innerHTML = ( error ? error : "" );
	}

}