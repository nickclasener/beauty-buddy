<form action="{{ route('intake.destroy',[$customer,$customer->intake]) }}"
      method="POST"
>
	@method('DELETE')@csrf
	<button type="submit">Delete</button>
</form>

<p>{{ $customer->intake->behandeling }}</p>
<p>{{ $customer->intake->huidverbetering }}</p>
<p>{{ $customer->intake->allergieen }}</p>
<p>{{ $customer->intake->bijzonderheden }}</p>
<p>{{ $customer->intake->bloeddruk }}</p>
<p>{{ $customer->intake->chemisch }}</p>
<p>{{ $customer->intake->cosmetisch }}</p>
<p>{{ $customer->intake->diabetes }}</p>
<p>{{ $customer->intake->eczeem }}</p>
<p>{{ $customer->intake->huidkanker }}</p>
<p>{{ $customer->intake->huidschimmel }}</p>
<p>{{ $customer->intake->ipl }}</p>
<p>{{ $customer->intake->kanker }}</p>
<input type="checkbox"
       name="bestraling" {{ $customer->intake->bestraling ? 'checked' : '' }} /> Bestraling
<br>
<input type="checkbox"
       name="chemo" {{ $customer->intake->chemo ? 'checked' : '' }} /> Chemo
<br>
<input type="checkbox"
       name="immunotherapie" {{ $customer->intake->immunotherapie ? 'checked' : '' }} /> Imunnotherapie
<p>{{ $customer->intake->laser }}</p>
<p>{{ $customer->intake->medicatie }}</p>
<p>{{ $customer->intake->operaties }}</p>
<p>{{ $customer->intake->zon }}</p>
<input type="checkbox"
       name="koortslip" {{ $customer->intake->koortslip ? 'checked' : '' }} /> Koortslip
<br>
<input type="checkbox"
       name="roken" {{ $customer->intake->roken ? 'checked' : '' }} /> Roken
<br>
<input type="checkbox"
       name="overgang" {{ $customer->intake->overgang ? 'checked' : '' }} /> Overgang
<br>
<input type="checkbox"
       name="psoriasis" {{ $customer->intake->psoriasis ? 'checked' : '' }} /> Psoriasis
<br>
<input type="checkbox"
       name="vitrigilo" {{ $customer->intake->vitrigilo ? 'checked' : '' }} /> Vitrigilo
<br>
<input type="checkbox"
       name="zwanger" {{ $customer->intake->zwanger ? 'checked' : '' }} /> Zwanger</p>

