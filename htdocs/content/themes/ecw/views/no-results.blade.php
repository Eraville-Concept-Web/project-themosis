<div class="no-results not-found">
    <div class="inside-article">

        {{--		@hooked generate_featured_page_header_inside_single - 10--}}
        @php(do_action( 'generate_before_content' ))

        <header class="entry-header">
            <h1 class="entry-title">{{ __( 'Nothing Found', THEME_TD )  }}</h1>
        </header>

        {{--		@hooked generate_post_image - 10--}}
        @php(do_action( 'generate_after_entry_header' ))

        <div class="entry-content">

            @if ( is_home() && current_user_can( 'publish_posts' ) )

                <p>
                    {{
                        printf(
                        /* translators: 1: Admin URL */
                        __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', THEME_TD ),
                        esc_url( admin_url( 'post-new.php' ) )
                        )
                    }}
                </p>
            @elseif ( is_search() )

                <p>{{ __(
						'Sorry, but nothing matched your search terms. Please try again with some different keywords.',
						THEME_TD
					)}}</p>

                @php (get_search_form())

            @else

                <p>{{ __( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.',
                THEME_TD ) }}</p>

                @php (get_search_form())

            @endif
        </div>

        @php(do_action('generate_after_content'))

    </div>
</div>
