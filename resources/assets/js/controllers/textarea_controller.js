import {Controller} from "stimulus";

export default class extends Controller {
    static targets = ["textarea"];

    focus() {
        this.textareaTarget.focus();
    }

    grow() {
        if (this.textareaTarget.scrollHeight >= '80') {
            return this.textareaTarget.style.height = this.textareaTarget.scrollHeight + 'px';
        }
    }
}
