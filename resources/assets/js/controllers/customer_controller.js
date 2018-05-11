// import { Controller } from "stimulus";
import { ApplicationController } from '../support/application-controller';

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
			if ( response.data.errors ) {
				this.errorNaam = response.data.errors.naam;
				this.errorEmail = response.data.errors.email;
				this.errorGeboortedatum = response.data.errors.geboortedatum;
			} else {
				Turbolinks.visit(response.request.responseURL + "/edit", { action: "replace" });
				Turbolinks.visit(response.request.responseURL);
			}
		});
	}

	deleteCustomer() {
		this.laravelDelete(this.url)
		    .then(response =>
			    Turbolinks
				    .visit(response.data.responseURL));
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

	set errorNaam( error ) {
		return this.errorNaamTarget.innerHTML = ( error ? error : "" );
	}

	set errorEmail( error ) {
		return ( this.errorEmailTarget.innerHTML = error ? error : "" );
	}

	set errorGeboortedatum( error ) {
		return this.errorGeboortedatumTarget.innerHTML = ( error ? error : "" );
	}

	// Fixme: see notes_controller
	naamTarget;
	emailTarget;
	geboortedatumTarget;
	adresTarget;
	huisnummerTarget;
	plaatsTarget;
	postcodeTarget;
	telefoonTarget;
	mobielTarget;
	errorNaamTarget;
	errorEmailTarget;
	errorGeboortedatumTarget;
}



