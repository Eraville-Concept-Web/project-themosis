<!DOCTYPE html>
<html {!! get_language_attributes(); !!}>
<head>
    <meta charset="{{ get_bloginfo('charset') }}"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <link rel="profile" href="https://gmpg.org/xfn/11"/>
    @yield('header')
    @head
</head>
<body @php (body_class()) @php (generate_do_microdata( 'body' ))>

@php(do_action( 'wp_body_open' ))

{{--* @hooked generate_do_skip_to_content_link - 2--}}
{{--* @hooked generate_top_bar - 5--}}
{{--* @hooked generate_add_navigation_before_header - 5--}}
@php(do_action( 'generate_before_header' ))

{{--@hooked generate_construct_header - 10--}}
@php(do_action( 'generate_header' ))

{{--@hooked generate_featured_page_header - 10--}}
@php(do_action( 'generate_after_header' ))


