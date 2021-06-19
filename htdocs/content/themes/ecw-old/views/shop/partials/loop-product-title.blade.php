<h3 class="woocommerce-loop-product__title">
    @php($custom_title = get_field('tour_main_title', Loop::id()))
    {{ $custom_title ?: Loop::title() }}
</h3>
<p>{{ __('Ref: ', THEME_TD) }}{{Loop::title()}}</p>
