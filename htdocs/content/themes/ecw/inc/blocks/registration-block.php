<?php

    /**
     * Woocommerce function for MBT custom purposes
     *
     * @package MBT
     */

    namespace UGES_THEME\Inc\Block;

    use App\Traits\Singleton;
    use Themosis\Support\Facades\Action;
    use WP_Query;

    /**
     * Project mybibletour-themosis
     * Author Steve
     * Class RegistrationBlock
     *
     * @package UGES_THEME\Inc\Block
     */
    class RegistrationBlock
    {
        use Singleton;

        /**
         *  Constructor
         */
        public function __construct()
        {
            Action::add('acf/init', [$this, 'uges_acf_init_block_types']);
        }

        /**
         * Display Tours as loop in Gutenberg block
         */
        public static function uges_acf_author_social_links()
        {
			$author_meta_twitter = get_the_author_meta('liens_twitter');
			$author_meta_linkedin = get_the_author_meta('liens_linkedin');

            echo view('blocks.author-social-links')
	            ->with(compact('author_meta_twitter', 'author_meta_linkedin'));

        }

        public function uges_acf_init_block_types()
        {
            // Check function exists.
            if (function_exists('acf_register_block_type')) :
                // register a testimonial block.
                acf_register_block_type(
                    [
                        'name'            => 'author-social-links',
                        'title'           => __('Author Social Links', THEME_TD),
                        'description'     => __('A custom Block to author social links', THEME_TD),
                        'render_callback' => [$this, 'uges_acf_author_social_links'],
                        'category'        => 'formatting',
                        'icon'            => 'admin-comments',
                        'keywords'        => ['social', 'author'],
                    ]
                );
            endif;
        }
    }

    RegistrationBlock::get_instance();
