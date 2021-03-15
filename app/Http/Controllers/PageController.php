<?php

	namespace App\Http\Controllers;

	use WP_Query;
	use function wp_get_attachment_image_url;
	use function wp_trim_words;

	class PageController extends Controller {

		public function index() {
			return view( 'pages.default' );
		}
	}
