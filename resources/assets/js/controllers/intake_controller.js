import {Controller} from "stimulus";


export default class extends Controller {
    static targets = [
        'intake',
        'behandeling',
        'huidverbetering',
        'allergieen',
        'bijzonderheden',
        'bloeddruk',
        'chemisch',
        'cosmetisch',
        'diabetes',
        'eczeem',
        'huidkanker',
        'huidschimmel',
        'ipl',
        'kanker',
        'laser',
        'medicatie',
        'operaties',
        'zon',
        'bestraling',
        'chemo',
        'immunotherapie',
        'koortslip',
        'roken',
        'overgang',
        'psoriasis',
        'vitrigilo',
        'zwanger',
    ];


    delete(event) {
        event.preventDefault();
        axios.delete(this.data.get('destroy')).then(response => {
            Turbolinks.visit(response.data, {action: 'replace'});
        })
            .catch(error => console.log(error));
    }

    errors() {

    }

    create(event) {
        event.preventDefault();
        axios.post(this.data.get('store'), this.form)
            .then(response => {
                this.intake = response.data;
                Swal.fire({
                    type: 'success',
                    title: 'Intake is opgeslagen',
                    showConfirmButton: false,
                    timer: 2000
                });
            }).catch(error => console.log(error));
    }

    update(event) {
        event.preventDefault();
        // console.log(this.data.get('update'));
        axios.patch(this.data.get('update'), this.form)
            .then(response => {
                this.intake = response.data;
                Swal.fire({
                    type: 'success',
                    title: 'Intake is geupdate',
                    showConfirmButton: false,
                    timer: 2000
                });
            }).catch(error => console.log(error));
    }

    get form() {
        return {
            behandeling: this.behandelingTarget.value,
            huidverbetering: this.huidverbeteringTarget.value,
            allergieen: this.allergieenTarget.value,
            bijzonderheden: this.bijzonderhedenTarget.value,
            bloeddruk: this.bloeddrukTarget.value,
            chemisch: this.chemischTarget.value,
            cosmetisch: this.cosmetischTarget.value,
            diabetes: this.diabetesTarget.value,
            eczeem: this.eczeemTarget.value,
            huidkanker: this.huidkankerTarget.value,
            huidschimmel: this.huidschimmelTarget.value,
            ipl: this.iplTarget.value,
            laser: this.laserTarget.value,
            medicatie: this.medicatieTarget.value,
            operaties: this.operatiesTarget.value,
            zon: this.zonTarget.value,
            kanker: this.kankerTarget.value,
            bestraling: this.bestralingTarget.checked,
            chemo: this.chemoTarget.checked,
            immunotherapie: this.immunotherapieTarget.checked,
            koortslip: this.koortslipTarget.checked,
            roken: this.rokenTarget.checked,
            overgang: this.overgangTarget.checked,
            psoriasis: this.psoriasisTarget.checked,
            vitrigilo: this.vitrigiloTarget.checked,
            zwanger: this.zwangerTarget.checked,
        };
    }

    get intake() {
        return this.intakeTarget;
    }

    set intake(text) {
        return this.intakeTarget.outerHTML = text;
    }

    //
    // set form(text) {
    //     this.morningTarget.value = text;
    //     this.middayTarget.value = text;
    //     this.eveningTarget.value = text;
    // }
}
