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
if (!isset($content_width))
{
    $content_width = 1200; /* pixels */
}

/**
 * Load WooCommerce compatibility file.
 */

Action::add('template_redirect', 'logout_confirmation');

function logout_confirmation()
{
    global $wp;

    if (isset($wp->query_vars['customer-logout'])) :
        wp_redirect(str_replace('&amp;', '&', wp_logout_url(wc_get_page_permalink('myaccount'))));

        exit;
    endif;
}

/**
 * @snippet       Redirect to Referrer @ WooCommerce My Account Login
 */
function mbt_redirect_actual_referrer()
{
    if (!wc_get_raw_referer()) :
        return;
    endif;
    ob_start();
    echo '<input type="hidden" name="redirect" value="' . wp_validate_redirect(
            wc_get_raw_referer(),
            wc_get_page_permalink('myaccount')
        ) . '" />';

    echo ob_get_clean();
}

Action::add('woocommerce_login_form_end', 'mbt_redirect_actual_referrer');

/**
 * Use the new menu location in theme
 */
Filter::add(
    'generate_mobile_header_theme_location',
    function () {
        return 'mobile-menu';
    }
);

/**
 * Add language switcher to mobile menu bar
 *
 */
function mbt_add_element_mobile_menu()
{
//		$args = [
//			'dropdown' => 1
//		];
//
//		pll_the_languages($args);

    $args = [
        'menu' => 65,
    ];

    wp_nav_menu($args);
}

//	Action::add('generate_menu_bar_items', 'mbt_add_element_mobile_menu', 5);

/**
 * @snippet       Display "Language" on Loop Pages - WooCommerce
 */

Action::add('woocommerce_before_shop_loop_item_title', 'mbt_display_sold_out_loop_woocommerce');

function mbt_display_sold_out_loop_woocommerce()
{
    global $product;
    // get an array of the WP_Term objects for a defined product ID
    $terms = wp_get_post_terms($product->get_id(), 'product_tag');

    ob_start();
    // Loop through each product tag for the current product
    if (count($terms) > 0)
    {
        foreach ($terms as $term)
        {
            $term_name = $term->name; // Product tag Name
            $term_link = get_term_link($term, 'product_tag'); // Product tag link

            // Set the product tag names in an array
            $output[] = '<span class="language-badge">' . $term_name . '</span>';
        }
        // Set the array in a coma separated string of product tags for example
        $output = implode(', ', $output);
        echo '<div class="language">' . $output . '</div>';
    }
    echo ob_get_clean();
}


Action::add('woocommerce_single_product_summary', 'mbt_template_single_title', 5);

function mbt_template_single_title()
{
    echo view('template-parts.single-tour.title');
}

Action::add('woocommerce_single_product_summary', 'mbt_template_single_add_description', 20);

function mbt_template_single_add_description()
{
    echo view('template-parts.single-tour.content');
}
