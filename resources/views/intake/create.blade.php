@extends('layouts.app')

@section('content')
	<form action="{{ route('intake.store', $customer, false) }}"
				method="post"
	>@csrf

		<label for="naam"
		>Naam:</label>
		<br>
		<input type="text"
					 name="naam"
					 placeholder="Naam"
					 value="{{ old('naam') }}"
					 required
		>
		<hr>

		<label for="behandeling"
		>Behandeling:</label>
		<br>
		<input type="text"
					 name="behandeling"
					 placeholder="behandeling"
					 value="{{ old('behandeling') }}"
		>
		<hr>

		<label for="huidverbetering"
		>Huidverbetering:</label>
		<br>
		<input type="text"
					 name="huidverbetering"
					 placeholder="huidverbetering"
					 value="{{ old('huidverbetering') }}"
		>
		<hr>

		<label for="allergieen"
		>Allergieen:</label>
		<br>
		<input type="text"
					 name="allergieen"
					 placeholder="allergieen"
					 value="{{ old('allergieen') }}"
		>
		<hr>

		<label for="bijzonderheden"
		>Bijzonderheden:</label>
		<br>
		<input type="text"
					 name="bijzonderheden"
					 placeholder="bijzonderheden"
					 value="{{ old('bijzonderheden') }}"
		>
		<hr>

		<label for="bloeddruk"
		>Bloeddruk:</label>
		<br>
		<input type="text"
					 name="bloeddruk"
					 placeholder="bloeddruk"
					 value="{{ old('bloeddruk') }}"
		>
		<hr>

		<label for="chemisch"
		>Chemisch:</label>
		<br>
		<input type="text"
					 name="chemisch"
					 placeholder="chemisch"
					 value="{{ old('chemisch') }}"
		>
		<hr>

		<label for="cosmetisch"
		>Cosmetisch:</label>
		<br>
		<input type="text"
					 name="cosmetisch"
					 placeholder="cosmetisch"
					 value="{{ old('cosmetisch') }}"
		>
		<hr>

		<label for="diabetes"
		>Diabetes:</label>
		<br>
		<input type="text"
					 name="diabetes"
					 placeholder="diabetes"
					 value="{{ old('diabetes') }}"
		>
		<hr>

		<label for="eczeem"
		>Eczeem:</label>
		<br>
		<input type="text"
					 name="eczeem"
					 placeholder="eczeem"
					 value="{{ old('eczeem') }}"
		>
		<hr>

		<label for="huidkanker"
		>Huidkanker:</label>
		<br>
		<input type="text"
					 name="huidkanker"
					 placeholder="huidkanker"
					 value="{{ old('huidkanker') }}"
		>
		<hr>

		<label for="huidschimmel"
		>Huidschimmel:</label>
		<br>
		<input type="text"
					 name="huidschimmel"
					 placeholder="huidschimmel"
					 value="{{ old('huidschimmel') }}"
		>
		<hr>

		<label for="ipl"
		>Ipl:</label>
		<br>
		<input type="text"
					 name="ipl"
					 placeholder="ipl"
					 value="{{ old('ipl') }}"
		>
		<hr>

		<label for="kanker"
		>Kanker:</label>
		<br>
		<input type="text"
					 name="kanker"
					 placeholder="kanker"
					 value="{{ old('kanker') }}"
		>
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

		<label for="laser"
		>Laser:</label>
		<br>
		<input type="text"
					 name="laser"
					 placeholder="laser"
					 value="{{ old('laser') }}"
		>
		<hr>

		<label for="medicatie"
		>Medicatie:</label>
		<br>
		<input type="text"
					 name="medicatie"
					 placeholder="medicatie"
					 value="{{ old('medicatie') }}"
		>
		<hr>

		<label for="operaties"
		>Operaties:</label>
		<br>
		<input type="text"
					 name="operaties"
					 placeholder="operaties"
					 value="{{ old('operaties') }}"
		>
		<hr>

		<label for="zon"
		>Zon:</label>
		<br>
		<input type="text"
					 name="zon"
					 placeholder="zon"
					 value="{{ old('zon') }}"
		>
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
@endsection
