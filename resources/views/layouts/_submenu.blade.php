<div class="h-15 w-full bg-buddy-lightest flex justify-around items-center fixed bg-teal-500  md:static bottom-0
md:bottom-auto"
     data-controller="submenu"
>
	<a class="md:hidden block no-underline md:px-12 md:py-5 "
	   href="#{{ $customer->slug }}"
	   data-action="click->toggle#toggleKlant"
	   data-target="toggle.active"
			{{--	   href="{{ route('notes.index', $customer, false) }}"--}}
			{{--	   data-goto-hash="{{ $customer->slug }}"--}}
			{{--	   data-controller="goto"--}}
			{{--	   data-target="goto.goto"--}}
			{{--	   data-action="click->goto#goto"--}}
	>{{ $customer->naam }}
	</a>
	<a class="no-underline md:px-12 md:py-5 {{ active_route_set_class('notes.index','active') }}"
	   href="{{ route('notes.index', $customer, false) }}"
	   data-target="toggle.deactivate"
	>Notes
	</a>
	<a class="no-underline md:px-12 md:py-5 {{ active_route_set_class('huidanalyses.index','active') }}"
	   href="{{ route('huidanalyses.index', $customer, false) }}"
	   data-target="toggle.deactivate"
	>Huidanalyse
	</a>
	<a class="no-underline md:px-12 md:py-5 {{ active_route_set_class('dailyadvice.index','active') }}"
	   href="{{ route('dailyadvice.index', $customer, false) }}"
	   data-target="toggle.deactivate"
	>Product Advies
	</a>
	<a class="no-underline md:px-12 md:py-5 {{ active_route_set_class('active') }}"
	   href=""
	>Intake
	</a>
</div>

