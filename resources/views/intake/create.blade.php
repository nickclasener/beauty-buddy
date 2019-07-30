@extends('klanten.show')
@section('content')
	<div class="p-4 customer">
		<h2 class="font-hairline pb-2">Inake:</h2>
		<form action="{{ route('intake.store', $customer, false) }}"
		      method="post"
		      data-controller="textarea"
		>@method('POST')@csrf
			<div class="flex flex-wrap group relative w-full shadow border border-gray-200 shadow-inner outline-none py-4">
				<div class="w-full px-4">
					<div class="group relative w-full border border-transparent focus-within:border-gray-200 focus-within:shadow-inner focus-within:outline-none focus-within:outline-none">
						<h3 class="font-hairline ml-2">
							behandeling:
						</h3>
						<div class="w-full p-2 pt-4 overflow-hidden outline-none resize-none bg-transparent">
							<textarea type="text"
							          rows="1"
							          class="w-full overflow-hidden outline-none resize-none bg-transparent"
							          data-target="dailyadvice.morning textarea.textarea"
							          data-action="click->textarea#grow24 input->textarea#grow24 input->dailyadvice#errors"
							          name="behandeling"
							          placeholder="behandeling"
							>{{ old('behandeling') }}</textarea>
						</div>
					</div>
					<hr class="border-b border-dashed my-4">
				</div>
				<div class="w-full px-4">
					<h3 class="font-hairline ml-2">
						huidverbetering:
					</h3>
					<div class="group relative w-full border border-transparent focus-within:border-gray-200 focus-within:shadow-inner focus-within:outline-none focus-within:outline-none">
						<div class="w-full p-2 pt-4 overflow-hidden outline-none resize-none bg-transparent">
							<textarea type="text"
							          rows="1"
							          class="w-full overflow-hidden outline-none resize-none bg-transparent"
							          data-target="dailyadvice.morning textarea.textarea"
							          data-action="click->textarea#grow24 input->textarea#grow24 input->dailyadvice#errors"
							          name="huidverbetering"
							          placeholder="huidverbetering"
							> {{ old('huidverbetering') }} </textarea>
						</div>
					</div>
					<hr class="border-b border-dashed my-4">
				</div>
				<div class="w-full px-4">
					<h3 class="font-hairline ml-2">
						allergieen:
					</h3>
					<div class="group relative w-full border border-transparent focus-within:border-gray-200 focus-within:shadow-inner focus-within:outline-none focus-within:outline-none">
						<div class="w-full p-2 pt-4 overflow-hidden outline-none resize-none bg-transparent">
							<textarea type="text"
							          rows="1"
							          class="w-full overflow-hidden outline-none resize-none bg-transparent"
							          data-target="dailyadvice.morning textarea.textarea"
							          data-action="click->textarea#grow24 input->textarea#grow24 input->dailyadvice#errors"
							          name="allergieen"
							          placeholder="allergieen"
							> {{ old('allergieen') }}
							</textarea>
						</div>
					</div>
					<hr class="border-b border-dashed my-4">
				</div>

				<div class="w-full px-4">
					<h3 class="font-hairline ml-2">
						bijzonderheden:
					</h3>
					<div class="group relative w-full border border-transparent focus-within:border-gray-200 focus-within:shadow-inner focus-within:outline-none focus-within:outline-none">
						<div class="w-full p-2 pt-4 overflow-hidden outline-none resize-none bg-transparent">
							<textarea type="text"
							          rows="1"
							          class="w-full overflow-hidden outline-none resize-none bg-transparent"
							          data-target="dailyadvice.morning textarea.textarea"
							          data-action="click->textarea#grow24 input->textarea#grow24 input->dailyadvice#errors"
							          name="bijzonderheden"
							          placeholder="bijzonderheden"
							> {{ old('bijzonderheden') }}
							</textarea>
						</div>
					</div>
					<hr class="border-b border-dashed my-4">
				</div>

				<div class="w-full px-4">
					<h3 class="font-hairline ml-2">
						bloeddruk:
					</h3>
					<div class="group relative w-full border border-transparent focus-within:border-gray-200 focus-within:shadow-inner focus-within:outline-none focus-within:outline-none">
						<div class="w-full p-2 pt-4 overflow-hidden outline-none resize-none bg-transparent">
							<textarea type="text"
							          rows="1"
							          class="w-full overflow-hidden outline-none resize-none bg-transparent"
							          data-target="dailyadvice.morning textarea.textarea"
							          data-action="click->textarea#grow24 input->textarea#grow24 input->dailyadvice#errors"
							          name="bloeddruk"
							          placeholder="bloeddruk"
							>
								{{ old('bloeddruk') }}
							</textarea>
						</div>
					</div>
					<hr class="border-b border-dashed my-4">
				</div>

				<div class="w-full px-4">
					<h3 class="font-hairline ml-2">
						chemisch:
					</h3>
					<div class="group relative w-full border border-transparent focus-within:border-gray-200 focus-within:shadow-inner focus-within:outline-none focus-within:outline-none">
						<div class="w-full p-2 pt-4 overflow-hidden outline-none resize-none bg-transparent">
							<textarea type="text"
							          rows="1"
							          class="w-full overflow-hidden outline-none resize-none bg-transparent"
							          data-target="dailyadvice.morning textarea.textarea"
							          data-action="click->textarea#grow24 input->textarea#grow24 input->dailyadvice#errors"
							          name="chemisch"
							          placeholder="chemisch"
							> {{ old('chemisch') }}
							</textarea>
						</div>
					</div>
					<hr class="border-b border-dashed my-4">
				</div>

				<div class="w-full px-4">
					<h3 class="font-hairline ml-2">
						cosmetisch:
					</h3>
					<div class="group relative w-full border border-transparent focus-within:border-gray-200 focus-within:shadow-inner focus-within:outline-none focus-within:outline-none">
						<div class="w-full p-2 pt-4 overflow-hidden outline-none resize-none bg-transparent">
							<textarea type="text"
							          rows="1"
							          class="w-full overflow-hidden outline-none resize-none bg-transparent"
							          data-target="dailyadvice.morning textarea.textarea"
							          data-action="click->textarea#grow24 input->textarea#grow24 input->dailyadvice#errors"
							          name="cosmetisch"
							          placeholder="cosmetisch"
							> {{ old('cosmetisch') }}
							</textarea>
						</div>
					</div>
					<hr class="border-b border-dashed my-4">
				</div>
				<div class="w-full px-4">
					<h3 class="font-hairline ml-2">
						diabetes:
					</h3>
					<div class="group relative w-full border border-transparent focus-within:border-gray-200 focus-within:shadow-inner focus-within:outline-none focus-within:outline-none">
						<div class="w-full p-2 pt-4 overflow-hidden outline-none resize-none bg-transparent">
							<textarea type="text"
							          rows="1"
							          class="w-full overflow-hidden outline-none resize-none bg-transparent"
							          data-target="dailyadvice.morning textarea.textarea"
							          data-action="click->textarea#grow24 input->textarea#grow24 input->dailyadvice#errors"
							          name="diabetes"
							          placeholder="diabetes"
							> {{ old('diabetes') }}
							</textarea>
						</div>
					</div>
					<hr class="border-b border-dashed my-4">
				</div>
				<div class="w-full px-4">
					<h3 class="font-hairline ml-2">
						eczeem:
					</h3>
					<div class="group relative w-full border border-transparent focus-within:border-gray-200 focus-within:shadow-inner focus-within:outline-none focus-within:outline-none">
						<div class="w-full p-2 pt-4 overflow-hidden outline-none resize-none bg-transparent">
							<textarea type="text"
							          rows="1"
							          class="w-full overflow-hidden outline-none resize-none bg-transparent"
							          data-target="dailyadvice.morning textarea.textarea"
							          data-action="click->textarea#grow24 input->textarea#grow24 input->dailyadvice#errors"
							          name="eczeem"
							          placeholder="eczeem"
							> {{ old('eczeem') }}
							</textarea>
						</div>
					</div>
					<hr class="border-b border-dashed my-4">
				</div>
				<div class="w-full px-4">
					<h3 class="font-hairline ml-2">
						huidkanker:
					</h3>
					<div class="group relative w-full border border-transparent focus-within:border-gray-200 focus-within:shadow-inner focus-within:outline-none focus-within:outline-none">
						<div class="w-full p-2 pt-4 overflow-hidden outline-none resize-none bg-transparent">
							<textarea type="text"
							          rows="1"
							          class="w-full overflow-hidden outline-none resize-none bg-transparent"
							          data-target="dailyadvice.morning textarea.textarea"
							          data-action="click->textarea#grow24 input->textarea#grow24 input->dailyadvice#errors"
							          name="huidkanker"
							          placeholder="huidkanker"
							> {{ old('huidkanker') }}
							</textarea>
						</div>
					</div>
					<hr class="border-b border-dashed my-4">
				</div>

				<div class="w-full px-4">
					<h3 class="font-hairline ml-2">
						huidschimmel:
					</h3>
					<div class="group relative w-full border border-transparent focus-within:border-gray-200 focus-within:shadow-inner focus-within:outline-none focus-within:outline-none">
						<div class="w-full p-2 pt-4 overflow-hidden outline-none resize-none bg-transparent">
							<textarea type="text"
							          rows="1"
							          class="w-full overflow-hidden outline-none resize-none bg-transparent"
							          data-target="dailyadvice.morning textarea.textarea"
							          data-action="click->textarea#grow24 input->textarea#grow24 input->dailyadvice#errors"
							          name="huidschimmel"
							          placeholder="huidschimmel"
							> {{ old('huidschimmel') }}
							</textarea>
						</div>
					</div>
					<hr class="border-b border-dashed my-4">
				</div>
				<div class="w-full px-4">
					<h3 class="font-hairline ml-2">
						ipl:
					</h3>
					<div class="group relative w-full border border-transparent focus-within:border-gray-200 focus-within:shadow-inner focus-within:outline-none focus-within:outline-none">
						<div class="w-full p-2 pt-4 overflow-hidden outline-none resize-none bg-transparent">
							<textarea type="text"
							          rows="1"
							          class="w-full overflow-hidden outline-none resize-none bg-transparent"
							          data-target="dailyadvice.morning textarea.textarea"
							          data-action="click->textarea#grow24 input->textarea#grow24 input->dailyadvice#errors"
							          name="ipl"
							          placeholder="ipl"
							> {{ old('ipl') }}
							</textarea>
						</div>
					</div>
					<hr class="border-b border-dashed my-4">
				</div>


				<div class="w-full px-4">
					<h3 class="font-hairline ml-2">
						laser:
					</h3>
					<div class="group relative w-full border border-transparent focus-within:border-gray-200 focus-within:shadow-inner focus-within:outline-none focus-within:outline-none">
						<div class="w-full p-2 pt-4 overflow-hidden outline-none resize-none bg-transparent">
							<textarea type="text"
							          rows="1"
							          class="w-full overflow-hidden outline-none resize-none bg-transparent"
							          data-target="dailyadvice.morning textarea.textarea"
							          data-action="click->textarea#grow24 input->textarea#grow24 input->dailyadvice#errors"
							          name="laser"
							          placeholder="laser"
							> {{ old('laser') }}
							</textarea>
						</div>
					</div>
					<hr class="border-b border-dashed my-4">
				</div>
				<div class="w-full px-4">
					<h3 class="font-hairline ml-2">
						medicatie:
					</h3>
					<div class="group relative w-full border border-transparent focus-within:border-gray-200 focus-within:shadow-inner focus-within:outline-none focus-within:outline-none">
						<div class="w-full p-2 pt-4 overflow-hidden outline-none resize-none bg-transparent">
							<textarea type="text"
							          rows="1"
							          class="w-full overflow-hidden outline-none resize-none bg-transparent"
							          data-target="dailyadvice.morning textarea.textarea"
							          data-action="click->textarea#grow24 input->textarea#grow24 input->dailyadvice#errors"
							          name="medicatie"
							          placeholder="medicatie"
							>
								{{ old('medicatie') }}
							</textarea>
						</div>
					</div>
					<hr class="border-b border-dashed my-4">
				</div>
				<div class="lg:w-1/2 w-full p-4">
					<h3 class="font-hairline ml-2">
						operaties:
					</h3>
					<div class="group relative w-full focus-within:border-gray-200 focus-within:shadow-inner focus-within:outline-none">
						<div class="w-full p-2 pt-4 overflow-hidden outline-none resize-none bg-transparent">
							<textarea type="text"
							          rows="1"
							          class="w-full overflow-hidden outline-none resize-none bg-transparent"
							          data-target="dailyadvice.morning textarea.textarea"
							          data-action="click->textarea#grow24 input->textarea#grow24 input->dailyadvice#errors"
							          name="operaties"
							          placeholder="operaties"
							> {{ old('operaties') }}
							</textarea>
						</div>
					</div>
					<hr class="border-b border-dashed my-4">
				</div>
				<div class="w-full px-4">
					<h3 class="font-hairline ml-2">
						zon:
					</h3>
					<div class="group relative w-full border border-transparent focus-within:border-gray-200 focus-within:shadow-inner focus-within:outline-none focus-within:outline-none">
						<div class="w-full p-2 pt-4 overflow-hidden outline-none resize-none bg-transparent">
							<textarea type="text"
							          rows="1"
							          class="w-full overflow-hidden outline-none resize-none bg-transparent"
							          data-target="dailyadvice.morning textarea.textarea"
							          data-action="click->textarea#grow24 input->textarea#grow24 input->dailyadvice#errors"
							          name="zon"
							          placeholder="zon"
							>{{ old('zon') }}
							</textarea>
						</div>
					</div>
					<hr class="border-b border-dashed my-4">
				</div>
				<div class="w-full px-4">
					<h3 class="font-hairline ml-2">
						kanker:
					</h3>
					<div class="group relative w-full border border-transparent focus-within:border-gray-200 focus-within:shadow-inner focus-within:outline-none focus-within:outline-none">
						<div class="w-full p-2 pt-4 overflow-hidden outline-none resize-none bg-transparent">
							<textarea type="text"
							          rows="1"
							          class="w-full overflow-hidden outline-none resize-none bg-transparent"
							          data-target="dailyadvice.morning textarea.textarea"
							          data-action="click->textarea#grow24 input->textarea#grow24 input->dailyadvice#errors"
							          name="kanker"
							          placeholder="kanker"
							>{{ old('kanker') }}
							</textarea>
						</div>
					</div>
				</div>
			</div>
			<br>
			<input type="checkbox"
			       name="bestraling" {{ old('bestraling') ? 'checked' : '' }} /> Bestraling
			<br>
			<input type="checkbox"
			       name="chemo" {{ old('chemo') ? 'checked' : '' }} /> Chemo
			<br>
			<input type="checkbox"
			       name="immunotherapie" {{ old('immunotherapie') ? 'checked' : '' }} /> Imunnotherapie
			<hr>
			<input type="checkbox"
			       name="koortslip" {{ old('koortslip') ? 'checked' : '' }} /> Koortslip
			<br>
			<input type="checkbox"
			       name="roken" {{ old('roken') ? 'checked' : '' }} /> Roken
			<br>
			<input type="checkbox"
			       name="overgang" {{ old('overgang') ? 'checked' : '' }} /> Overgang
			<br>
			<input type="checkbox"
			       name="psoriasis" {{ old('psoriasis') ? 'checked' : '' }} /> Psoriasis
			<br>
			<input type="checkbox"
			       name="vitrigilo" {{ old('vitrigilo') ? 'checked' : '' }} /> Vitrigilo
			<br>
			<input type="checkbox"
			       name="zwanger" {{ old('zwanger') ? 'checked' : '' }} /> Zwanger
			<hr>
			<button type="submit"
			>Opslaan
			</button>
		</form>
	</div>
@endsection
