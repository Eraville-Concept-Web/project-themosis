@extends('shop.layout-shop')

@section('site-content')
    @php(do_action('woocommerce_before_main_content'))

    @while ( have_posts() )

        @php(the_post())

        @template('shop.content-single', 'product')
    @endwhile

    @php(do_action('woocommerce_after_main_content'))
@endsection

@section('sidebar-content')
    @if(function_exists('dynamic_sidebar'))
        @php(dynamic_sidebar('sidebar-tour'))
    @endif
@endsection
