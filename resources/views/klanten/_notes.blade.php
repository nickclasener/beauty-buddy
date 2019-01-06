@foreach($customer->notes as $note)
	<div class="w-full bg-white">
		<h2 class="font-hairline text-green "> December, 2018</h2>
		<form action="{{route('notities.destroy',$note)}}"
					method="POST"
		>@method('DELETE')@csrf
			<button type="submit"
			>@svg('trash', ['class'=>'h-5'])
			</button>
		</form>
		<a href="{{route('notities.edit',[$note->customer,$note->id])}}"
			 class="h-5"
		>
			@svg('pencil', ['class'=>'h-5'])
		</a>
		<div class="py-10 pl-10 pr-15">
			<div class="w-full flex  mt-5 ml-5">
				<div class="w-2.5 h-2.5 border border-green  rounded-full flex-no-shrink"></div>
				<p class="ml-5 font-thin flex-no-shrink">20 Dec</p>
				<div class="ml-5 ">
					<p>{{$note->body}}</p>
					<small class="font-hairline">07:20am</small>
				</div>
			</div>
		</div>
	</div>
@endforeach