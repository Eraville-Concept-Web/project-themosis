@php(do_action( 'generate_before_footer' ))

<footer>
    <div @php (generate_do_element_classes( 'footer' ))>
        @php (do_action( 'generate_before_footer_content' ))
        @php (do_action( 'generate_footer' ))
        @php (do_action( 'generate_after_footer_content' ))
    </div>
</footer>
@php (do_action( 'generate_after_footer' ))
@footer
</body>
</html>
