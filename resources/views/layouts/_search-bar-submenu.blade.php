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
<div class="flex items-center flex-grow pt-10">
	{{--	@svg('lineicons/search', ['class'=>'fill-current inline-block h-8'])--}}
	{{ svg_image('lineicons/search', 'fill-current pointer-events-none text-gray-600 h-6') }}
	<input type="text"
	       class="ml-1 w-full"
	       placeholder="{{ $placeholder }}"
	       data-target="autocomplete2.input"
	       {{--				/>--}}
	       {{--				<input type="hidden"--}}
	       name="q"
	       value="{{ request('q') }}"
			{{--				       data-target="autocomplete2.hidden"--}}
	/>
</div>

<div data-target="autocomplete2.results"
     class="shadow-lg px-10 pb-10"
     hidden
>
</div>
