<p>{{$customer->naam}}</p>
<p>{{$customer->email}}</p>
<p>{{$customer->telefoon}}</p>
<p>{{$customer->mobiel}}</p>
<p>{{$customer->geboortedatum}}</p>
<p>{{$customer->straatnaam}}</p>
<p>{{$customer->huisnummer}}</p>
<p>{{$customer->postcode}}</p>
<p>{{$customer->plaats}}</p>

@if($customer->notes != null)
	@foreach($customer->notes as $note)
		<p>{{$note->body}}</p>
		<hr>
	@endforeach
@endif


@if($customer->intake != null)
	<div class="uk-card-body">
		{{ $customer->intake->behandeling }}<br> {{ $customer->intake->huidverbetering }}<br> {{ $customer->intake->allergieen }}
		<br> {{ $customer->intake->bijzonderheden }}<br> {{ $customer->intake->bloeddruk }}<br> {{ $customer->intake->chemisch }}
		<br> {{ $customer->intake->cosmetisch
		}}<br> {{ $customer->intake->diabetes }}<br> {{ $customer->intake->eczeem }}<br> {{ $customer->intake->huidkanker }}<br> {{ $customer->intake->huidschimmel
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
@endif
