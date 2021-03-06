<?php

use mysql_xdevapi\Collection;

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
	function active_route_set_class ( $uri = null, $contrast = false )
	{
		if ( $contrast ) {
			$css = Route::is($uri) ? ' bg-teal-500 ' : ' bg-teal-200 ';

			return ' group hover:bg-teal-300' . $css;
		}
		$css = Route::is($uri) ? ' bg-teal-200 ' : ' bg-teal-500 ';

		return ' group hover:bg-teal-300' . $css;
	}
}

if ( ! function_exists('active_icon_route_set_class') ) {
	function active_icon_route_set_class ( $uri = null, $contrast = false )
	{
		if ( $contrast ) {
			$css = Route::is($uri) ? ' text-white ' : ' text-teal-500 ';

			return ' fill-current group-hover:text-teal-200' . $css;
		}
		$css = Route::is($uri) ? ' text-teal-500 ' : ' text-white ';

		return ' fill-current group-hover:text-teal-200' . $css;
	}
}

if ( ! function_exists('checkbox') ) {
	function checkbox ( $boolean )
	{
		return $boolean ? 'checked' : '';
	}
}
if ( ! function_exists('saveCheckbox') ) {
	function saveCheckbox ( $boolean )
	{
		return $boolean ? true : false;
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
if ( ! function_exists('getModelKeys') ) {
	function getModelKeys ( $model, $guarded = null )
	{
		if ( empty($guarded) ) {
			$guarded = [
					'id',
					'user_id',
					'customer_id',
					'created_at',
					'updated_at',
					'intake_id',
			];
		}
		$modelKeys = $model->getConnection()->getSchemaBuilder()->getColumnListing($model->getTable());

		return array_diff($modelKeys, $guarded);
	}
}
