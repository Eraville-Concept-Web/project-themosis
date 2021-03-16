@php

    global $product;

@endphp

@if ( empty( $product ) || ! $product->is_visible() )
    return;
@endif

<li @php (wc_product_class( '', $product ))>

    {{--	@hooked woocommerce_template_loop_product_link_open - 10--}}
    @php(do_action( 'woocommerce_before_shop_loop_item' ))

    {{--	@hooked woocommerce_show_product_loop_sale_flash - 10--}}
    {{--	@hooked woocommerce_template_loop_product_thumbnail - 10--}}
    @php(do_action( 'woocommerce_before_shop_loop_item_title' ))

    {{--	@hooked woocommerce_template_loop_product_title - 10--}}
    @php(do_action( 'woocommerce_shop_loop_item_title' ))

    {{--	@hooked woocommerce_template_loop_rating - 5--}}
    {{--	@hooked woocommerce_template_loop_price - 10--}}
    @php(do_action( 'woocommerce_after_shop_loop_item_title' ))

    {{--	@hooked woocommerce_template_loop_product_link_close - 5--}}
    {{--	@hooked woocommerce_template_loop_add_to_cart - 10--}}
    @php(do_action( 'woocommerce_after_shop_loop_item' ))

</li>
