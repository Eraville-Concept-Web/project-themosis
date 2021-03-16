@if(isset($tour_category))
    @if(is_array($categories) && in_array(304, $categories) && $zoom_infos && is_array($zoom_infos))
        <div style="color: #fff; background-color:
    #a239ca; text-align: center; padding: 0.5rem; margin-top: 1rem; margin-bottom: 0.5rem">
            <h2 style="text-decoration: underline; text-align: center;">{{ __('Zoom in'), THEME_TD }}</h2>
            <p>{{ __('Meeting ID: '), THEME_TD}}{{ $zoom_infos['zoom_id'] }}</p>
            @if($zoom_pass)
                <p>{{ __('Meeting Password: '), THEME_TD}}{{ $zoom_pass ?: $zoom_infos['zoom_default_password'] }}</p>
            @endif
        </div>
    @endif

    @if(is_array($categories) && ! in_array(304, $categories))
        <div style="color: #fff; background-color:
    #a239ca; text-align: center; padding: 0.5rem; margin-top: 1rem; margin-bottom: 0.5rem">
            <h2 style="text-decoration: underline; text-align: center;">{{ __('Meeting point'), THEME_TD }}</h2>
            <p>{!! $meeting_point['meeting_point'] !!} </p>
        </div>
    @endif
@endif

<div style="border: 2px solid #232122; color: #232122; margin: 1rem 0; padding: 0.5rem;">
    <h2 style="color: #a239ca; text-align: center;">{{ __('Specific Tour Information'), THEME_TD }}</h2>
    @if(isset($booking))
        <p>{{ __('See the box “ Tour information ” to get all practical information related to your tour: '), THEME_TD  }}
            <span>
            <a href="{!! get_permalink( $booking->get_product_id() ) !!}"
               style="color: #a239ca;">{!! $booking->get_product()->get_name() !!}</a>
        </span>
            {{ __('Share this information with the members of your group only.'), THEME_TD }}
        </p>
    @endif
    @if(isset($contact_information, $email_information) && is_array($contact_information) && is_array
    ($email_information))
        <p>{{ __('Contact Guide : ') }}{{ $contact_information['guide_lastname']}} {{
    $contact_information['guide_firstname']}} ({{ $email_information['booking_email'] }})
        </p>
        <p>{{ __('If you wish to support our tours, or send a tip to your guide, you can donate through PayPal at '),
    THEME_TD}}<a href="mailto:{{ $email_information['tips_email'] }}"
                 style="color: #a239ca;">{{ $email_information['tips_email'] }}</a>
        </p>
    @endif
</div>


