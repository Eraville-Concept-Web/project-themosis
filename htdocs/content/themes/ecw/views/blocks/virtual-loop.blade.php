<div class="woocommerce tour_loop">
    @php(do_action('woocommerce_before_shop_loop'))
    {!! woocommerce_product_loop_start(FALSE) !!}

    @while($loop->have_posts())
        @php($loop->the_post())

        @php(do_action('woocommerce_shop_loop'))
        @template('shop.content', 'product')
    @endwhile

    {!! woocommerce_product_loop_end(FALSE) !!}

    @php(do_action('woocommerce_after_shop_loop'))
</div>
