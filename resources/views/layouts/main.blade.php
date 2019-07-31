<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('layouts._head')

<body class="bg-gray-200 font-sans text-base-font text-gray-700 min-h-screen"
      style="background-image: url('{{ asset('img/symphony.png') }}');"
>

@include('layouts._navbar2')
<div class="p-4">
@yield('main')
</div>
@if ( count($errors) )
	@foreach ( $errors->all() as $error)
		<ul class="alert alert-danger">
			<li>{{ $error }}</li>
		</ul>
	@endforeach
@endif

</body>
</html>
