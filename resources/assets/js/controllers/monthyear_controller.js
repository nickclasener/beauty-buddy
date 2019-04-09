import {ApplicationController} from "../controllers/application-controller";

export default class extends ApplicationController {
    static targets = ["monthyear", "content"];

    initialize() {
        if (this.data.get("created") !== null) {
            TweenLite.set(this.monthyear, {
                height: "auto"
            });
            TweenLite.from(this.monthyear, 1, {
                delay: 0.5,
                opacity: 0,
                height: 0,
            });
        }
    }

    remove(event) {
        if (this.monthyear.children.length <= 2) {
            TweenLite.to(this.monthyear, 1, {
                delay: 0.5,
                opacity: 0,
                height: 0,
                onCompleteScope: this.monthyear,
                onComplete: function () {
                    this.remove();
                }
            });
            event.stopImmediatePropagation();
        }
    }

    get content() {
        return this.contentTarget;
    }

    get monthyear() {
        return this.monthyearTarget;
    }

    set monthyear(text) {
        return this.monthyearTarget.innerHTML = text;
    }
}