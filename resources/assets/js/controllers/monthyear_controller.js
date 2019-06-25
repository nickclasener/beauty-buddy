import {Application_controller} from "./application_controller";

export default class extends Application_controller {
    static targets = ["monthyear"];

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
                    console.log(this);
                    this.remove();
                }
            });
            event.stopImmediatePropagation();
        }
    }

    get monthyear() {
        return this.monthyearTarget;
    }

    set monthyear(text) {
        return this.monthyearTarget.innerHTML = text;
    }
}
