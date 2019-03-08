import {Controller} from "stimulus";

export default class extends Controller {
    static targets = [
        "show",
        "hide"
    ];

    toggle() {
        this.showTarget.classList.toggle('hidden');
        this.hideTarget.classList.toggle('hidden');
    }
}