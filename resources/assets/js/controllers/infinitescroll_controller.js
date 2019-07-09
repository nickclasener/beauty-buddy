import {Application_controller} from "./application_controller";
import InfiniteScroll from 'infinite-scroll';


export default class extends Application_controller {
    static targets = ["path"];

    next(event) {
        event.preventDefault();
        // console.log(window.screenY);
        // console.log(window.innerHeight / 2);

        let infScroll = new InfiniteScroll(this.element, {
            path: ".pagination__next", append: ".append-list", history: "", historyTitle: true
        });

        // infScroll.loadNextPage();
        // // this.element
        // console.log(event);
    }


}
