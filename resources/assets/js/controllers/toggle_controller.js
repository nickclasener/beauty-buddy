import { Controller } from "stimulus";

export default class extends Controller
{
	static targets = [ "show", "hidden" ];

	toggle() {
		this.showTarget.classList.toggle('hidden');
		this.hiddenTarget.classList.toggle('hidden');
	}
}