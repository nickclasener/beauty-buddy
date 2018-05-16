// import { Controller } from "stimulus";
import { ApplicationController } from '../support/application-controller';

// let identifier;

export default class extends ApplicationController
{
	static  targets = [
		'id',
		'userId',
		'url',
		'body',
		'date',
		'note',
		'userId',
		'noteEdit',
		'errorBody',
		'errorDate',
	];

	connect() {
		// console.log(this.note);
		// console.log(this.getControllerByIdentifier(this.identifier));
		// console.log(this.data.get('test'));
		// console.log(this.dateTarget.outerHTML);
		// console.log(this.note);
		// console.log(this.bodyTarget.outerHTML);
	}

	addNote() {
		this.laravelCreate(this.url, {
			// user_id: this.userId,
			body: this.body,
			date: this.date,
		}).then(response => {
			if ( !response.data.errors ) {
				this.notes = response.data;
				this.body = "";
				this.date = "";
			} else {
				this.errorBody = "Het notitie veld is leeg";
				this.errorDate = "Er moet een datum ingevoerd worden dd/mm/yyyy";
			}
		});
	}

	deleteNote() {
		this.laravelDelete(this.url)
		    .then(response => {
			    this.reloadNote(response.data.responseURL);
		    });
	}

	reloadNote( newUrl ) {
		this.laravelGet(newUrl)
		    .then(response => response.data)
		    .then(html => document.body.innerHTML = html);
	}

	updateNote() {

		console.log(this.bodyTarget.value);
		// console.log(this.data.get);
		this.laravelUpdate(this.url, {
			id: this.id,
			body: this.body,
			date: this.date,
		}).then(response => {
			// console.log(response);
			// if ( !response.data.errors ) {
			// 	Turbolinks.visit(response.data);
			// } else {
			// 	this.errorNaam = response.data.errors.naam;
			// 	this.errorEmail = response.data.errors.email;
			// 	this.errorGeboortedatum = response.data.errors.geboortedatum;
			// }
		});
	}

	get id() {
		return this.data.get("id");
	}

	get userId() {
		return this.data.get("userId");
	}

	get url() {
		return this.data.get("url");
	}

	get body() {
		return this.bodyTarget.value;
	}

	get date() {
		return this.dateTarget.value;
	}

	get note() {
		// console.log(this.noteTarget.innerHTML);
		return this.noteTarget.value;
	}

	get noteEdit() {
		return this.noteEditTarget.value;
	}

	set body( text ) {
		return this.bodyTarget.value = text;
	}

	set date( text ) {
		return this.dateTarget.value = text;
	}

	set note( text ) {
		return this.noteTarget.value = text;
	}

	set noteEdit( text ) {
		return this.noteEditTarget.value = text;
	}

	set notes( text ) {
		return document.querySelector('notes').innerHTML = text;
	}

	set errorBody( error ) {
		return this.errorBodyTarget.innerHTML = ( error ? error : "" );
	}

	set errorDate( error ) {
		return this.errorDateTarget.innerHTML = ( error ? error : "" );
	}

	// FIXME: This is to remove the phpstorm squiggly line from errors in response.data.errors.email etc
	errors;
	noteTargets;
	bodyTarget;
	dateTarget;
	noteTarget;
	errorBodyTarget;
	errorDateTarget;

}