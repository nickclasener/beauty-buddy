import {Controller} from "stimulus";

export default class extends Controller {
    static targets = ["body"];

    edit(event) {
        event.preventDefault();
        axios.patch(this.data.get("update"), {
            body: this.bodyTarget.value
        }).then(response => {
            this.element.outerHTML = response.data;
        });
    }

    delete(event) {
        event.preventDefault();
        axios.delete(this.data.get("destroy"))
            .then(() => {
                this.element.remove();
            });
    }
}