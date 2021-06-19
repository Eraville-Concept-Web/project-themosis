@extends('layouts.main')

@section('site-content')
    <div id="primary" @php (generate_do_element_classes( 'content' ))>
        <main id="main" @php (generate_do_element_classes( 'main' ))>
            @php (do_action( 'generate_before_main_content' ))
            @if ( generate_has_default_loop())
                @if ( have_posts() )
                    @while(have_posts())
                        @php(the_post())

                        @template('template-parts.content.content', 'page')

                    @endwhile
                @endif
            @endif
            @php (do_action( 'generate_after_main_content' ))
        </main>
    </div>
    @php (do_action( 'generate_after_primary_content_area' ))
@endsection
