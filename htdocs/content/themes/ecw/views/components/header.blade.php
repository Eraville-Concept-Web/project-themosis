<!DOCTYPE html>
<html {!! get_language_attributes(); !!}>
@php($theme = app('wp.theme'))
<head>
    <meta charset="{{ get_bloginfo('charset') }}"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <link rel="profile" href="https://gmpg.org/xfn/11"/>
    <link rel="apple-touch-icon" sizes="180x180" href="{{ $theme->getUrl('dist/img/favicon/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ $theme->getUrl('dist/img/favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ $theme->getUrl('dist/img/favicon/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ $theme->getUrl('dist/img/favicon/site.webmanifest') }}">
    <link rel="mask-icon" href="{{ $theme->getUrl('dist/img/favicon/safari-pinned-tab.svg') }}" color="#2596be">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#a239ca">
    @yield('header')
    @head
</head>
<body @php (body_class()) @php (generate_do_microdata( 'body' ))>

@if ( ! function_exists( 'elementor_theme_do_location' ) || ! elementor_theme_do_location( 'header' ) )
    {{--* @hooked generate_do_skip_to_content_link - 2--}}
    {{--* @hooked generate_top_bar - 5--}}
    {{--* @hooked generate_add_navigation_before_header - 5--}}
    @php(do_action( 'generate_before_header' ))

    {{--@hooked generate_construct_header - 10--}}
    @php(do_action( 'generate_header' ))

    {{--@hooked generate_featured_page_header - 10--}}
    @php(do_action( 'generate_after_header' ))

    <div id="page" @php(generate_do_element_classes( 'page'))>

        @php(do_action( 'generate_inside_site_container' ))
        <div id="content" class="site-content">

@php(do_action( 'generate_inside_container' ))
@endif

