@if(isset($block, $quantity))
    <li class="block" data-block="{{ esc_attr(date('Hi', $block)) }}"
        data-remaining="{{ esc_attr($quantity['available']) }}">
        <a href="#" data-value="{{ get_time_as_iso8601($block) }}">
            {{ date_i18n(wc_bookings_time_format() , $block) }}
        </a>
        <span class="font-bold block">
{!! sprintf(_n('%d left', '%d left', $quantity['available'], 'THEME_TD'),
        absint($quantity['available']) ) !!}
    </span>
    </li>
@endif
