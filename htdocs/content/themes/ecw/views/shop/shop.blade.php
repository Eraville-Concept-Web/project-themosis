@extends('shop.layout-shop')

@section('site-content')
            @php(do_action('woocommerce_before_main_content'))

            <header class="woocommerce-products-header">
                @if(apply_filters('woocommerce_show_page_title', true))
                    <h1 class="woocommerce-products-header__title page-title">
                        {{ woocommerce_page_title(false) }}
                    </h1>
                @endif

                @php(do_action('woocommerce_archive_description'))
            </header>

            @if(woocommerce_product_loop())
                @php(do_action('woocommerce_before_shop_loop'))

                {!! woocommerce_product_loop_start() !!}

                @if(wc_get_loop_prop('total'))

                    @while ( have_posts() )

                        @php(the_post())

                        @php(do_action('woocommerce_shop_loop'))

                        @template('shop.content', 'product')
                    @endwhile

                @endif

                {!! woocommerce_product_loop_end() !!}

                @php(do_action('woocommerce_after_shop_loop'))

            @else

                @php(do_action('woocommerce_no_products_found'))

            @endif

    @php(do_action('woocommerce_after_main_content'))

    @php(do_action( 'generate_after_main_content' ))

@endsection

@section('sidebar-content')
    @if(function_exists('dynamic_sidebar'))
        @php(dynamic_sidebar('sidebar-shop'))
    @endif
@endsection
