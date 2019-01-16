import { ApplicationController } from "../helpers/laravel_controller";

export default class extends ApplicationController
{
	submit( event ) {
		this.deleteList(event, route('notities.destroy', this.data.get("data")), '#monthYear', '#note');
	}
}