	<div class="h-15 w-full bg-buddy-lightest flex justify-around items-center">
		<a class="no-underline px-12 py-5 {{ active_route_set_class('notities.index','active') }}"
		   href="{{ route('notities.index', $customer, false) }}"
		>Notes</a>
		<a class="no-underline px-12 py-5 {{ active_route_set_class('huidanalyses.index','active') }}"
		   href="{{ route('huidanalyses.index', $customer, false) }}"
		>Huidanalyse</a>
		<a class="no-underline px-12 py-5 {{ active_route_set_class('dailyadvice.index','active') }}"
		   href="{{ route('dailyadvice.index', $customer, false) }}"
		>Product Advies</a>
		<a class="no-underline px-12 py-5 {{ active_route_set_class('active') }}"
		   href=""
		>Intake</a>
	</div>

