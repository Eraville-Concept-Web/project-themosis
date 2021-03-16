<div class="inside-article fallback-page m-auto">

    {{--    @hooked generate_featured_page_header_inside_single - 10--}}
    @php(do_action( 'generate_before_content' ))

    <header class="entry-header">
        <h1 class="entry-title"
            itemprop="headline">{{ apply_filters( 'generate_404_title', __( 'Oops! That page can&rsquo;t be found.', THEME_TD ) )  }}
        </h1>
    </header>

    {{--    @hooked generate_post_image - 10--}}
    @php(do_action('generate_after_entry_header'))

    @php($itemprop = '')

    @if ('microdata' === generate_get_schema_type())
        @php($itemprop = ' itemprop="text"')
    @endif

    <div class="entry-content" {{ $itemprop }}>
        @php(printf(
			'<p>%s</p>',
			apply_filters(
				'generate_404_text',
				__('It looks like nothing was found at this location. Maybe try searching?', THEME_TD)
			)
		))

    </div>

    @php(do_action('generate_after_content'))

</div>
