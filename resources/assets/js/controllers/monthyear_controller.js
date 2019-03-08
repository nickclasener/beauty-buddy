import {Controller} from "stimulus";

export default class extends Controller {
    static targets = ["monthyear"];

    update() {
        // REVIEW: jquery_ujs this.monthyear.children.length <= 1 && this.monthyear.remove();
        this.monthyear.children.length <= 2 &&
        TweenLite.to(this.note, 0.5, {
            height: 0,
            opacity: 0,
            onCompleteScope: this.monthyear,
            onComplete: function () {
                this.remove();
            }
        });
        // $(this.monthyear)
        //     .animate({
        //     height: 0,
        //     opacity: 0
        // }, 1000, "swing", function () {
        //     this.remove();
        // });


    }

    get monthyear() {
        return this.monthyearTarget;
    }
}