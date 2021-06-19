@extends('layouts.main')

@section('site-content')
    <div id="primary" @php (generate_do_element_classes( 'content' ))>
        <main id="main" @php (generate_do_element_classes( 'main' ))>
            @php(do_action( 'generate_before_main_content' ))

            @if ( generate_has_default_loop() )

                @while ( have_posts() )
                    @php(the_post())
                    @php(do_action( 'generate_before_do_template_part', 'single' ))
                    @if(false === has_action(  'generate_before_do_template_part'))
                        @template('template-parts.content.content', 'single')
                    @endif
                    @php(do_action( 'generate_after_do_template_part', 'single' ))
                @endwhile
            @endif
            @php(do_action( 'generate_after_main_content' ))
        </main>
    </div>

    @php(do_action( 'generate_after_primary_content_area' ))
    @php(generate_construct_sidebars())
@endsection
