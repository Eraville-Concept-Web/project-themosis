@extends('layouts.main')

@section('site-content')

    @php(do_action( 'generate_before_main_content' ))

    @if ( generate_has_default_loop() )
        @if ( have_posts() )
            <header class="page-header">
                <h1 class="page-title">
                    @php(printf(
								/* translators: 1: Search query name */
								__( 'Search Results for: %s', 'generatepress' ),
								'<span>' . get_search_query() . '</span>'
							))
                </h1>
            </header>
            @while(have_posts())
                @php(the_post())

                {{--
                  Include the Post-Format-specific template for the content.
                  If you want to override this in a child theme, then include a file
                  called content-___.php (where ___ is the Post Format name) and that will be used instead.
                  --}}
                @template('template-parts.content.content', 'search')
            @endwhile

            @php(do_action( 'generate_after_loop', 'search' ))
        @else

            @template('no-results')

        @endif
    @endif
    @php( do_action( 'generate_after_main_content' ))

    @php (do_action( 'generate_after_primary_content_area' ))

    {{--      @php(generate_construct_sidebars())--}}
@endsection
