@include('template-parts.header.header')

<div id="page" @php(generate_do_element_classes( 'page', 'max-w-full' ))>
    @php(do_action( 'generate_inside_site_container' ))
    <div id="content" class="site-content flex">
        @php(do_action( 'generate_inside_container' ))

            @yield('site-content')

        @php(do_action( 'generate_after_primary_content_area' ))

        @hasSection('sidebar-content')
            <aside class="sidebar-content">
                @yield('sidebar-content')
            </aside>
        @endif
    </div>
</div>

@include('template-parts.footer.footer')
