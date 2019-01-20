import { Controller } from "stimulus";

export default class extends Controller
{
	static targets = [ "show", "hidden" ];

	toggle( event ) {
		this.showTarget.classList.toggle('hidden');
		this.hiddenTarget.classList.toggle('hidden');
		// event.stopPropagation();
	}

}