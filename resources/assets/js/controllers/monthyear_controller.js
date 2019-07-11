import {Application_controller} from "./application_controller";

export default class extends Application_controller {
    static targets = ["monthyear"];

    initialize() {
        this.removeMonthYear();
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

    removeMonthYear() {
        this.monthyear.addEventListener('removeMonthyear', function () {
            TweenLite.to(this, 1, {
                delay: 0.5,
                opacity: 0,
                height: 0,
                onCompleteScope: this,
                onComplete: function () {
                    this.remove();
                }
            });
        }, false);
    }

    get monthyear() {
        return this.monthyearTarget;
    }

    set monthyear(text) {
        return this.monthyearTarget.innerHTML = text;
    }
}
