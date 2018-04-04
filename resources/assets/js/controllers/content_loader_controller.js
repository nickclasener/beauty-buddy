import { Controller } from "stimulus";

export default class extends Controller
{
	connect() {
		this.load();

		if ( this.data.has("refreshInterval") ) {
			this.startRefreshing();
		}
	}

	disconnect() {
		this.stopRefreshing();
		Turbolinks.clearCache();
	}

	load() {
		axios.get(this.data.get("url"))
		     // .then(res => console.log(res.data))
		     .then(res => res.data)
		     .then(html =>
		     {
			     this.element.innerHTML = html;
		     });
	}


	startRefreshing() {
		this.refreshTimer = setInterval(() => {this.load();},
			this.data.get("refreshInterval"));
	}

	stopRefreshing() {
		if ( this.refreshTimer ) {
			clearInterval(this.refreshTimer);
		}
	}
}