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
	function active_route_set_class ( $uri )
	{

		$css = Route::is($uri) ? ' bg-teal-200 ' : ' bg-teal-500 ';

		return ' group hover:bg-teal-300 ' . $css;
	}
}

if ( ! function_exists('active_icon_route_set_class') ) {
	function active_icon_route_set_class ( $uri )
	{
		$css = Route::is($uri) ? ' text-teal-500 ' : ' text-teal-200 ';

		return ' fill-current group-hover:text-teal-400' . $css;
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
