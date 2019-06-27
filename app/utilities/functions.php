<?php

if ( ! function_exists('dayMonth') ) {
	function dayMonth ( $model )
	{
		return $model->created_at->format('d M');
	}
}

if ( ! function_exists('timeAmPm') ) {
	function timeAmPm ( $model )
	{
		return $model->created_at->format('h:ia');
	}
}

if ( ! function_exists('active_route_set_class') ) {
	function active_route_set_class ( $uri, $class = null )
	{
		//		$uri = ltrim($uri, '/');
		//		dd($uri);
		//		dd(Route::currentRouteName());
		//		dd(request()->path());
		//		dd(ltrim($uri, '/'));

		return Route::is($uri) ? $class : 'inactive';
		//		return Route::is($uri) ? $class : 'inactive';
	}
}

if ( ! function_exists('checkbox') ) {
	function checkbox ( $boolean )
	{
		return $boolean ? 'checked' : '';
	}
}

if ( ! function_exists('monthYearDesc') ) {
	function monthYearDesc ( $array )
	{
		return $array->sortByDesc('created_at')->groupBy(static function ( $array ) {
			return $array->created_at->format('F, Y');
		});
	}
}

if ( ! function_exists('monthYear') ) {
	function monthYear ( $array )
	{
		return $array->groupBy(static function ( $array ) {
			return $array->created_at->format('F, Y');
		});
	}
}

if ( ! function_exists('monthYearFormat') ) {
	function monthYearFormat ( $model )
	{
		return $model->created_at->format('F, Y');
	}
}
