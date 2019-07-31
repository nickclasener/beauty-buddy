<div class="p-4 customer"
     data-controller="intake"
     data-intake-store="{{ route('intake.store', $customer, false) }}"
     data-target="intake.intake"
>
	<h2 class="font-hairline pb-2">Intake:</h2>
	<form action="{{ route('intake.store', $customer, false) }}"
	      data-action="intake#create"
	      method="POST"
	>@method('POST')@csrf
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
						>{{ old('behandeling') }}</textarea>
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
						>{{ old('huidverbetering') }}</textarea>
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
						>{{ old('allergieen') }}</textarea>
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
						>{{ old('bijzonderheden') }}</textarea>
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
						>{{ old('bloeddruk') }}</textarea>
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
						>{{ old('chemisch') }}</textarea>
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
						>{{ old('cosmetisch') }}</textarea>
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
						>{{ old('diabetes') }}</textarea>
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
						>{{ old('eczeem') }}</textarea>
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
						>{{ old('huidkanker') }}</textarea>
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
						>{{ old('huidschimmel') }}</textarea>
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
						>{{ old('ipl') }}</textarea>
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
						>{{ old('laser') }}</textarea>
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
						>{{ old('medicatie') }}</textarea>
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
						>{{ old('operaties') }}</textarea>
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
						>{{ old('zon') }}</textarea>
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
						>{{ old('kanker') }}</textarea>
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
							{{ old('bestraling') ? 'checked' : '' }}>
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
							{{ old('chemo') ? 'checked' : '' }}>
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
							{{ old('immunotherapie') ? 'checked' : '' }}>
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
					       {{ old('koortslip') ? 'checked' : '' }} }
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
							{{ old('roken') ? 'checked' : '' }}>
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
							{{ old('overgang') ? 'checked' : '' }}>
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
							{{ old('psoriasis') ? 'checked' : '' }}>
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
							{{ old('vitrigilo') ? 'checked' : '' }}>
					<span class="slider"></span>
				</label>
				<label for="vitrigilo"
				       class="font-hairline ml-1"
				>vitrigilo
				</label>
			</div>
			<div class="flex items-center sm:w-1/3 sm:w-1/2 w-full">
				<label class="switch flex items-center">
					<input type="checkbox"
					       name="zwanger"
					       data-target="intake.zwanger"
							{{ old('zwanger') ? 'checked' : '' }}>
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
