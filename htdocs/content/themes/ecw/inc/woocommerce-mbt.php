<?php

	/**
	 * Woocommerce function for MBT custom purposes
	 *
	 * @package MBT
	 */

	namespace MBT_THEME\Inc;

	use App\Traits\Singleton;
	use DateTime;
	use Themosis\Support\Facades\Action;
	use Themosis\Support\Facades\Filter;
	use WC_Booking_Data_Store;

	/**
	 * Project mybibletour-themosis
	 * Author Steve
	 * Class Woocommerce_Mbt
	 *
	 * @package MBT_THEME\Inc
	 */
	class Woocommerce_Mbt {

		use Singleton;

		/**
		 *  Constructor
		 */
		protected function __construct() {
			$this->load_actions();
			$this->load_filters();
		}

		/**
		 * Load Actions
		 */
		protected function load_actions(): void {
			Action::remove( 'init', [ 'WC_Template_Loader', 'init' ], 10 );
			if ( class_exists( 'WooCommerce' ) ) :
				Action::remove('woocommerce_single_product_summary', 'woocommerce_template_single_title', 5);
				Action::remove('woocommerce_before_single_product_summary', 'woocommerce_show_product_images', 20);
				Action::remove('woocommerce_single_product_summary', 'woocommerce_template_single_price', 10);
				Action::remove('woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20);
				Action::remove('woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10);
				Action::add('admin_head', function () {
					Action::remove('admin_notices', 'nb_cpf_seobuddy_notice');
				}
				);
				Action::remove( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10 );
				Action::add( 'mbt_add_info_bottom_email', [ $this, 'mbt_customize_text_confirmation_email' ], 10, 1 );
				Action::add(
					'woocommerce_shop_loop_item_title',
					[
						$this,
						'mbt_woocommerce_template_loop_product_title',
					],
					20
				);
			endif;
		}

		/**
		 *  Load Filters
		 */
		protected function load_filters(): void {
			Filter::add( 'wc_bookings_get_time_slots_html', [ $this, 'mbt_display_remaining_places' ], 10, 3 );
			Filter::add( 'woocommerce_gateway_icon', [ $this, 'mbt_remove_what_is_paypal' ], 10, 2 );
			Filter::add( 'woocommerce_email_subject_customer_completed_order', [
				$this,
				'filter_new_order_subject_email',
			], 1, 2 );
			Filter::add( 'woocommerce_email_subject_booking_confirmed', [
				$this,
				'filter_customer_booking_confirmed_subject_email',
			], 1, 2 );
			Filter::add( 'woocommerce_email_heading_booking_confirmed', [
				$this,
				'filter_customer_booking_confirmed_heading_email',
			], 1, 2 );
			Filter::add( 'woocommerce_email_heading_customer_completed_order', [
				$this,
				'filter_customer_booking_confirmed_heading_email',
			], 1, 2 );
		}


		/**
		 * Add additional information at the Bottom of the email
		 *
		 * @param $booking
		 */
		public static function mbt_customize_text_confirmation_email( $booking ): void {
			$id_product = $booking->get_product_id();

			if ( $id_product ) :
				//Get tour Category
				$term_list = wp_get_post_terms( $id_product, 'product_cat', [ 'fields' => 'ids' ] );
				if ( $term_list ) :
					$cat_id        = (int) $term_list[0];
					$term          = get_term( $cat_id, 'product_cat' );
					$tour_category = $term->slug ?: '';
					$categories    = pll_get_term_translations( $cat_id );

					//Get needed variable to display
					$resource_id = $booking->get_resource_id();
					if ( $resource_id ) :
						$contact_information = get_field( 'contact_information', $resource_id );
						$email_information   = get_field( 'email_information', $resource_id );
						$meeting_point       = get_field( 'physical_tours', $resource_id );
						$zoom_pass           = $booking->get_start();
						$zoom_infos          = get_field( 'virtual_tours', $resource_id );
					endif;

					echo view( 'emails.additional-information' )->with(
						compact(
							'booking',
							'tour_category',
							'categories',
							'zoom_infos',
							'contact_information',
							'email_information',
							'meeting_point',
							'zoom_pass'
						)
					);
				endif;
			endif;
		}

		/**
		 * Display remaining place in the block in calendar view
		 *
		 * @param $block_html
		 * @param $available_blocks
		 * @param $blocks
		 *
		 * @return mixed|string
		 */
		public static function mbt_display_remaining_places( $block_html, $available_blocks, $blocks ) {
			$block_html = '';
			if ( $available_blocks && is_array( $available_blocks ) ) :
				foreach ( $available_blocks as $block => $quantity ) :
					if ( $quantity['available'] > 0 ) :
						if ( $quantity['booked'] ) :
							/* translators: 1: quantity available */
							$block_html .= view( 'shop.available-place' )
								->with( compact( 'block', 'quantity' ) );
						else:
							$block_html .= view( 'shop.available-place-remaining' )
								->with( compact( 'block' ) );
						endif;
					endif;
				endforeach;
			endif;

			return $block_html;
		}

		/**
		 * Format the title of tours on shop page
		 */
		public static function mbt_woocommerce_template_loop_product_title(): void {
			echo view( 'shop.partials.loop-product-title' );
		}

		/**
		 * Calculate the duration of the tour
		 *
		 * @param $booking
		 *
		 * @return string
		 */
		public static function mbt_get_time_duration( $booking ): string {
			$duration = '';
			if ( $booking ) :
				$ts1 = $booking->get_end();
				$ts2 = $booking->get_start();
				if ( $ts1 && $ts2 && is_numeric( $ts1 ) && is_numeric( $ts2 ) ) :
					$time_diff = $ts1 - $ts2;
					if ( $time_diff && is_numeric( $time_diff ) ) :
						$date     = new DateTime( "@$time_diff" );
						$duration = $date->format( 'H:i' );

						return $duration;
					endif;
				endif;
			endif;

			return $duration;
		}

		/**
		 * Add rows of meta datas in order table in emails confirmation
		 *
		 * @param $order
		 */
		public static function mbt_display_item_meta_data( $order ): void {
			if ( $order->get_items() && is_array( $order->get_items() ) ) :
				foreach ( $order->get_items() as $item_id => $item ) :
					$allmetas = $item->get_meta_data();
					if ( $allmetas ) :
						echo view( 'emails.order-metadatas' )->with( compact( 'allmetas' ) );
					endif;
				endforeach;
			endif;
		}

		/**
		 * Replace and add text to Paypal section on checkout page
		 *
		 * @param $icon_html
		 * @param $gateway_id
		 *
		 * @return string
		 */
		public static function mbt_remove_what_is_paypal( $icon_html, $gateway_id ): string {
			if ( 'paypal' == $gateway_id ) {
				$icon_html = view( 'shop.checkout.paypal' )->with(
					[
						'gateway_id' => $gateway_id,
					]
				);
			}

			return $icon_html;
		}

		/**
		 * Add Custom Headers to emails
		 *
		 * @param $email_heading
		 * @param $email
		 */
		public static function emails_header( $email_heading, $email ) {
			echo view( 'emails.email-header', compact( 'email_heading', 'email' ) );
		}

		/**
		 * Filter New Order Subject Email
		 *
		 * @param $subject
		 *
		 * @return string
		 */
		public static function filter_new_order_subject_email( $subject, $order ): string {

			$blogname    = wp_specialchars_decode( get_option( 'blogname' ), ENT_QUOTES );
			$order_id    = $order->get_id();
			$booking_ids = WC_Booking_Data_Store::get_booking_ids_from_order_id( $order_id );
			if ( ! empty( $booking_ids ) && is_array( $booking_ids ) ):
				$booking = get_wc_booking( reset( $booking_ids ) );
			endif;
			$booking_start_date = $booking->get_start_date( null,
				null,
				wc_should_convert_timezone( $booking ) );

			$subject = sprintf( '[%s] - %s (# %s) - %s',
				$blogname,
				__( 'Confirmation Booking for order', THEME_TD ),
				$order_id,
				$booking_start_date
			);

			return $subject;
		}

		/**
		 * Filter New Order Subject Email
		 *
		 * @param $subject
		 *
		 * @return string
		 */
		public static function filter_customer_booking_confirmed_subject_email( $subject, $order ): string {

			$blogname    = wp_specialchars_decode( get_option( 'blogname' ), ENT_QUOTES );
			$order_id    = $order->get_id();
			$booking_ids = WC_Booking_Data_Store::get_booking_ids_from_order_id( $order_id );
			if ( ! empty( $booking_ids ) && is_array( $booking_ids ) ):
				$booking            = get_wc_booking( reset( $booking_ids ) );
				$booking_start_date = $booking->get_start_date( null,
					null,
					wc_should_convert_timezone( $booking ) );

				$subject = sprintf( '[%s] - %s (# %s) - %s',
					$blogname,
					__( 'Confirmation Booking for order', THEME_TD ),
					$order_id,
					$booking_start_date
				);
			else:
				$subject = sprintf( '[%s] - %s (# %s)',
					$blogname,
					__( 'Confirmation Booking for order', THEME_TD ),
					$order_id
				);

			endif;

			return $subject;
		}

/**
		 * Filter New Order Subject Email
		 *
		 * @param $heading
		 * @param $object
		 *
		 * @return string
		 */
		public static function filter_customer_booking_confirmed_heading_email( $heading, $object ): string {

			$heading = __('Booking confirmed !', THEME_TD);

			return $heading;
		}

	}

	Woocommerce_Mbt::get_instance();
