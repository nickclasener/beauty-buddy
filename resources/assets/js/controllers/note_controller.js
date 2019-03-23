// import {ApplicationController} from "../controllers/application-controller";
//
// export default class extends ApplicationController {
import {Controller} from "stimulus";

export default class extends Controller {
    static targets = [
        "body",
        "content",
        "note",
    ];

    initialize() {
        // if (this.data.get("monthyear") !== null) {
        //     this.updateMonthYear(this.data.get("monthyear"));
        // }

        if (this.data.get('created') !== null) {

            TweenLite.set(this.note, {
                height: "auto"
            });
            TweenLite.from(this.note, 1, {
                autoAlpha: 0,
                height: 0,
                scale: 0,
            });
        }
        // console.log(this.note);
        // console.log(this.element);
    }

    // create(note) {
    //     this.note = note;
    //     // this.notes.for(div);
    //     // console.log(note);
    // }

    edit(event) {
        event.preventDefault();
        axios.patch(this.data.get("update"), {
            body: this.body
        }).then(response => {
            this.note = response.data;
            Toast.fire({
                type: 'info',
                title: 'Notitie is gewijziged'
            });
        }).catch(error => console.log(error));
    }

    remove() {
        TweenLite.to(this.note, 1, {
            opacity: 0,
            height: 0,
            scale: 0,
            onCompleteScope: this.note,
            onComplete: function () {
                this.remove();
            }
        });
        // Toast.fire({
        //     type: 'error',
        //     title: 'Notitie is verwijderd'
        // });
        // TweenLite.to(this.note, {
        //     autoAlpha: 1,
        //     height: "100%",
        //     scale: 1,
        // });
        // TweenLite.from(this.note, 1, {
        //     autoAlpha: 0,
        //     scale: 0,
        //     height: 0,
        // }).reverse(1);
        // const note = this.note;

    }

    delete(event) {
        event.preventDefault();

        // isImmediatePropagationStopped
        // const monthyear = this.element.closest('#monthyear');
        // let swal = new Promise((resolve, reject) => {
        // let swal = function () {
        Swal.fire({
            title: 'Weet je zeker?',
            text: "Deze handeling kan niet terug gedraait worden",
            type: 'error',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',
            preConfirm: () => {
                return [
                    axios.delete(this.data.get("destroy")
                    ).then(() => {
                    }).catch(error => console.log(error))
                ];
            }
        }).then(result => {
            if (result.value) {

                // axios.delete(this.data.get("destroy")
                // ).then(() => {
                // }).catch(error => console.log(error));
                Swal.fire({
                    title: 'Deleted!',
                    text: 'Your file has been deleted.',
                    type: 'success',
                    showConfirmButton: false,
                    timer: 1000
                });
            }
        });
        // };
        // });
        // console.log(swal);
    }

    cancel(event) {
        event.preventDefault();
        this.body = null;
    }

    removeMonthYear() {
        // console.log(this.get
        // let monthyearController = this.getControllerByIdentifier("monthyear");
        // return monthyearController.remove();
    }

    get body() {
        return this.bodyTarget.value;
    }

    set body(text) {
        return this.bodyTarget.value = text;
    }

    get content() {
        return this.contentTarget.innerHTML;
    }

    set content(text) {
        return this.contentTarget.value = text;
    }

    get note() {
        return this.noteTarget;
    }


    set note(text) {
        return this.noteTarget.outerHTML = text;
    }

    get notes() {
        return this.noteTargets;
    }
}

