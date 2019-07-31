import {Controller} from "stimulus";

export default class extends Controller {
    static targets = [
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

    get form() {
        return {
            morning: this.morningTarget.value,
            midday: this.middayTarget.value,
            evening: this.eveningTarget.value
        };
    }

    set form(text) {
        this.morningTarget.value = text;
        this.middayTarget.value = text;
        this.eveningTarget.value = text;
    }
}
