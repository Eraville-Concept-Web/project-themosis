<x-layout>
    <div id="primary" @php (generate_do_element_classes( 'content', ['pt-12'] ))>
        <main id="main" @php (generate_do_element_classes( 'main'))>

            @php(do_action( 'generate_before_main_content' ))
            @php(do_action( 'generate_before_do_template_part', '404' ))

            @if(false === has_action(  'generate_before_do_template_part'))
                @template('template-parts.content.content', '404')
            @endif

            @php(do_action( 'generate_after_do_template_part', '404' ))

            @php(do_action( 'generate_after_main_content' ))

        </main>
    </div>
    @php(do_action( 'generate_after_primary_content_area' ))

    @php(generate_construct_sidebars())

</x-layout>
