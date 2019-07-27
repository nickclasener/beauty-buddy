import {Controller} from "stimulus";

export default class extends Controller {
    static targets = [
        "show",
        "hide",
        "klantShow",
        "klantHide",
        "active",
        "activeicon",
        "deactivate"
    ];

    toggle() {
        this.show.classList.toggle("hidden");
        this.hide.classList.toggle("hidden");
    }

    active(event) {
        this.activeiconTarget.classList.toggle("text-teal-500");
        this.activeiconTarget.classList.toggle("text-teal-200");
        event.stopImmediatePropagation();
    }

    inactive() {
        this.activeiconTarget.classList.add("text-teal-500");
        this.activeiconTarget.classList.remove("text-teal-200");
    }

    toggleKlant(event) {
        event.preventDefault();
        this.klantShowTarget.classList.add("hidden");
        this.klantHideTarget.classList.remove("hidden");
        this.activeTarget.classList.add("active");
        this.deactivateTargets[0].classList.remove("active");
        this.deactivateTargets[1].classList.remove("active");
        this.deactivateTargets[2].classList.remove("active");
        // console.log(this.activeTarget.getAttribute('href'));
    }

    hidden(event) {
        if (
            this.element.contains(event.target) === false &&
            !this.hide.classList.contains("hidden")
        ) {
            this.show.classList.remove("hidden");
            this.hide.classList.add("hidden");
        }
    }

    get hide() {
        return this.hideTarget;
    }

    get show() {
        return this.showTarget;
    }
}
