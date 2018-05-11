// import { Controller } from "stimulus";
import { ApplicationController } from '../support/application-controller';

export default class extends ApplicationController
{
	static  targets = [
		'url',
		'body',
		'date',
		'note',
		'noteEdit',
		'errorBody',
		'errorDate',
	];

	// initialize() {
	// 	this.note.style.display = "block";
	// 	this.noteEdit.style.display = "none";
	// }


	addNote() {
		this.laravelCreate(this.url, {
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

	// editNote() {
	// 	// editNote( event ) {
	// 	// 	event.preventDefault();
	// 	// event.preventDefault();
	// 	this.note.style.display = "none";
	// 	this.noteEdit.style.display = "block";
	// 	// console.log($("#note").addClass("hidden"));
	// 	// this.note.class.add('hidden');
	// 	// this.noteEdit.class.remove('hidden');
	// }
	//
	// cancelEditNote() {
	// 	this.note.style.display = "block";
	// 	this.noteEdit.style.display = "none";
	// }
	//
	// editing( index ) {
	// 	// this.index = index;
	// 	// this.noteTargets.forEach(( el, i ) => {
	// 	// 	el.classList.toggle("note--current", index === i);
	// 	// });
	// }

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
		console.log(this.data.get("url"));
		console.log(this.url);
		this.laravelUpdate(this.url, {
			body: this.body,
			date: this.date,
		}).then(response => {
			console.log(response);
			// if ( !response.data.errors ) {
			// 	Turbolinks.visit(response.data);
			// } else {
			// 	this.errorNaam = response.data.errors.naam;
			// 	this.errorEmail = response.data.errors.email;
			// 	this.errorGeboortedatum = response.data.errors.geboortedatum;
			// }
		});
	}

	get url() {
		return this.data.get("url");
	}

	get body() {
		return this.bodyTarget.value;
	}

	// get id() {
	// 	return this.dateTarget.value;
	// }

	get date() {
		return this.dateTarget.value;
	}

	get note() {
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
	errorBodyTarget;
	errorDateTarget;

}