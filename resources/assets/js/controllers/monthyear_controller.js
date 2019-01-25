import { Controller } from "stimulus";

export default class extends Controller
{
	static targets = [ "monthyear" ];

	update() {
		this.element.children.length <= 2 && this.element.remove();
	}
}