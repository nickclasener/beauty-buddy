import {Controller} from "stimulus";

export default class extends Controller {
    static targets = ["body", "huidanalyse", "monthyear"];

    connect() {

        // const a = [1, 2, 3, 4, 5];
        // a.forEach(function ( index, array) {
        //     if (val === 5) {
        //         array.push(6);
        //     }
        //     // console.log(val);
        //     console.log(index);
        //     console.log(array);
        // });
        // this.renderHuidanalyses();
    }

    create(event) {
        event.preventDefault();
        axios.post(this.data.get('url'), {
            body: this.bodyTarget.value
        }).then(response => {
            this.element.innerHTML = response.data;
        }).catch(error => console.log(error));
    }

    cancel(event) {
        event.preventDefault();
        this.bodyTarget.value = '';
    }

    render(huidanalyse) {
        console.log(huidanalyse);
        // console.log(huidanalyse);
        this.renderHuidanalyses(huidanalyse);
        // this.setActiveNumber();
        // this.renderClearCompleted();
        // this.renderFooter();
        // this.render();
        // this.renderFilters();
        // this.inputTarget.focus();
    }

    renderHuidanalyses(huidanalyse) {
        console.log(huidanalyse.innerHTML);
        this.monthyears.forEach(monthyear => {
            if (monthyear.innerHTML === 'March, 2019') {
                // console.log(monthyear.outerHTML);
            }
        });
        // const a = [1, 2, 3, 4, 5];
        // a.forEach(function (val ,index, array) {
        //     if (val === 5) {
        //         array.push(6);
        //     }
        //     console.log(val);
        //     console.log(index);
        //     console.log(array);
        // });

        //
        // this.huidanalyses.forEach(element => {
        // });
        // console.log(element);
        // if()
        // if (this.filter === ALL) {
        //     element.classList.remove("hidden");
        // } else if (this.filter === COMPLETED) {
        //     element.classList.toggle(
        //         "hidden",
        //         !element.classList.contains("completed")
        //     );
        // } else {
        //     element.classList.toggle(
        //         "hidden",
        //         element.classList.contains("completed")
        //     );
        // }
    }

    get huidanalyse() {
        return this.huidanalyseTarget;
    }

    get huidanalyses() {
        return this.huidanalyseTargets;
    }

    get monthyear() {
        return this.monthyearTarget;
    }

    get monthyears() {
        return this.monthyearTargets;
    }
}