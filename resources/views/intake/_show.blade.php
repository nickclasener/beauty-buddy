<div class="p-4 customer"
     data-controller="intake"
     data-intake-destroy="{{ route('intake.destroy', [$customer,$customer->intake], false) }}"
     data-target="intake.intake"
>
	<form action="{{ route('intake.destroy', [$customer,$customer->intake], false) }}"
	      method="POST"
	      data-action="intake#delete"
	>
		@method('DELETE')@csrf
		<button type="submit"
		        class="p-4 group"
		>{{ svg_image('lineicons/trash', 'fill-current self-center text-red-300 group-hover:text-red-600 h-8') }}
		</button>
	</form>
	<a href="{{ route('intake.edit',$customer,false) }}"
	   class="p-4 group"
	>{{ svg_image('lineicons/pencil-alt', 'fill-current self-center text-blue-300 group-hover:text-blue-600 h-8') }}
	</a>
	<h2 class="font-hairline pb-2">Inake:</h2>
	<div class="flex flex-wrap">
		<div class="lg:w-1/3 w-full">
			<label for="behandeling"
			       class="font-hairline"
			>behandeling</label>
			<p class="bg-transparent appearance-none focus:outline-none w-full">
				{{ $customer->intake->behandeling }}
			</p>
		</div>
		<div class="lg:w-1/3 w-full">
			<label for="huidverbetering"
			       class="font-hairline"
			>huidverbetering</label>
			<p class="bg-transparent appearance-none focus:outline-none w-full">
				{{ $customer->intake->huidverbetering }}
			</p>
		</div>
		<div class="lg:w-1/3 w-full">
			<label for="allergieen"
			       class="font-hairline"
			>allergieen</label>
			<p class="bg-transparent appearance-none focus:outline-none w-full">
				{{ $customer->intake->allergieen }}
			</p>
		</div>
		<div class="lg:w-1/3 w-full">
			<label for="bijzonderheden"
			       class="font-hairline"
			>bijzonderheden</label>
			<p class="bg-transparent appearance-none focus:outline-none w-full">
				{{ $customer->intake->bijzonderheden }}
			</p>
		</div>
		<div class="lg:w-1/3 w-full">
			<label for="bloeddruk"
			       class="font-hairline"
			>bloeddruk</label>
			<p class="bg-transparent appearance-none focus:outline-none w-full">
				{{ $customer->intake->bloeddruk }}
			</p>
		</div>
		<div class="lg:w-1/3 w-full">
			<label for="chemisch"
			       class="font-hairline"
			>chemisch</label>
			<p class="bg-transparent appearance-none focus:outline-none w-full">
				{{ $customer->intake->chemisch }}
			</p>
		</div>
		<div class="lg:w-1/3 w-full">
			<label for="cosmetisch"
			       class="font-hairline"
			>cosmetisch</label>
			<p class="bg-transparent appearance-none focus:outline-none w-full">
				{{ $customer->intake->cosmetisch }}
			</p>
		</div>
		<div class="lg:w-1/3 w-full">
			<label for="diabetes"
			       class="font-hairline"
			>diabetes</label>
			<p class="bg-transparent appearance-none focus:outline-none w-full">
				{{ $customer->intake->diabetes }}
			</p>
		</div>
		<div class="lg:w-1/3 w-full">
			<label for="eczeem"
			       class="font-hairline"
			>eczeem</label>
			<p class="bg-transparent appearance-none focus:outline-none w-full">
				{{ $customer->intake->eczeem }}
			</p>
		</div>
		<div class="lg:w-1/3 w-full">
			<label for="huidkanker"
			       class="font-hairline"
			>huidkanker</label>
			<p class="bg-transparent appearance-none focus:outline-none w-full">
				{{ $customer->intake->huidkanker }}
			</p>
		</div>
		<div class="lg:w-1/3 w-full">
			<label for="huidschimmel"
			       class="font-hairline"
			>huidschimmel</label>
			<p class="bg-transparent appearance-none focus:outline-none w-full">
				{{ $customer->intake->huidschimmel }}
			</p>
		</div>
		<div class="lg:w-1/3 w-full">
			<label for="ipl"
			       class="font-hairline"
			>ipl</label>
			<p class="bg-transparent appearance-none focus:outline-none w-full">
				{{ $customer->intake->ipl }}
			</p>
		</div>
		<div class="lg:w-1/3 w-full">
			<label for="laser"
			       class="font-hairline"
			>laser</label>
			<p class="bg-transparent appearance-none focus:outline-none w-full">
				{{ $customer->intake->laser }}
			</p>
		</div>
		<div class="lg:w-1/3 w-full">
			<label for="medicatie"
			       class="font-hairline"
			>medicatie</label>
			<p class="bg-transparent appearance-none focus:outline-none w-full">
				{{ $customer->intake->medicatie }}
			</p>
		</div>
		<div class="lg:w-1/3 w-full">
			<label for="operaties"
			       class="font-hairline"
			>operaties</label>
			<p class="bg-transparent appearance-none focus:outline-none w-full">
				{{ $customer->intake->operaties }}
			</p>
		</div>
		<div class="lg:w-1/3 w-full">
			<label for="zon"
			       class="font-hairline"
			>zon</label>
			<p class="bg-transparent appearance-none focus:outline-none w-full">
				{{ $customer->intake->zon }}
			</p>
		</div>
		<div class="lg:w-1/3 w-full">
			<label for="kanker"
			       class="font-hairline"
			>kanker</label>
			<p class="bg-transparent appearance-none focus:outline-none w-full">
				{{ $customer->intake->kanker }}
			</p>
		</div>
	</div>
	<hr class="border-b border-dashed my-4">
	<div class="flex flex-wrap">
		<div class="flex items-center sm:w-1/3 w-full">
			<label class="switch ">
				<input type="checkbox"
				       name="bestraling"
						{{ checkbox($customer->intake->bestraling) }}>
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
						{{ checkbox($customer->intake->chemo) }}>
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
						{{ checkbox($customer->intake->immunotherapie) }}>
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
						{{ checkbox($customer->intake->koortslip) }}>
				<span class="slider"></span>
			</label>
			<label for="koortslip"
			       class="font-hairline ml-1"
			>Koortslip
			</label>
		</div>
		<div class="flex items-center sm:w-1/3 sm:w-1/2 w-full">
			<label class="switch flex items-center">
				<input type="checkbox"
				       name="roken"
						{{ checkbox($customer->intake->roken) }}>
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
						{{ checkbox($customer->intake->overgang) }}>
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
						{{ checkbox($customer->intake->psoriasis) }}>
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
						{{ checkbox($customer->intake->vitrigilo) }}>
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
						{{ checkbox($customer->intake->zwanger) }}>
				<span class="slider"></span>
			</label>
			<label for="zwanger"
			       class="font-hairline ml-1"
			>zwanger
			</label>
		</div>
	</div>
</div>
