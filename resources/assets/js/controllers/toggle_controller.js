import {Controller} from "stimulus";

export default class extends Controller {
    static targets = [
        "show",
        "hide",
        "klantShow",
        "klantHide",
        "active",
        "deactivate"
    ];


    toggle() {
        this.show.classList.toggle('hidden');
        this.hide.classList.toggle('hidden');
    }

    toggleKlant(event) {
        event.preventDefault();
        this.klantShowTarget.classList.add('hidden');
        this.klantHideTarget.classList.remove('hidden');
        this.activeTarget.classList.add('active');
        this.deactivateTargets[0].classList.remove('active');
        this.deactivateTargets[1].classList.remove('active');
        this.deactivateTargets[2].classList.remove('active');
    }

    get hide() {
        return this.hideTarget;
    }

    get show() {
        return this.showTarget;
    }
}
