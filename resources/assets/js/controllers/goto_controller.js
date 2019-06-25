import {Controller} from 'stimulus';


export default class extends Controller {
    static targets = ['goto'];

    goto(event) {
        event.preventDefault();
        const href = this.gotoTarget.getAttribute('href');
        const hash = this.gotoTarget.getAttribute('data-goto-hash');
        console.log(hash);
        if (href === location.pathname) {
            document.getElementById(hash).scrollIntoView({block: "top"});
        } else {
            Turbolinks.visit(href + '#' + hash);
        }
        // if
        // console.log(href);
        // console.log(href);
        // // const goto = selected.getAttribute('href');
        // // console.log(goto);
        // // this.removeResults();
        // // console.log(document.getElementById(goto));
        // document.getElementById(goto).scrollIntoView({block: "center"});
        // document.getElementById(goto).classList.add('animated', 'bounceIn', 'goto');
        // setTimeout(function () {
        //     document.getElementById(goto).classList.remove('animated', 'bounceIn', 'goto');
        // }, 2000);

    }
}
