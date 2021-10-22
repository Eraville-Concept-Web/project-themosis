<article id="post-@php(the_ID())" @php(post_class()) @php(generate_do_microdata( 'article' ))>
    <div class="inside-article">
        {{--        @hooked generate_featured_page_header_inside_single - 10--}}
        @php(do_action( 'generate_before_content' ))

        @if ( generate_show_entry_header() )

            <header class="entry-header">

                {{--            generate_before_entry_title hook.÷--}}
                @php(do_action( 'generate_before_entry_title' ))

                @if ( generate_show_title() )
                    @php($params = generate_get_the_title_parameters())

                   @php(the_title( $params['before'], $params['after'] ))

                @endif

                {{--			@hooked generate_post_meta - 10--}}
                @php(do_action( 'generate_after_entry_title' ))

            </header>

        @endif

        {{--		@hooked generate_post_image - 10--}}
        @php(do_action( 'generate_after_entry_header' ))

        @php($itemprop = '')

        @if ( 'microdata' === generate_get_schema_type() )
            @php($itemprop = ' itemprop="text"')
        @endif

        @if ( generate_show_excerpt() )

            <div class="entry-summary"{{ $itemprop }} >
                {!!  Loop::excerpt()  !!}
            </div>
        @else

            <div class="entry-content"{{ $itemprop }}>
                {!! Loop::content() !!}
                @php(wp_link_pages(
                    array(
                        'before' => '<div class="page-links">' . __( 'Pages:', THEME_TD ),
                        'after'  => '</div>',
                    )
                ))

            </div>

        @endif

        {{--    @hooked generate_footer_meta - 10--}}
        @php(do_action( 'generate_after_entry_content' ))

        @php(do_action( 'generate_after_content' ))

    </div>
</article>
