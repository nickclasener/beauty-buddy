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
       name="bestraling" {{ checkbox($customer->intake->bestraling) }} /> Bestraling
<br>
<input type="checkbox"
       name="chemo" {{ checkbox($customer->intake->chemo) }} /> Chemo
<br>
<input type="checkbox"
       name="immunotherapie" {{ checkbox($customer->intake->immunotherapie) }} /> Imunnotherapie
<p>{{ $customer->intake->laser }}</p>
<p>{{ $customer->intake->medicatie }}</p>
<p>{{ $customer->intake->operaties }}</p>
<p>{{ $customer->intake->zon }}</p>
<input type="checkbox"
       name="koortslip" {{ checkbox($customer->intake->koortslip) }} /> Koortslip
<br>
<input type="checkbox"
       name="roken" {{ checkbox($customer->intake->roken) }} /> Roken
<br>
<input type="checkbox"
       name="overgang" {{ checkbox($customer->intake->overgang) }} /> Overgang
<br>
<input type="checkbox"
       name="psoriasis" {{ checkbox($customer->intake->psoriasis) }} /> Psoriasis
<br>
<input type="checkbox"
       name="vitrigilo" {{ checkbox($customer->intake->vitrigilo) }} /> Vitrigilo
<br>
<input type="checkbox"
       name="zwanger" {{ checkbox($customer->intake->zwanger) }} /> Zwanger</p>

