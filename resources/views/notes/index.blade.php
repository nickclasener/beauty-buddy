@foreach($customer->monthYearNotes() as $key =>$notes)
	<div class="pt-10 pl-10 pr-15">
		<h2 class="font-hairline text-buddy-teal pb-10">{{ $key }}</h2>
		@foreach($notes as $note)
			<div class="w-full flex  mt-5 ml-5">
				<div class="w-2.5 h-2.5 border border-buddy-teal  rounded-full flex-no-shrink"></div>
				<p class="ml-5 font-thin flex-no-shrink">{{ dayMonth($note) }}</p>
				<div class="ml-5 ">
					<p>{{ $note->body }}</p>
					<div class="flex justify-between">
						<small class="font-hairline">{{ timeAmPm($note) }}</small>
						<div class="flex hidden">
							<a href="{{ route('notities.edit',[$note->customer,$note->id]) }}"
								 class="h-5"
							>
								@svg('icon-136-document-edit',['class'=>'ml-1 fill-current text-teal'])
							</a>
							<form action="{{  route('notities.destroy',$note) }}"
										method="POST"
							>@method('DELETE')@csrf
								<button type="submit">
									@svg('icon-26-trash-can', ['class'=>'mt-5 h-5 fill-current text-red'])
								</button>
							</form>
						
						</div>
					</div>
				</div>
			</div>
		
		@endforeach
	
	</div>
@endforeach
