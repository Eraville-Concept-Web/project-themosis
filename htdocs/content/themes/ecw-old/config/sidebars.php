<?php
/**
 * Edit this file in order to add WordPress sidebars to your theme.
 *
 * @see https://developer.wordpress.org/reference/functions/register_sidebar/
 */
return [
    [
        'name' => __('Footer', THEME_TD),
        'id' => 'sidebar-1',
        'description' => __('Add widgets here to appear in your footer.', THEME_TD),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ],
	[
		'name' => __('Sidebar Shop', THEME_TD),
		'id' => 'sidebar-shop',
		'description' => __('Add widgets here to appear in shop page sidebar.', THEME_TD),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget' => '</section>',
		'before_title' => '<h2 class="widget-title">',
		'after_title' => '</h2>',
	],
	[
		'name' => __('Sidebar Single Tour', THEME_TD),
		'id' => 'sidebar-tour',
		'description' => __('Add widgets here to appear in shop page sidebar.', THEME_TD),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget' => '</section>',
		'before_title' => '<h2 class="widget-title">',
		'after_title' => '</h2>',
	]
];
