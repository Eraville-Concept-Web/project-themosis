<?php

    namespace App\Hooks;

    use Themosis\Hook\Hookable;
    use Themosis\Support\Facades\Action;
    use Themosis\Support\Facades\Filter;

    /**
     * Project mybibletour-themosis
     * Author Steve
     * Class Notification
     *
     * @package App\Hooks
     */
    class Notification extends Hookable
    {

        /**
         * Extend WordPress.
         */
        public function register()
        {
            Filter::add(
                'send_password_change_email',
                '__return_false'
            );

	        /* Disable Admin Password Change Notification */
	        Action::remove('after_password_reset',
		        'wp_password_change_notification');
            /**
			 * Disable User Notification of Password Change Confirmation
			 */
            Filter::add(
                'send_email_change_email',
                '__return_false'
            );

	        if ( !function_exists( 'wp_password_change_notification' ) ) {
		        function wp_password_change_notification() {}
	        }

	        if (class_exists('WooCommerce')) :
                Filter::add(
                    'woocommerce_disable_password_change_notification',
                    '__return_false'
                );
            endif;

	        Action::remove( 'register_new_user', 'wp_send_new_user_notifications', 10 );
	        Action::remove( 'edit_user_created_user', 'wp_send_new_user_notifications', 10 );
        }
    }
