import {Controller} from "stimulus";

export default class extends Controller {

    initialize() {
        this.load();
    }

    connect() {
        this.load();

        if (this.data.has("refreshInterval")) {
            this.startRefreshing();
        }
    }

    disconnect() {
        this.stopRefreshing();
    }

    load() {
        // console.log(this.data.get("url"));
        fetch(this.data.get("url"))
            .then(response => response.text())
            .then(html => {
                // this.outputTarget.textContent = html;
                // console.log(this.element.innerHTML = html);
                this.element.innerHTML = html;
            });
    }


    startRefreshing() {
        this.refreshTimer = setInterval(() => {
            this.load();
        }, this.data.get("refreshInterval"));
    }

    stopRefreshing() {
        if (this.refreshTimer) {
            clearInterval(this.refreshTimer);
        }
    }
}