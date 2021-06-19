{{--The template for displaying search forms in Generate--}}
<form method="get" class="search-form" action="{{ esc_url( home_url( '/' ) ) }}">
    <label>
		<span class="screen-reader-text">{{ apply_filters( 'generate_search_label', _x( 'Search for:', 'label', THEME_TD
		 ) ) }}</span>
        <input type="search" class="search-field" placeholder="{{ esc_attr( apply_filters(
		'generate_search_placeholder', _x( 'Search &hellip;', 'placeholder', THEME_TD ) ) ) }}"
               value="{{ esc_attr(	get_search_query() ) }}"
               name="s"
               title="{{ esc_attr( apply_filters( 'generate_search_label', _x( 'Search for:', 'label', THEME_TD ) ) )
			   }}">
    </label>

    @if ( generate_is_using_flexbox() )
        @php(printf(
            '<button class="search-submit" aria-label="%1$s">%2$s</button>',
            esc_attr( apply_filters( 'generate_search_button', _x( 'Search', 'submit button', THEME_TD ) ) ),
            generate_get_svg_icon( 'search' )
        ))
    @else
        @php(printf(
            '<input type="submit" class="search-submit" value="%s">',
            apply_filters( 'generate_search_button', _x( 'Search', 'submit button', THEME_TD ) )
        ))
    @endif
</form>
