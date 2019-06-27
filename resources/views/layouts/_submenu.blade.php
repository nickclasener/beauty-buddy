<div class="h-15 w-full bg-buddy-lightest flex justify-between items-stretch fixed
bg-teal-500  md:static
 bottom-0
md:bottom-auto z-10 md:z-0"
     data-controller="submenu"
>
	<a class="md:hidden block no-underline md:px-12 md:py-5 h-full flex items-center  justify-center flex-grow text-center"
	   href="#{{ $customer->slug }}"
	   data-action="click->toggle#toggleKlant"
	   data-target="toggle.active"
			{{--	   href="{{ route('notes.index', $customer, false) }}"--}}
			{{--	   data-goto-hash="{{ $customer->slug }}"--}}
			{{--	   data-controller="goto"--}}
			{{--	   data-target="goto.goto"--}}
			{{--	   data-action="click->goto#goto"--}}
	>
		{{--		{{ $customer->naam }}--}}
		@svg('dripicons/user-id',['class'=>'p-6'])
	</a>
	<a class="no-underline md:px-12 md:py-5 {{ active_route_set_class('notes.index','active') }} flex items-center
	justify-center flex-grow text-center"
	   href="{{ route('notes.index', $customer, false) }}"
	   data-target="toggle.deactivate"
	>
		{{--		Notes--}}
		@svg('dripicons/document',['class'=>'p-6'])
	</a>
	<a class="no-underline md:px-12 md:py-5 {{ active_route_set_class('huidanalyses.index','active') }} flex
	justify-center flex-grow text-center
	items-center"
	   href="{{ route('huidanalyses.index', $customer, false) }}"
	   data-target="toggle.deactivate"
	>
		{{--		Huidanalyse--}}
		@svg('dripicons/preview',['class'=>'p-6'])
	</a>
	<a class="no-underline md:px-12 md:py-5 {{ active_route_set_class('dailyadvice.index','active') }} flex flex-grow text-center
	items-center justify-center"
	   href="{{ route('dailyadvice.index', $customer, false) }}"
	   data-target="toggle.deactivate"
	>
		{{--		Product Advies--}}

		@svg('dripicons/information',['class'=>'p-6'])
	</a>
	<a class="no-underline md:px-12 md:py-5 {{ active_route_set_class('active') }} flex items-center justify-center
	 text-center flex-grow"
	   href=""
	>
		{{--		Intake--}}
		@svg('dripicons/checklist',['class'=>'p-6'])
	</a>
</div>

