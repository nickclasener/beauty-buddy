import {Controller} from "stimulus";

export default class extends Controller {
    static targets = ["textarea"];

    initiate() {
        return this.textareaTarget.style.height = this.textareaTarget.scrollHeight + 'px';
    }

    grow() {
        return this.textareaTarget.style.height = this.textareaTarget.scrollHeight + 'px';
        // return this.textareaTarget.style.height = this.textareaTarget.offset + 'px';
    }
}
