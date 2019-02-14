<div data-controller="huidanalyse"
     data-huidanalyse-update="{{ route('huidanalyses.update', $huidanalyse) }}"
     data-huidanalyse-destroy="{{ route('huidanalyses.destroy', $huidanalyse) }}"
     class="w-full flex-shrink flex pt-5 pl-5"
>
	<div class="w-2.5 h-2.5 border border-buddy-teal rounded-full flex-no-shrink"></div>
	<p class="ml-5 font-thin flex-no-shrink">{{ dayMonth($huidanalyse) }}</p>
	<div class="ml-5 w-full">
		<div data-controller="toggle"
		>
			<p data-target="toggle.show"
			   data-action="click->toggle#toggle"
			>
				{{ $huidanalyse->body }}</p>
			<div class="hidden"
			     data-target="toggle.hidden"
			>
				@include('huidanalyses.edit',[$huidanalyse])
			</div>
			<div class="flex justify-between">
				<small class="font-hairline">{{ timeAmPm($huidanalyse) }}</small>
				<div class="flex ">
					<button data-action="click->toggle#toggle"
					        class="h-5"
					>
						@svg('icon-136-document-edit',['class'=>'ml-1 fill-current text-teal'])
					</button>
					<form action="{{ route('huidanalyses.destroy',$huidanalyse) }}"
					      method="POST"
					      data-action="huidanalyse#delete monthyear#update"
					>
						@method('DELETE')@csrf
						<button type="submit">
							@svg('icon-26-trash-can', ['class'=>'mt-5 h-5 fill-current text-red'])
						</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>