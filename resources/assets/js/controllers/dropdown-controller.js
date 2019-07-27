import {Controller} from 'stimulus';

export default class extends Controller {
    static targets = ['responsiveMenu', 'accountMenu'];

    connect() {
        this.responsiveMenuClass = this.data.get('class') || 'hidden';
        this.accountMenuClass = this.data.get('class') || 'hidden';
    }

    toggleResponsiveMenu() {
        this.responsiveMenuTarget.classList.toggle(this.responsiveMenuClass);
    }

    hideResponsiveMenu(event) {
        if (
            this.element.contains(event.target) === false &&
            !this.responsiveMenuTarget.classList.contains(this.responsiveMenuClass)
        ) {
            this.responsiveMenuTarget.classList.add(this.responsiveMenuClass);
        }
    }

    toggleAccountMenu() {
        this.accountMenuTarget.classList.toggle(this.accountMenuClass);
    }


    hideAccountMenu(event) {
        if (
            this.element.contains(event.target) === false &&
            !this.accountMenuTarget.classList.contains(this.accountMenuClass)
        ) {
            this.accountMenuTarget.classList.add(this.accountMenuClass);
        }
    }
}
