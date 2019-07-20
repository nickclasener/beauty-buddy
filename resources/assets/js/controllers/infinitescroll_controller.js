import {Application_controller} from "./application_controller";
import InfiniteScroll from 'infinite-scroll';

export default class extends Application_controller {
    static targets = ["path"];

    next(event) {
        event.preventDefault();

        new InfiniteScroll(this.element, {
            path: ".pagination__next", append: ".append-list", history: "", historyTitle: true, prefill: true
        });
    }
}
