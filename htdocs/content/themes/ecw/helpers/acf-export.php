<?php

	use Themosis\Support\Facades\Filter;

//// Export JSON ACF fields
//	function cap_acf_export_json($path)
//	{
//		$path = get_stylesheet_directory_uri() . '/acf-json';
//		return $path;
//	}
//
//	Filter::add('acf/settings/save_json', 'cap_acf_export_json');
//
//	// Method 1: Filter.
//	function mbt_acf_google_map_api( $api ){
//		$api['key'] = env('GOOGLE_MAP_KEY');
//		return $api;
//	}
//	Filter::add('acf/fields/google_map/api', 'mbt_acf_google_map_api');
