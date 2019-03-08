{{--<div data-controller="notes"--}}
{{--data-target="notes.notes"--}}
{{--data-notes-url="{{ route('notities.store', $customer, false) }}"--}}
{{-->--}}
{{--data-notes-exist="{{  !array_first($customer->notes) ? 'true': 'false' }}">--}}
{{--		data-notes-exist="{{  array_first($customer->notes)  }}">--}}
{{--<div class="pb-10">--}}
{{--{{ count($customer->notes) }}--}}
{{--@include('klanten.notes.create')--}}
{{--<div data-target="notes.list">--}}
{{--@foreach ($customer->monthYearNotes() as $monthYear => $notes)--}}
{{--<div data-controller="monthyear"--}}
{{--data-target="monthyear.monthyear"--}}
{{-->--}}
{{--<h2 class="font-hairline text-buddy-teal pt-10 pb-5"--}}
{{-->{{ $monthYear }}</h2>--}}
{{--@foreach ($notes as $note)--}}
{{--@include('klanten.notes.show',[$note])--}}
{{--@endforeach--}}
{{--</div>--}}
{{--@endforeach--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
<div data-target="notes.list">
	@foreach ($customer->monthYearNotes() as $monthYear => $notes)
		<div data-controller="monthyear"
		     data-target="monthyear.monthyear"
		>
			<h2 class="font-hairline text-buddy-teal pt-5 pb-5"
			>{{ $monthYear }}</h2>
			@foreach ($notes as $note)
				@include('klanten.notes.show',[$note])
			@endforeach
		</div>
	@endforeach
</div>