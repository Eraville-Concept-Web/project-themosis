@php(\MBT_THEME\Inc\Woocommerce_Mbt::emails_header($email_heading, $email))

@if (!empty($first_name) && !empty($last_name))
    <p>{{ esc_html(sprintf($opening_paragraph, $first_name . ' ' . $last_name)) }}</p>
@endif

<table cellspacing="0" cellpadding="6" style="width: 100%; border: 1px solid #eee;" border="1" bordercolor="#eee">
    <tbody>
    <tr>
        <th scope="row" style="text-align:left; border: 1px solid #eee;">
            {{ esc_html('Tour', 'THEME_TD') }}
        </th>
        <td style="text-align:left; border: 1px solid #eee;">
            {{ esc_html(get_field('tour_main_title', $booking->get_product()->get_id()) ? : $booking->get_product()->get_title()) }}
        </td>
    </tr>
    <tr>
        <th scope="row" style="text-align:left; border: 1px solid #eee;">
            {{ esc_html('Reference', 'THEME_TD') }}
        </th>
        <td style="text-align:left; border: 1px solid #eee;">
            {{ esc_html($booking->get_product()->get_title()) }}
        </td>
    </tr>
    <tr>
        <th style="text-align:left; border: 1px solid #eee;" scope="row">
            {{ esc_html('Booking ID', 'THEME_TD') }}
        </th>
        <td style="text-align:left; border: 1px solid #eee;">
            {{ esc_html($booking->get_id()) }}
        </td>
    </tr>

    @if ($booking->has_resources() && $resource)
        <tr>
            <th style="text-align:left; border: 1px solid #eee;" scope="row">
                {{ ('' !== $resource_label) ? esc_html($resource_label) : esc_html(
                    'Booking Type',
                    'THEME_TD'
                ) }}
            </th>
            <td style="text-align:left; border: 1px solid #eee;">
                {{ esc_html($resource->post_title) }}
            </td>
        </tr>
    @endif
    <tr>
        <th style="text-align:left; border: 1px solid #eee;" scope="row">
            {{ esc_html('Booking Start Date', 'THEME_TD') }}
        </th>
        <td style="text-align:left; border: 1px solid #eee;">
            {{ esc_html($booking->get_start_date(NULL, NULL, wc_should_convert_timezone($booking))) }}
        </td>
    </tr>
    <tr>
        <th style="text-align:left; border: 1px solid #eee;" scope="row">
            {{ esc_html('Duration', 'THEME_TD') }}
        </th>
        <td style="text-align:left; border: 1px solid #eee;">
            {{ \MBT_THEME\Inc\Woocommerce_Mbt::mbt_get_time_duration($booking) }}
        </td>
    </tr>

    @if (wc_should_convert_timezone($booking))
        <tr>
            <th style="text-align:left; border: 1px solid #eee;" scope="row">
                {{ esc_html('Time Zone', 'THEME_TD') }}
            </th>
            <td style="text-align:left; border: 1px solid #eee;">
                {{ esc_html(str_replace('_', ' ', $booking->get_local_timezone())) }}
            </td>
        </tr>
    @endif

    @if ($booking->has_persons())

        @foreach ($booking->get_persons() as $id => $qty)
            @if (0 === $qty)
                continue;
            @endif

            @php($person_type = (0 < $id) ? get_the_title($id) : __('Person(s)', 'THEME_TD'))

            <tr>
                <th style="text-align:left; border: 1px solid #eee;" scope="row">
                    {{ esc_html($person_type) }}
                </th>
                <td style="text-align:left; border: 1px solid #eee;">
                    {{ esc_html($qty) }}
                </td>
            </tr>
        @endforeach
    @endif

    @php(\MBT_THEME\Inc\Woocommerce_Mbt::mbt_display_item_meta_data($order))

    </tbody>
</table>

@php(do_action('mbt_add_info_bottom_email', $booking))

@if (wc_booking_order_requires_confirmation($booking->get_order()) && $booking->get_status(
) === 'pending-confirmation')
    <p>
        {{ esc_html(
            'This booking is awaiting your approval. Please check it and inform the customer if the date is available or not.',
            'THEME_TD'
        ) }}
    </p>
@endif

<p>
    {!! wp_kses_post(
		make_clickable(
			sprintf(
				__('You can view and edit this booking in the dashboard here: %s', 'THEME_TD'),
				admin_url('post.php?post=' . $booking->get_id() . '&action=edit')
			)
		)
	)  !!}
</p>

@php(do_action('woocommerce_email_footer'))
