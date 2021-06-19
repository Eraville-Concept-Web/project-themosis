<?php

	use Themosis\Support\Facades\Filter;
	use Themosis\Support\Facades\Action;

	/**
	 * Add To: Recipient @ WooCommerce Completed Order Email
	 */
	function mbt_filter_woocommerce_email_recipient_id($email_recipient, $email_object, $email)
	{
		if ($email_object):
			//get Staff resource datas
			$staff_id = $email_object->get_resource_id();
			if ($staff_id && is_numeric($staff_id)):
				//Get staff Ressources Paypal Email
				$staff_emails = get_field('email_information', $staff_id);
				if ($staff_emails && is_array($staff_emails)):
					$booking_email = $staff_emails['booking_email'];
					//Populate Paypal email used to connect the right account
					$email_recipient = $booking_email ?? $email_recipient;
				endif;
			endif;
		endif;

		return $email_recipient;
	}

// add the filter
	Filter::add(
		"woocommerce_email_recipient_new_booking",
		'mbt_filter_woocommerce_email_recipient_id',
		9999,
		3
	);

	Filter::add(
		"woocommerce_email_recipient_admin_booking_cancelled",
		'mbt_filter_woocommerce_email_recipient_id',
		9999,
		3
	);

	/**
	 *  Add To: Recipient @ WooCommerce Completed Order Email
	 */
	function mbt_filter_woocommerce_email_new_order_recipient_id($email_recipient, $email_object, $email)
	{
		if ($email_object && is_object($email_object)):
			$order_id = $email_object->get_id();
			$booking_ids = WC_Booking_Data_Store::get_booking_ids_from_order_id($order_id);
			if ($booking_ids && is_array($booking_ids)):
				$booking = get_wc_booking($booking_ids[0]);
			endif;

			if (isset($booking) && is_object($booking)):
				//get Staff resource datas
				$staff_id = $booking->get_resource_id();
				if ($staff_id && is_numeric($staff_id)):
					//Get staff Ressources Paypal Email
					$staff_emails = get_field('email_information', $staff_id);
					if ($staff_emails && is_array($staff_emails)):
						$booking_email = $staff_emails['booking_email'];
						//Populate Paypal email used to connect the right account;
						$email_recipient = $booking_email ?? $email_recipient;
					endif;
				endif;
			endif;
		endif;

		return $email_recipient;
	}

	Filter::add(
		"woocommerce_email_recipient_new_order",
		'mbt_filter_woocommerce_email_new_order_recipient_id',
		9999,
		3
	);

