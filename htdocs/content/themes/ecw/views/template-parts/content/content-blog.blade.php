<article id="post-{{ get_the_ID() }}" {!! post_class() !!} {!! generate_do_microdata( 'article' ) !!}>
    <div class="inside-article">
        {{--        @hooked generate_featured_page_header_inside_single - 10--}}
        @php(do_action( 'generate_before_content' ))

        @if ( generate_show_entry_header() )

            <header class="entry-header">
                @php(do_action( 'generate_before_page_title' ))

                @if ( generate_show_title() )

                    @php($params = generate_get_the_title_parameters())
                    {{ Loop::title( $params['before'], $params['after'] ) }}

                @endif

                @php(do_action( 'generate_after_page_title' ))
            </header>

        @endif

        {{--        @hooked generate_post_image - 10--}}
        @php(do_action( 'generate_after_entry_header' ))

        @php ($itemprop = '')

        @if ( 'microdata' === generate_get_schema_type() )
            @php($itemprop = ' itemprop="text"')
        @endif

        <div class="entry-content"{{$itemprop}}>
            {!! Loop::excerpt() !!}
            {!! wp_link_pages([
                'before' => '<div class="page-links">' . __('Pages:', THEME_TD),
                'after' => '</div>',
            ]) !!}
        </div>

        @php(do_action('generate_after_content'))

    </div>
</article>
