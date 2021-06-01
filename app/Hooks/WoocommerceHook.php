<?php

    namespace App\Hooks;

    use ActionScheduler;
    use Themosis\Hook\Hookable;
    use Themosis\Support\Facades\Action;
    use Themosis\Support\Facades\Filter;

    /**
     * Project mybibletour-themosis
     * Author Steve
     * Class WoocommerceHook
     * @package App\Hooks
     */
    class WoocommerceHook extends Hookable {

        /**
         * @var string
         */
        public $hook = 'init';

        /**
         * @param $related_posts
         * @param $product_id
         * @param $args
         *
         * @return array
         */
        public static function alter_related_products_query( $related_posts, $product_id, $args ): array {
            $terms = get_the_terms( $product_id, 'product_cat' );

            $related_posts = get_posts(
                    [
                            'post_type'      => 'product',
                            'post_status'    => 'publish',
                            'posts_per_page' => 3,
                            'exclude'        => [ $product_id ],
                            'orderby'        => 'menu_order',
                            'fields'         => 'ids',
                            'tax_query'      => [
                                    [
                                            'taxonomy' => 'product_cat',
                                            'field'    => 'slug',
                                            'terms'    => $terms ? $terms[0]->slug : '',
                                    ],
                            ],
                    ]
            );

            return $related_posts;
        }

        /**
         * Empty cart automatically after session expiration
         *
         * @return float|int
         */
        public static function empty_cart_automatically_expiring() {
            return 60 * 60 * 1;
        }

        /**
         * Empty cart automatically after session expiration
         *
         * @return float|int
         */
        public static function empty_cart_automatically_expiration() {
            return 60 * 60 * 1;
        }

        /**
         * Dequeue Woocommerce useless scripts
         */
        public function dequeue_woocommerce_styles_scripts() {
            if ( ! is_woocommerce()
                 && ! is_cart()
                 && ! is_checkout()
                 && ! is_account_page()
                 && ! is_wc_endpoint_url() ) :
# Styles
                wp_dequeue_style( 'woocommerce-layout' );
                wp_dequeue_style( 'woocommerce-smallscreen' );
                wp_dequeue_style( 'woocommerce_frontend_styles' );
                wp_dequeue_style( 'woocommerce_fancybox_styles' );
                wp_dequeue_style( 'woocommerce_chosen_styles' );
                wp_dequeue_style( 'woocommerce_prettyPhoto_css' );
                # Scripts
                wp_dequeue_script( 'wc_price_slider' );
                wp_dequeue_script( 'wc-single-product' );
                wp_dequeue_script( 'wc-add-to-cart' );
                if ( is_front_page() || is_single() ) :
                    wp_dequeue_script( 'wc-cart-fragments' );
                endif;
                wp_dequeue_script( 'wc-checkout' );
                wp_dequeue_script( 'wc-add-to-cart-variation' );
                wp_dequeue_script( 'wc-single-product' );
                wp_dequeue_script( 'wc-cart' );
                wp_dequeue_script( 'wc-chosen' );
                wp_dequeue_script( 'woocommerce' );
                wp_dequeue_script( 'prettyPhoto' );
                wp_dequeue_script( 'prettyPhoto-init' );
                wp_dequeue_script( 'jquery-blockui' );
                wp_dequeue_script( 'jquery-placeholder' );
                wp_dequeue_script( 'fancybox' );
                wp_dequeue_script( 'jqueryui' );
                if ( ! is_front_page() ) :
                    wp_dequeue_style( 'woocommerce-general' );
                endif;
            endif;
        }

        /**
         * Stop Heartbeat
         */
        public function stop_heartbeat() {
            wp_deregister_script( 'heartbeat' );
        }

        /**
         * Extend WordPress.
         */
        public function register() {
            if ( config( 'app.env' ) !== 'production' ) :
                if ( class_exists( 'ActionScheduler' ) ) {
                    remove_action( 'action_scheduler_run_queue',
                            [ ActionScheduler::runner(), 'run' ] );
                }
            endif;

            if ( class_exists( 'WooCommerce' ) ) :

                Filter::add(
                        'woocommerce_related_products',
                        [ $this, 'alter_related_products_query' ],
                        9999,
                        3
                );
                Filter::add( 'wc_session_expiring', [ $this, 'empty_cart_automatically_expiring' ] );
                Filter::add( 'wc_session_expiration', [ $this, 'empty_cart_automatically_expiration' ] );

                /** Disable Ajax Call from WooCommerce */
                Action::add( 'wp_enqueue_scripts', [ $this, 'dequeue_woocommerce_cart_fragments' ], 11 );

                /** Disable All WooCommerce  Styles and Scripts Except Shop Pages*/
                Action::add( 'wp_enqueue_scripts', [ $this, 'dequeue_woocommerce_styles_scripts' ], 99 );
                Action::add( 'init', [ $this, 'stop_heartbeat' ], 1 );
            endif;
        }
    }
