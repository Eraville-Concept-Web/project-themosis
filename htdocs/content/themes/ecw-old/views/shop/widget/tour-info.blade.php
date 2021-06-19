{!! $args['before_widget'] !!}

@if ( ! empty( $instance['title'] ) )
    {!! $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'] !!}
@endif

<div class="tour-info">
    @php($tour_id = Loop::id())

    <ul class="list-disc">
            <li><i class="fas fa-book"></i>
                <strong>{{ __('Tour reference: ', THEME_TD) }}</strong>
                {{ get_field ('reference_du_tour',$tour_id) ?: ''}}
            </li>
            <li><i class="fas fa-clock"></i>
                <strong>{{ __('Duration: ', THEME_TD) }}</strong>
                {{ get_field('duration', $tour_id) ?: '' }}
            </li>
            <li><i class="fas fa-euro-sign"></i>
                <strong>{{ __('Price: ', THEME_TD) }}</strong>
                {{ get_field('prix', $tour_id) ? get_field('prix', $tour_id) . '€' :'-' }}
                {{ __(' per adult', THEME_TD) }}
            </li>
            <li><i class="fas fa-euro-sign"></i>
                <strong>{{ __('Price: ', THEME_TD) }}</strong>
                {{ get_field('sfts_price', $tour_id) ? get_field('sfts_price', $tour_id) . '€' : '-' }}
                {{ __(' per special full time servant', THEME_TD) }}
            </li>
            <li><i class="fas fa-euro-sign"></i>
                <strong>{{ __('Price: ', THEME_TD)}}</strong>
                {{ get_field('prix_enfant', $tour_id) ? get_field('prix_enfant', $tour_id) . '€' : '-' }}
                {{ __(' per child', THEME_TD)}}
            </li>
        @if(get_field('langages_tags', $tour_id))
            <li><i class="fas fa-language"></i>
                <strong>{{ __('Languages', THEME_TD) }}</strong>
                @php($language_tags = get_field('langages_tags', $tour_id))
                @if(! empty($language_tags) && is_array($language_tags))
                    <ul class="list-disc">
                        @foreach($language_tags as $language)
                            <li><i class="fas fa-arrow-circle-right"></i> {{ $language->name }}</li>
                        @endforeach
                    </ul>
                @endif
            </li>
        @endif
    </ul>
</div>

{!!  $args['after_widget'] !!}
