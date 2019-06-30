<div class="lg:sticky lg:top-0 lg:z-20 lg:pt-16 -mx-4 lg:mx-0">
	<div class="w-full bg-buddy-lightest flex justify-between items-stretch fixed bg-teal-500 bottom-0 lg:bottom-auto z-10 lg:mx-auto text-white lg:relative h-12 rounded-lg shadow-md"
	     data-controller="submenu"
	>
		<a class="no-underline py-1 lg:py-2 {{ active_route_set_class('klanten.show') }} flex items-center justify-center flex-grow text-center lg:hidden block"
		   href="{{ route('klanten.show',$customer,false) }}"
		>{{ svg_image('lineicons/user', 'h-8'. active_icon_route_set_class('klanten.show')) }}
		</a>

		<a class="no-underline lg:py-2 {{ active_route_set_class('notes.index') }} flex items-center justify-center flex-grow text-center lg:rounded-bl-lg lg:rounded-tl-lg"
		   href="{{ route('notes.index', $customer, false) }}"
		   data-target="toggle.deactivate"
		>{{ svg_image('lineicons/thought', 'h-8'. active_icon_route_set_class('notes.index')) }}
		</a>

		<a class="no-underline {{ active_route_set_class('huidanalyses.index') }} flex justify-center flex-grow text-center items-center"
		   href="{{ route('huidanalyses.index', $customer, false) }}"
		   data-target="toggle.deactivate"
		>{{ svg_image('lineicons/heart', 'h-8'. active_icon_route_set_class('huidanalyses.index')) }}
		</a>

		<a class="no-underline lg:py-2 {{ active_route_set_class('dailyadvice.index') }} flex flex-grow text-center items-center justify-center"
		   href="{{ route('dailyadvice.index', $customer, false) }}"
		   data-target="toggle.deactivate"
		> {{ svg_image('lineicons/list', 'h-8'. active_icon_route_set_class('dailyadvice.index')) }}
		</a>

		<a class="no-underline lg:py-2 {{ active_route_set_class('intake.show') }} flex items-center justify-center text-center flex-grow lg:rounded-br-lg lg:rounded-tr-lg"
		   href="#"
		> {{ svg_image('lineicons/support', 'h-8'. active_icon_route_set_class('intake.show')) }}
		</a>
	</div>
</div>
