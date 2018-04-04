<div class="uk-card-body">
	{{ $customer->intake->behandeling }}<br> {{ $customer->intake->huidverbetering }}
	<br> {{ $customer->intake->allergieen }}
	<br> {{ $customer->intake->bijzonderheden }}<br> {{ $customer->intake->bloeddruk }}
	<br> {{ $customer->intake->chemisch }}
	<br> {{ $customer->intake->cosmetisch
		}}<br> {{ $customer->intake->diabetes }}<br> {{ $customer->intake->eczeem }}<br> {{ $customer->intake->huidkanker }}
	<br> {{ $customer->intake->huidschimmel
		}}<br> {{ $customer->intake->ipl }}<br> {{ $customer->intake->kanker }}<br>
	<input type="checkbox"
				 name="bestraling" {{ $customer->intake->bestraling ? 'checked' : '' }} /> Bestraling
	<br>
	<input type="checkbox"
				 name="chemo" {{ $customer->intake->chemo ? 'checked' : '' }} /> Chemo
	<br>
	<input type="checkbox"
				 name="immunotherapie" {{ $customer->intake->immunotherapie ? 'checked' : '' }} /> Imunnotherapie
	<br> {{ $customer->intake->laser }}<br> {{ $customer->intake->medicatie }}<br> {{ $customer->intake->operaties }}<br> {{ $customer->intake->zon
		}}<br>
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
	<input type="checkbox"
				 name="zwanger"
				 value="True"
	/> Zwanger</p>
</div>
</div>