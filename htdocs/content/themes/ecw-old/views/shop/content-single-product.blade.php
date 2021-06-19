<?php global $product; ?>

@php(do_action('woocommerce_before_single_product'))

@if ( post_password_required() )
    {!! get_the_password_form() !!}
	<?php return; ?>
@endif

<div id="product-{!! the_ID() !!}" {!! wc_product_class('', $product) !!}>

    @php(do_action('woocommerce_before_single_product_summary'))

    <div class="summary entry-summary">
        @php(do_action('woocommerce_single_product_summary'))
    </div>

    @php(do_action('woocommerce_after_single_product_summary'))
</div>

@php(do_action('woocommerce_after_single_product'))
