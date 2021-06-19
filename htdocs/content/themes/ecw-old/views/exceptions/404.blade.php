@extends('layouts.main')

@section('site-content')
	@php(do_action( 'generate_before_main_content' ))

	@template('template-parts.content.content', '404')

	@php(do_action( 'generate_after_main_content' ))

	@php(do_action( 'generate_after_primary_content_area' ))

	@php(generate_construct_sidebars())

@endsection
