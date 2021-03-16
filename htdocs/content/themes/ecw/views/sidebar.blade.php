<div id="right-sidebar" @php (generate_do_element_classes( 'right_sidebar' ))>
    <div class="inside-right-sidebar">

        @php(do_action( 'generate_before_right_sidebar_content' ))

        @if ( ! dynamic_sidebar( 'sidebar-1' ) )
            @php(generate_do_default_sidebar_widgets( 'right-sidebar' ))
        @endif

        @php(do_action( 'generate_after_right_sidebar_content' ))

    </div>
</div>
