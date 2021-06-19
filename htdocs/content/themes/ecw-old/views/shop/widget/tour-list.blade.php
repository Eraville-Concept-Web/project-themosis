{!! $args['before_widget'] !!}

@if ( ! empty( $instance['title'] ) )
    {!! $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'] !!}
@endif

<div id='calendar-list'></div>

{!!  $args['after_widget'] !!}
