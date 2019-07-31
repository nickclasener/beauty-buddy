@extends('klanten.show')
@section('content')
	<div class="p-4 customer"
	     data-controller="intake"
	     data-intake-update="{{ route('intake.update', $customer, false) }}"
	     data-target="intake.intake"
	>
		<h2 class="font-hairline pb-2">Intake:</h2>
		<form action="{{ route('intake.update', $customer, false) }}"
		      data-action="intake#update"
		      method="POST"
		>@method('patch')@csrf
			<button type="submit">Opslaan
			</button>
			<div class="flex flex-wrap group relative w-full shadow border border-gray-200 shadow-inner outline-none">
				<div class="w-full ">
					<div class="group cursor-pointer relative w-full border border-transparent focus-within:border-gray-200 focus-within:shadow-inner focus-within:outline-none focus-within:outline-none"
					     data-controller="textarea"
					     data-action="click->textarea#focus"
					>
						<div class=" p-4 w-full overflow-hidden outline-none resize-none bg-transparent pb-4 border-b border-dashed">
							<h3 class="font-hairline">
								behandeling:
							</h3>
							<textarea type="text"
							          rows="1"
							          class="w-full cursor-text overflow-hidden outline-none resize-none bg-transparent"
							          data-target="intake.behandeling textarea.textarea"
							          data-action="click->textarea#grow24 input->textarea#grow24 input->intake#errors"
							          name="behandeling"
							          placeholder="behandeling"
							>{{ old('behandeling') ?: $intake->behandeling }}</textarea>
						</div>
					</div>
				</div>
				<div class="group cursor-pointer relative w-full border border-transparent focus-within:border-gray-200 focus-within:shadow-inner focus-within:outline-none focus-within:outline-none"
				     data-controller="textarea"
				     data-action="click->textarea#focus"
				>
					<div class=" p-4 w-full overflow-hidden outline-none resize-none bg-transparent pb-4 border-b border-dashed">
						<h3 class="font-hairline">
							huidverbetering:
						</h3>
						<div class="w-full pt-4 overflow-hidden outline-none resize-none bg-transparent">
							<textarea type="text"
							          rows="1"
							          class="w-full cursor-text overflow-hidden outline-none resize-none bg-transparent"
							          data-target="intake.huidverbetering textarea.textarea"
							          data-action="click->textarea#grow24 input->textarea#grow24 input->intake#errors"
							          name="huidverbetering"
							          placeholder="huidverbetering"
							>{{ old('huidverbetering') ?: $intake->huidverbetering }}</textarea>
						</div>
					</div>
				</div>
				<div class="group cursor-pointer relative w-full border border-transparent focus-within:border-gray-200 focus-within:shadow-inner focus-within:outline-none focus-within:outline-none"
				     data-controller="textarea"
				     data-action="click->textarea#focus"
				>
					<div class=" p-4 w-full overflow-hidden outline-none resize-none bg-transparent pb-4 border-b border-dashed">
						<h3 class="font-hairline">
							allergieen:
						</h3>
						<div class="w-full pt-4 overflow-hidden outline-none resize-none bg-transparent">
							<textarea type="text"
							          rows="1"
							          class="w-full cursor-text overflow-hidden outline-none resize-none bg-transparent"
							          data-target="intake.allergieen textarea.textarea"
							          data-action="click->textarea#grow24 input->textarea#grow24 input->intake#errors"
							          name="allergieen"
							          placeholder="allergieen"
							>{{ old('allergieen') ?: $intake->allergieen }}</textarea>
						</div>
					</div>
				</div>
				<div class="group cursor-pointer relative w-full border border-transparent focus-within:border-gray-200 focus-within:shadow-inner focus-within:outline-none focus-within:outline-none"
				     data-controller="textarea"
				     data-action="click->textarea#focus"
				>
					<div class=" p-4 w-full overflow-hidden outline-none resize-none bg-transparent pb-4 border-b border-dashed">
						<h3 class="font-hairline">
							bijzonderheden:
						</h3>
						<div class="w-full pt-4 overflow-hidden outline-none resize-none bg-transparent">
							<textarea type="text"
							          rows="1"
							          class="w-full cursor-text overflow-hidden outline-none resize-none bg-transparent"
							          data-target="intake.bijzonderheden textarea.textarea"
							          data-action="click->textarea#grow24 input->textarea#grow24 input->intake#errors"
							          name="bijzonderheden"
							          placeholder="bijzonderheden"
							>{{ old('bijzonderheden') ?: $intake->bijzonderheden }}</textarea>
						</div>
					</div>
				</div>
				<div class="group cursor-pointer relative w-full border border-transparent focus-within:border-gray-200 focus-within:shadow-inner focus-within:outline-none focus-within:outline-none"
				     data-controller="textarea"
				     data-action="click->textarea#focus"
				>
					<div class=" p-4 w-full overflow-hidden outline-none resize-none bg-transparent pb-4 border-b border-dashed">
						<h3 class="font-hairline">
							bloeddruk:
						</h3>
						<div class="w-full pt-4 overflow-hidden outline-none resize-none bg-transparent">
							<textarea type="text"
							          rows="1"
							          class="w-full cursor-text overflow-hidden outline-none resize-none bg-transparent"
							          data-target="intake.bloeddruk textarea.textarea"
							          data-action="click->textarea#grow24 input->textarea#grow24 input->intake#errors"
							          name="bloeddruk"
							          placeholder="bloeddruk"
							>{{ old('bloeddruk') ?: $intake->bloeddruk }}</textarea>
						</div>
					</div>
				</div>

				<div class="group cursor-pointer relative w-full border border-transparent focus-within:border-gray-200 focus-within:shadow-inner focus-within:outline-none focus-within:outline-none"
				     data-controller="textarea"
				     data-action="click->textarea#focus"
				>
					<div class=" p-4 w-full overflow-hidden outline-none resize-none bg-transparent pb-4 border-b border-dashed">
						<h3 class="font-hairline">
							chemisch:
						</h3>
						<div class="w-full pt-4 overflow-hidden outline-none resize-none bg-transparent">
							<textarea type="text"
							          rows="1"
							          class="w-full cursor-text overflow-hidden outline-none resize-none bg-transparent"
							          data-target="intake.chemisch textarea.textarea"
							          data-action="click->textarea#grow24 input->textarea#grow24 input->intake#errors"
							          name="chemisch"
							          placeholder="chemisch"
							>{{ old('chemisch') ?: $intake->chemisch }}</textarea>
						</div>
					</div>
				</div>

				<div class="group cursor-pointer relative w-full border border-transparent focus-within:border-gray-200 focus-within:shadow-inner focus-within:outline-none focus-within:outline-none"
				     data-controller="textarea"
				     data-action="click->textarea#focus"
				>
					<div class=" p-4 w-full overflow-hidden outline-none resize-none bg-transparent pb-4 border-b border-dashed">
						<h3 class="font-hairline">
							cosmetisch:
						</h3>
						<div class="w-full pt-4 overflow-hidden outline-none resize-none bg-transparent">
							<textarea type="text"
							          rows="1"
							          class="w-full cursor-text overflow-hidden outline-none resize-none bg-transparent"
							          data-target="intake.cosmetisch textarea.textarea"
							          data-action="click->textarea#grow24 input->textarea#grow24 input->intake#errors"
							          name="cosmetisch"
							          placeholder="cosmetisch"
							>{{ old('cosmetisch') ?: $intake->cosmetisch }}</textarea>
						</div>
					</div>
				</div>
				<div class="group cursor-pointer relative w-full border border-transparent focus-within:border-gray-200 focus-within:shadow-inner focus-within:outline-none focus-within:outline-none"
				     data-controller="textarea"
				     data-action="click->textarea#focus"
				>
					<div class=" p-4 w-full overflow-hidden outline-none resize-none bg-transparent pb-4 border-b border-dashed">
						<h3 class="font-hairline">
							diabetes:
						</h3>
						<div class="w-full pt-4 overflow-hidden outline-none resize-none bg-transparent">
							<textarea type="text"
							          rows="1"
							          class="w-full cursor-text overflow-hidden outline-none resize-none bg-transparent"
							          data-target="intake.diabetes textarea.textarea"
							          data-action="click->textarea#grow24 input->textarea#grow24 input->intake#errors"
							          name="diabetes"
							          placeholder="diabetes"
							>{{ old('diabetes') ?: $intake->diabetes }}</textarea>
						</div>
					</div>
				</div>
				<div class="group cursor-pointer relative w-full border border-transparent focus-within:border-gray-200 focus-within:shadow-inner focus-within:outline-none focus-within:outline-none"
				     data-controller="textarea"
				     data-action="click->textarea#focus"
				>
					<div class=" p-4 w-full overflow-hidden outline-none resize-none bg-transparent pb-4 border-b border-dashed">
						<h3 class="font-hairline">
							eczeem:
						</h3>
						<div class="w-full pt-4 overflow-hidden outline-none resize-none bg-transparent">
							<textarea type="text"
							          rows="1"
							          class="w-full cursor-text overflow-hidden outline-none resize-none bg-transparent"
							          data-target="intake.eczeem textarea.textarea"
							          data-action="click->textarea#grow24 input->textarea#grow24 input->intake#errors"
							          name="eczeem"
							          placeholder="eczeem"
							>{{ old('eczeem') ?: $intake->eczeem }}</textarea>
						</div>
					</div>
				</div>
				<div class="group cursor-pointer relative w-full border border-transparent focus-within:border-gray-200 focus-within:shadow-inner focus-within:outline-none focus-within:outline-none"
				     data-controller="textarea"
				     data-action="click->textarea#focus"
				>
					<div class=" p-4 w-full overflow-hidden outline-none resize-none bg-transparent pb-4 border-b border-dashed">
						<h3 class="font-hairline">
							huidkanker:
						</h3>
						<div class="w-full pt-4 overflow-hidden outline-none resize-none bg-transparent">
							<textarea type="text"
							          rows="1"
							          class="w-full cursor-text overflow-hidden outline-none resize-none bg-transparent"
							          data-target="intake.huidkanker textarea.textarea"
							          data-action="click->textarea#grow24 input->textarea#grow24 input->intake#errors"
							          name="huidkanker"
							          placeholder="huidkanker"
							>{{ old('huidkanker') ?: $intake->huidkanker }}</textarea>
						</div>
					</div>
				</div>

				<div class="group cursor-pointer relative w-full border border-transparent focus-within:border-gray-200 focus-within:shadow-inner focus-within:outline-none focus-within:outline-none"
				     data-controller="textarea"
				     data-action="click->textarea#focus"
				>
					<div class=" p-4 w-full overflow-hidden outline-none resize-none bg-transparent pb-4 border-b border-dashed">
						<h3 class="font-hairline">
							huidschimmel:
						</h3>
						<div class="w-full pt-4 overflow-hidden outline-none resize-none bg-transparent">
							<textarea type="text"
							          rows="1"
							          class="w-full cursor-text overflow-hidden outline-none resize-none bg-transparent"
							          data-target="intake.huidschimmel textarea.textarea"
							          data-action="click->textarea#grow24 input->textarea#grow24 input->intake#errors"
							          name="huidschimmel"
							          placeholder="huidschimmel"
							>{{ old('huidschimmel') ?: $intake->huidschimmel }}</textarea>
						</div>
					</div>
				</div>
				<div class="group cursor-pointer relative w-full border border-transparent focus-within:border-gray-200 focus-within:shadow-inner focus-within:outline-none focus-within:outline-none"
				     data-controller="textarea"
				     data-action="click->textarea#focus"
				>
					<div class=" p-4 w-full overflow-hidden outline-none resize-none bg-transparent pb-4 border-b border-dashed">
						<h3 class="font-hairline">
							ipl:
						</h3>
						<div class="w-full pt-4 overflow-hidden outline-none resize-none bg-transparent">
							<textarea type="text"
							          rows="1"
							          class="w-full cursor-text overflow-hidden outline-none resize-none bg-transparent"
							          data-target="intake.ipl textarea.textarea"
							          data-action="click->textarea#grow24 input->textarea#grow24 input->intake#errors"
							          name="ipl"
							          placeholder="ipl"
							>{{ old('ipl') ?: $intake->ipl }}</textarea>
						</div>
					</div>
				</div>

				<div class="group cursor-pointer relative w-full border border-transparent focus-within:border-gray-200 focus-within:shadow-inner focus-within:outline-none focus-within:outline-none"
				     data-controller="textarea"
				     data-action="click->textarea#focus"
				>
					<div class=" p-4 w-full overflow-hidden outline-none resize-none bg-transparent pb-4 border-b border-dashed">
						<h3 class="font-hairline">
							laser:
						</h3>
						<div class="w-full pt-4 overflow-hidden outline-none resize-none bg-transparent">
							<textarea type="text"
							          rows="1"
							          class="w-full cursor-text overflow-hidden outline-none resize-none bg-transparent"
							          data-target="intake.laser textarea.textarea"
							          data-action="click->textarea#grow24 input->textarea#grow24 input->intake#errors"
							          name="laser"
							          placeholder="laser"
							>{{ old('laser') ?: $intake->laser }}</textarea>
						</div>
					</div>
				</div>
				<div class="group cursor-pointer relative w-full border border-transparent focus-within:border-gray-200 focus-within:shadow-inner focus-within:outline-none focus-within:outline-none"
				     data-controller="textarea"
				     data-action="click->textarea#focus"
				>
					<div class=" p-4 w-full overflow-hidden outline-none resize-none bg-transparent pb-4 border-b border-dashed">
						<h3 class="font-hairline">
							medicatie:
						</h3>
						<div class="w-full pt-4 overflow-hidden outline-none resize-none bg-transparent">
							<textarea type="text"
							          rows="1"
							          class="w-full cursor-text overflow-hidden outline-none resize-none bg-transparent"
							          data-target="intake.medicatie textarea.textarea"
							          data-action="click->textarea#grow24 input->textarea#grow24 input->intake#errors"
							          name="medicatie"
							          placeholder="medicatie"
							>{{ old('medicatie') ?: $intake->medicatie }}</textarea>
						</div>
					</div>
				</div>
				<div class="group cursor-pointer relative w-full border border-transparent focus-within:border-gray-200 focus-within:shadow-inner focus-within:outline-none focus-within:outline-none"
				     data-controller="textarea"
				     data-action="click->textarea#focus"
				>
					<div class=" p-4 w-full overflow-hidden outline-none resize-none bg-transparent pb-4 border-b border-dashed">
						<h3 class="font-hairline">
							operaties:
						</h3>
						<div class="w-full pt-4 overflow-hidden outline-none resize-none bg-transparent">
							<textarea type="text"
							          rows="1"
							          class="w-full cursor-text overflow-hidden outline-none resize-none bg-transparent"
							          data-target="intake.operaties textarea.textarea"
							          data-action="click->textarea#grow24 input->textarea#grow24 input->intake#errors"
							          name="operaties"
							          placeholder="operaties"
							>{{ old('operaties') ?: $intake->operaties }}</textarea>
						</div>
					</div>
				</div>
				<div class="group cursor-pointer relative w-full border border-transparent focus-within:border-gray-200 focus-within:shadow-inner focus-within:outline-none focus-within:outline-none"
				     data-controller="textarea"
				     data-action="click->textarea#focus"
				>
					<div class=" p-4 w-full overflow-hidden outline-none resize-none bg-transparent pb-4 border-b border-dashed">
						<h3 class="font-hairline">
							zon:
						</h3>
						<div class="w-full pt-4 overflow-hidden outline-none resize-none bg-transparent">
							<textarea type="text"
							          rows="1"
							          class="w-full cursor-text overflow-hidden outline-none resize-none bg-transparent"
							          data-target="intake.zon textarea.textarea"
							          data-action="click->textarea#grow24 input->textarea#grow24 input->intake#errors"
							          name="zon"
							          placeholder="zon"
							>{{ old('zon') ?: $intake->zon }}</textarea>
						</div>
					</div>
				</div>
				<div class="group cursor-pointer relative w-full border border-transparent focus-within:border-gray-200 focus-within:shadow-inner focus-within:outline-none focus-within:outline-none"
				     data-controller="textarea"
				     data-action="click->textarea#focus"
				>
					<div class=" p-4 w-full overflow-hidden outline-none resize-none bg-transparent pb-4">
						<h3 class="font-hairline">
							kanker:
						</h3>
						<div class="w-full pt-4 overflow-hidden outline-none resize-none bg-transparent">
							<textarea type="text"
							          rows="1"
							          class="w-full cursor-text overflow-hidden outline-none resize-none bg-transparent"
							          data-target="intake.kanker textarea.textarea"
							          data-action="click->textarea#grow24 input->textarea#grow24 input->intake#errors"
							          name="kanker"
							          placeholder="kanker"
							>{{ old('kanker') ?: $intake->kanker }}</textarea>
						</div>
					</div>
				</div>
			</div>
			<hr class="border-b border-dashed my-4">
			<div class="flex flex-wrap">
				<div class="flex items-center sm:w-1/3 sm:w-1/2 w-full">
					<label class="switch flex items-center">
						<input type="checkbox"
						       name="bestraling"
						       data-target="intake.bestraling"
								{{ checkbox(old('bestraling')?:$intake->bestraling)  }}>
						<span class="slider"></span>
					</label>
					<label for="bestraling"
					       class="font-hairline ml-1"
					>bestraling
					</label>
				</div>
				<div class="flex items-center sm:w-1/3 sm:w-1/2 w-full">
					<label class="switch flex items-center">
						<input type="checkbox"
						       name="chemo"
						       data-target="intake.chemo"
								{{ checkbox(old('chemo') ?: $intake->chemo) }}>
						<span class="slider"></span>
					</label>
					<label for="chemo"
					       class="font-hairline ml-1"
					>chemo
					</label>
				</div>
				<div class="flex items-center sm:w-1/3 sm:w-1/2 w-full">
					<label class="switch flex items-center">
						<input type="checkbox"
						       name="immunotherapie"
						       data-target="intake.immunotherapie"
								{{ checkbox(old('immunotherapie') ?: $intake->immunotherapie) }}>
						<span class="slider"></span>
					</label>
					<label for="immunotherapie"
					       class="font-hairline ml-1"
					>immunotherapie
					</label>
				</div>
				<div class="flex items-center sm:w-1/3 sm:w-1/2 w-full">
					<label class="switch flex items-center">
						<input type="checkbox"
						       name="koortslip"
						       data-target="intake.koortslip"
								{{ checkbox(old('koortslip') ?: $intake->koortslip) }}>
						>
						<span class="slider"></span>
					</label>
					<label for="koortslip"
					       class="font-hairline ml-1"
					>koortslip
					</label>
				</div>
				<div class="flex items-center sm:w-1/3 sm:w-1/2 w-full">
					<label class="switch flex items-center">
						<input type="checkbox"
						       name="roken"
						       data-target="intake.roken"
								{{ checkbox(old('roken') ?: $intake->roken) }}>
						<span class="slider"></span>
					</label>
					<label for="roken"
					       class="font-hairline ml-1"
					>roken
					</label>
				</div>
				<div class="flex items-center sm:w-1/3 sm:w-1/2 w-full">
					<label class="switch flex items-center">
						<input type="checkbox"
						       name="overgang"
						       data-target="intake.overgang"
								{{ checkbox(old('overgang') ?: $intake->overgang) }}>
						<span class="slider"></span>
					</label>
					<label for="overgang"
					       class="font-hairline ml-1"
					>overgang
					</label>
				</div>
				<div class="flex items-center sm:w-1/3 sm:w-1/2 w-full">
					<label class="switch flex items-center">
						<input type="checkbox"
						       name="psoriasis"
						       data-target="intake.psoriasis"
								{{ checkbox(old('psoriasis') ?: $intake->psoriasis) }}>
						<span class="slider"></span>
					</label>
					<label for="psoriasis"
					       class="font-hairline ml-1"
					>psoriasis
					</label>
				</div>
				<div class="flex items-center sm:w-1/3 sm:w-1/2 w-full">
					<label class="switch flex items-center">
						<input type="checkbox"
						       name="vitrigilo"
						       data-target="intake.vitrigilo"
								{{ checkbox(old('vitrigilo') ?: $intake->vitrigilo) }}>
						<span class="slider"></span>
					</label>
					<label for="vitrigilo"
					       class="font-hairline ml-1"
					>vitrigilo
						{{ checkbox(old('vitrigilo') ?: $intake->vitrigilo) }}
					</label>
				</div>
				<div class="flex items-center sm:w-1/3 sm:w-1/2 w-full">
					<label class="switch flex items-center">
						<input type="checkbox"
						       name="zwanger"
						       data-target="intake.zwanger"
								{{ checkbox(old('zwanger') ?: $intake->zwanger) }}>
						<span class="slider"></span>
					</label>
					<label for="zwanger"
					       class="font-hairline ml-1"
					>zwanger
					</label>
				</div>
			</div>
		</form>
	</div>
@stop
