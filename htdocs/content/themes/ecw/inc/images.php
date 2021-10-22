<?php

use Themosis\Support\Facades\Filter;

/**
	 * Authorize SVG + WEBP import in wordpress
	 */
	Filter::add(
		'upload_mimes',
		function ($mimes) {
			$mimes['svg'] = 'image/svg+xml';
			$mimes['webp'] = 'image/webp';
			$mimes['json'] = 'application/json';
			return $mimes;
		}
	);

	/**
	 * Control import of WEBP file
	 */
	Filter::add(
		'wp_check_filetype_and_ext',
		function ($types, $file, $filename, $mimes) {
			if (FALSE !== strpos($filename, '.webp')) {
				$types['ext'] = 'webp';
				$types['type'] = 'image/webp';
			}
			return $types;
		},
		10,
		4
	);

	/**
	 * Return an empty string to hide wordpress version
	 *
	 * @return string
	 */
	function wpm_delete_version()
	{
		return '';
	}

	Filter::add('the_generator', 'wpm_delete_version');

	/**
	 * Return a percentage for image quality
	 *
	 * @param int $arg Chiffre en pourcentage.
	 *
	 * @return int
	 */
	function mbt_regenerate_thumbnail_quality($arg) {
		return 100;

	}

	Filter::add( 'jpeg_quality', 'mbt_regenerate_thumbnail_quality');
	Filter::add( 'wp_editor_set_quality', 'mbt_regenerate_thumbnail_quality');
