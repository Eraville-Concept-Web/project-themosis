<?php

    namespace App\Hooks;

    use Themosis\Hook\Hookable;
    use Themosis\Support\Facades\Filter;

    class AcfHook extends Hookable
    {
        public $hook = 'init';

        /**
         * @param $path
         *
         * @return string
         */
        public static function acf_export_json($path): string
        {
            $path = get_stylesheet_directory().'/acf-json';

            return $path;
        }

        /**
         * @param $paths
         *
         * @return array
         */
        public static function acf_json_load_point($paths): array
        {
            // remove original path (optional)
            unset($paths[0]);

            // append path
            $paths[] = get_stylesheet_directory().'/acf-json';

            // return
            return $paths;
        }

        /**
         * Extend WordPress.
         */
        public function register()
        {
            if (class_exists('ACF')) :
                // Export JSON ACF fields
                Filter::add('acf/settings/save_json', [$this, 'acf_export_json']);
            Filter::add('acf/settings/load_json', [$this, 'acf_json_load_point']);
            endif;
        }
    }
