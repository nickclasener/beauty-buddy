import {Controller} from "stimulus";

export default class extends Controller {
    static targets = [
        "show",
        "hide",
    ];

    connect() {
        this.show.classList.add('.grow');
        // this.hide.classList.toggle('hidden');
        // console.log(this.hide.clientHeight);
        // this.hide.classList.toggle('hidden');
    }

    toggle() {
        this.show.classList.toggle('hidden');
        this.hide.classList.toggle('hidden');
    }

    // grow(event) {
    //     event.preventDefault();
    //     this.hideTarget.classList.toggle('grow');
    // }

    get hide() {
        return this.hideTarget;
    }

    get show() {
        return this.showTarget;
    }
}