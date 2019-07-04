{{-- FIXME: DELETE--}}
{{--<form action="{{ route($route,$customer,false) }}">--}}
{{--	@method('get')@csrf--}}
{{--	<div class="form-group">--}}
{{--		<input--}}
{{--				type="text"--}}
{{--				name="q"--}}
{{--				class="form-control"--}}
{{--				placeholder="Search..."--}}
{{--				value="{{ request('q') }}"--}}
{{--		/>--}}
{{--		<button type="submit">send</button>--}}
{{--	</div>--}}
{{--</form>--}}
<div class="mx-4">
	<div class="relative w-full mt-8">
		<input class="h-8 lg:h-auto transition bg-white shadow focus:shadow-inner focus:outline-none border border-gray-200 placeholder-gray-700 py-1 lg:py-2 pr-4 pl-10 block w-full appearance-none leading-normal z-30"
		       type="text"
		       placeholder="{{ $placeholder }}"
		       data-target="autocomplete2.input"
		/>
		<input type="hidden"
		       name="q"
		       value="{{ request('q') }}"
		       data-target="autocomplete2.hidden"
		/>
		<div class="pointer-events-none absolute inset-y-0 left-0 pl-2.5 flex items-center">
			{{ svg_image('lineicons/search', 'fill-current pointer-events-none text-gray-600 h-6') }}
		</div>
	</div>
	<div data-target="autocomplete2.results"
	     class="shadow-md px-4 pb-4  mt-4  border border-gray-200"
	     hidden
	>
	</div>
</div>
<hr>
{{--<div class="flex items-center flex-grow pt-4">--}}
{{--	--}}{{--	@svg('lineicons/search', ['class'=>'fill-current inline-block h-8'])--}}
{{--	{{ svg_image('lineicons/search', 'fill-current pointer-events-none text-gray-600 h-6') }}--}}
{{--	<input type="text"--}}
{{--	       class="ml-1 w-full"--}}
{{--	       placeholder="{{ $placeholder }}"--}}
{{--	       data-target="autocomplete2.input"--}}
{{--	       --}}{{--				/>--}}
{{--	       --}}{{--				<input type="hidden"--}}
{{--	       name="q"--}}
{{--	       value="{{ request('q') }}"--}}
{{--			--}}{{--				       data-target="autocomplete2.hidden"--}}
{{--	/>--}}
{{--</div>--}}


