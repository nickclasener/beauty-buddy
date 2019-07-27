import {Controller} from "stimulus";
import tippy from "tippy.js";

export default class extends Controller {
    static targets = ["textarea", "required"];

    focus() {
        this.textareaTarget.focus();
    }

    grow() {
        this.textareaTargets.forEach(function (target) {
            if (target.scrollHeight >= '80') {
                target.style.height = target.scrollHeight + 'px';
            }
        });
    }

}
