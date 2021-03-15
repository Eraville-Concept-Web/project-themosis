<?php

	/**
	 * Application routes.
	 */
	Route::any( 'front', 'HomeController@index' );

	/*
	 * Woocommerce Page
	 */
//	Route::any( 'product', 'ShopController@single' );
//	Route::any( 'cart', 'ShopController@shop' );
//	Route::any( 'checkout', 'ShopController@shop' );
//	Route::any( 'account', 'ShopController@shop' );
//	Route::any( 'wc_endpoint', 'ShopController@shop' );
//	Route::any( 'product_category', 'ShopController@archive' );
//	Route::any( 'product_tag', 'ShopController@archive' );
//	Route::any( 'shop', 'ShopController@archive' );

	/**
	 * Generic Pages
	 */
	Route::any( 'single', 'PostController@index' );
	Route::any( 'page', 'PageController@index' );
	Route::any( 'archive', 'ArchiveController@index' );

	/*
	 * Regular & fallback pages
	 */

	Route::any( 'search', 'SearchController@index' );
	Route::fallback( 'ExceptionController@index' );
