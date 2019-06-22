import {Controller} from "stimulus";

export default class extends Controller {
    static targets = [
        "show",
        "hide",
    ];


    toggle() {
        this.show.classList.toggle('hidden');
        this.hide.classList.toggle('hidden');
    }

    get hide() {
        return this.hideTarget;
    }

    get show() {
        return this.showTarget;
    }
}
