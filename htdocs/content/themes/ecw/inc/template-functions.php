<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package _mbt
 */

use Themosis\Support\Facades\Action;
use Themosis\Support\Facades\Filter;

/**
 * Set the content width to something large
 * We set a more accurate width in generate_smart_content_width()
 */
global $content_width;
if (! isset($content_width)) {
    $content_width = 1200; /* pixels */
}

/**
 * Use the new menu location in theme
 */
Filter::add(
    'generate_mobile_header_theme_location',
    function () {
        return 'mobile-menu';
    }
);


Action::add('generate_after_entry_header', 'add_image_caption');
function add_image_caption()
{
    $get_description = wp_get_attachment_caption(get_post_thumbnail_id());
    echo view('blog.single-metas', compact('get_description'));
}

Filter::add('comment_form_defaults', 'add_icon_to_comments_section', 10, 1);
if (! function_exists('add_icon_to_comments_section')) :
    function add_icon_to_comments_section($defaults)
    {
        $defaults['title_reply'] = '<i class="fas fa-comment-dots pr-4 text-gesRed"></i>' . __('Leave a Reply');
        
        return $defaults;
    }

endif;

Action::add('init', 'wpm_new_author_base');
if (! function_exists('wpm_new_author_base')) :
    function wpm_new_author_base()
    {
        global $wp_rewrite;
        $author_slug             = 'auteur'; // On choisit le nouveau slug ici
        $wp_rewrite->author_base = $author_slug; // On met en place le nouveau slug
    }
endif;

Filter::add('generate_smooth_scroll_duration', 'uges_smooth_scroll_duration');
if (! function_exists('uges_smooth_scroll_duration')) :
    function uges_smooth_scroll_duration()
    {
        return 2000; // milliseconds
    }
endif;

Filter::add('generate_blog_columns', 'uges_job_offers_columns');
if (! function_exists('uges_job_offers_columns')) :
    function uges_job_offers_columns($columns)
    {
        if (is_post_type_archive('job-offers')
            || is_post_type_archive('job-applications')) :
            return true;
        endif;
        
        return $columns;
    }
endif;

Filter::add('login_redirect', 'uges_login_redirect', 999, 3);
function uges_login_redirect($redirect_to, $request, $user)
{
    if (isset($user->roles) && is_array($user->roles)) :
        if (in_array('administrator', $user->roles)
            || in_array('editor', $user->roles)
            || in_array('author', $user->roles)) :
            $redirect_to = admin_url(); elseif (in_array('customer', $user->roles)
                || in_array('shop_manager', $user->roles)) :
                $redirect_to = home_url(); else :
                $redirect_to = home_url();
    endif;
    endif;
    
    return $redirect_to;
}

Filter::add('generate_smooth_scroll_elements', function ($elements) {
    $elements[] = 'a[href*="#"]';
    
    return $elements;
});
