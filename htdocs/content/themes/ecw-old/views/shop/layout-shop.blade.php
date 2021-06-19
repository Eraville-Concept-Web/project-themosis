@include('template-parts.header.header-shop')

<div id="page" @php(generate_do_element_classes( 'page', ['flex', 'flex-wrap'] ))>

    @php(do_action( 'generate_inside_site_container' ))

    @php(do_action( 'generate_inside_container' ))

    @yield('site-content')

    @php(do_action( 'generate_after_primary_content_area' ))

    @hasSection('sidebar-content')
        <aside class="sidebar-content">
            @yield('sidebar-content')
        </aside>
    @endif

</div>

@include('template-parts.footer.footer-shop')
