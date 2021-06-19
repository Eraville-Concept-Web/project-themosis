@if(isset($block))
    <li class="block" data-block="{{ esc_attr(date('Hi', $block)) }}">
        <a href="#" data-value="{{ get_time_as_iso8601($block) }}">
            {{ date_i18n(wc_bookings_time_format() , $block) }}
        </a>
        <span class="font-bold block"></span>
    </li>
@endif