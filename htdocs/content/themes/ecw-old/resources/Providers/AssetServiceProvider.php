<?php

	namespace Theme\Providers;

	use Illuminate\Support\ServiceProvider;
	use Themosis\Core\ThemeManager;
	use Themosis\Support\Facades\Asset;

	class AssetServiceProvider extends ServiceProvider {

		/**
		 * Theme Assets
		 *
		 * Here we define the loaded assets from our previously defined
		 * "dist" directory. Assets sources are located under the root "assets"
		 * directory and are then compiled, thanks to Laravel Mix, to the "dist"
		 * folder.
		 *
		 * @see https://laravel-mix.com/
		 */
		public function register() {
			/** @var ThemeManager $theme */
			$theme = $this->app->make( 'wp.theme' );
			// Theme Gutenberg blocks CSS.
			$css_dependencies = [
				'wp-block-library-theme',
				'wp-block-library',
			];
			// Theme Gutenberg blocks JS.
			$js_dependencies = [
				'wp-block-editor',
				'wp-blocks',
				'wp-editor',
				'wp-components',
				'wp-compose',
				'wp-data',
				'wp-element',
				'wp-hooks',
				'wp-i18n',
				'wp-blocks',
				'wp-i18n',
				'wp-element',
			];

			Asset::add(
				'theme_styles',
				'css/style.css',
				$css_dependencies,
				$theme->getHeader( 'version' ),
				'all'
			)->to( );

			Asset::add(
				'theme_woo',
				'css/woocommerce.css',
				[],
				$theme->getHeader( 'version' ),
				'all'
			)->to();

			Asset::add(
				'_mbt-admin-style',
				'css/editor-style.css',
				[],
				$theme->getHeader( 'version' ),
				'all'
			)->to(
				'admin'
			);
			Asset::add( 'theme_js',
				'js/theme.min.js', [ 'jquery' ],
				$theme->getHeader( 'version' ),
				true )->to( 'front' );
		}

	}
