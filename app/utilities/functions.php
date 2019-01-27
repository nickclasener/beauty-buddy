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

if ( ! function_exists('set_active') ) {
	function set_active ( $uri, $class )
	{
		return Request::is($uri) ? $class : '';
	}
}
