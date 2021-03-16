@extends('layouts.main')
@section('site-content')
    @php(do_action( 'woocommerce_account_navigation' ))
    <div class="woocommerce-MyAccount-content">
        @php(do_action( 'woocommerce_account_content' ))
    </div>
@endsection



