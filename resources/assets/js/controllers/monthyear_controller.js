import {ApplicationController} from "../controllers/application-controller";

export default class extends ApplicationController {
    static targets = ["monthyear", "content"];

    remove() {
        // REVIEW: jquery_ujs this.monthyear.children.length <= 1 && this.monthyear.remove();
        if (this.monthyear.children.length <= 2) {
            TweenLite.to(this.monthyear, 1, {
                autoAlpha: 0,
                height: 0,
                scale: 0,
                onCompleteScope: this.monthyear,
                onComplete: function () {
                    this.remove();
                }
            });
        }
    }

    update() {
        if (this.monthyear.children.length <= 2) {
            TweenLite.to(this.monthyear, 1, {
                autoAlpha: 0,
                height: 0,
                scale: 0,
            }).reverse(1);
        }
    }

    get monthyear() {
        return this.monthyearTarget;
    }

    get content() {
        return this.contentTarget.innerText;
    }
}