@if ( ! function_exists( 'elementor_theme_do_location' ))
    </div>
</div>
    @php(do_action( 'generate_before_footer' ))

    <div @php (generate_do_element_classes( 'footer' ))>
        @php (do_action( 'generate_before_footer_content' ))
        @php (do_action( 'generate_footer' ))
        @php (do_action( 'generate_after_footer_content' ))
    </div>

    @php (do_action( 'generate_after_footer' ))
@endif
@footer
</body>
</html>
