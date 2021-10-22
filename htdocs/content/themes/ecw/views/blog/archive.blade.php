<x-layout>
    <div id="primary" @php (generate_do_element_classes( 'content', ['pt-12'] ))>
        <main id="main" @php (generate_do_element_classes( 'main'))>
            @php(do_action( 'generate_before_main_content' ))

            @if ( generate_has_default_loop() )
                @if ( have_posts() )

                    @php(do_action( 'generate_archive_title' ))

                    @while ( have_posts() )

                        @php(the_post())

                        @php(do_action( 'generate_before_do_template_part', 'archive' ))

                        @if(false === has_action(  'generate_before_do_template_part'))
                            @template('template-parts.content.content', 'blog')
                        @endif

                        @php(do_action( 'generate_after_do_template_part', 'archive' ))
                    @endwhile


                    @php(do_action( 'generate_after_loop', 'archive' ))


                @else
                            @template('template-parts.content.content', 'none')
                @endif
            @endif
            @php(do_action( 'generate_after_main_content' ))
        </main>
    </div>

    @php(do_action( 'generate_after_primary_content_area' ))
    @php(generate_construct_sidebars())
</x-layout>

