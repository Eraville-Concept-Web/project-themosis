<?php

namespace App\Hooks;

use Themosis\Hook\Hookable;
use Themosis\Support\Facades\Filter;

class AcfHook extends Hookable
{
    public $hook = 'init';
    
    /**
     * Extend WordPress.
     */
    public function register()
    {
        if (! class_exists('ACF')) :
            return;
        endif;
        
        // Export JSON ACF fields
        Filter::add('acf/settings/save_json', [self::class, 'acf_export_json']);
        Filter::add('acf/settings/load_json', [self::class, 'acf_json_load_point']);
    }
    
    /**
     * @param $path
     *
     * @return string
     */
    public static function acf_export_json($path): string
    {
        return get_stylesheet_directory() . '/acf-json';
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
        $paths[] = get_stylesheet_directory() . '/acf-json';
        
        // return
        return $paths;
    }
}
