<?php

    /**
     * Woocommerce function for MBT custom purposes
     *
     * @package MBT
     */

    namespace MBT_THEME\Inc\Block;

    use App\Traits\Singleton;
    use Themosis\Support\Facades\Action;
    use WP_Query;

    /**
     * Project mybibletour-themosis
     * Author Steve
     * Class RegistrationBlock
     *
     * @package MBT_THEME\Inc\Block
     */
    class RegistrationBlock
    {
        use Singleton;

        const POST_NUMBER = 3;

        /**
         *  Constructor
         */
        public function __construct()
        {
            Action::add('acf/init', [$this, 'mbt_acf_init_block_types']);
        }

        /**
         * Display Tours as loop in Gutenberg block
         */
        public static function mbt_acf_block_virtual()
        {
            $post_per_page = get_field('post_per_page');
            $tour_category = get_field('category_tour');
            $languages     = get_field('languages');

            $args = [
                'post_type'      => 'product',
                'posts_per_page' => $post_per_page ?: self::POST_NUMBER,
                'product_cat'    => $tour_category && is_object($tour_category) ? $tour_category->slug : 'uncategorized',
                'product_tag'    => $languages ?: ['english'],
                'orderby'        => 'rand',
                'order'          => 'ASC',
            ];

            $loop = new WP_Query($args);

            echo view('blocks.virtual-loop')->with(compact('loop'));

            wp_reset_postdata();
        }

        public function mbt_acf_init_block_types()
        {
            // Check function exists.
            if (function_exists('acf_register_block_type')) :
                // register a testimonial block.
                acf_register_block_type(
                    [
                        'name'            => 'virtual-tours-loop',
                        'title'           => __('Custom Tours Loop', THEME_TD),
                        'description'     => __('A custom Block to display Tours', THEME_TD),
                        'render_callback' => [$this, 'mbt_acf_block_virtual'],
                        'category'        => 'formatting',
                        'icon'            => 'admin-comments',
                        'keywords'        => ['tour', 'loop'],
                    ]
                );
            endif;
        }
    }

    RegistrationBlock::get_instance();
