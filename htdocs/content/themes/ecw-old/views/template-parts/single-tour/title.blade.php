<div class="single-tour__title-block grid grid-cols-1 md:grid-cols-2 gap-4 mb-8 rounded">
    <div class="single-tour__title-section p-4">
        <h1 class="single-tour__title text-2xl leading-6 font-bold">
            @php($custom_title = get_field('tour_main_title', Loop::id()))
            {{ $custom_title ?: Loop::title() }}
        </h1>
        <div class="single-tour__title-divider"><span></span></div>
        <a href="#tour-booking-form"
           class="mbt-button inline-block mt-4 px-8 py-3 border-2 font-bold uppercase font-medium rounded shadow-lg
           transition duration-500 ease-in-out transform hover:-translate-y-1 hover:scale-110">
            {{ __("Book now", THEME_TD)  }}
            <i class="far fa-calendar-check ml-4"></i>
        </a>
    </div>
    <div class="single-tour__title-image">
        <img src="{{ Loop::thumbnailUrl('single_tour') }}"/>
    </div>
</div>
