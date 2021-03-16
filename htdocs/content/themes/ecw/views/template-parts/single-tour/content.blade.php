<div class="container mx-auto">
    @php
        $id = Loop::id();
        $product = new WC_product($id);
        $gallery_ids = $product->get_gallery_image_ids();
        $video = get_field('video_presentation', $id);
        $information = get_field('information_tour', $id)
    @endphp
    @if (! empty($video) &&  is_array($video))
        <div class="single-tour-video mb-8">
            <video class="w-full"
                   controls
                   loop
                   muted>
                <source src="{{$video['url']}}"
                        type="video/mp4">
            </video>
        </div>
    @endif
    <div class="single-tour__title-description mb-8">
        <h2 class="text-2xl uppercase text-center font-medium">
            {{ __("What you'll discover", THEME_TD) }}
        </h2>
    </div>
    <div class="single-tour_description">
        {!! Loop::content() !!}
    </div>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-3 gap-4 mb-8">
        @if(! empty($gallery_ids) && is_array($gallery_ids))
            @foreach($gallery_ids as $image_id)
                <a href="{{wp_get_attachment_url( $image_id )}}"
                   class="cursor-pointer"
                   target="_blank">
                    <img src="{{wp_get_attachment_url( $image_id )}}"
                         class="object-fit w-full"
                         alt="{{ get_post_meta($image_id,'_wp_attachment_image_alt', true) }}"
                         title="{{ get_the_title($image_id) }}">
                </a>
            @endforeach
        @endif
    </div>
    <div class="single-tour__information-box p-8 mb-8">
        <div class="single-tour__information-box-header text-center">
            <i class="fas fa-info-circle text-5xl"></i>
        </div>
        <div class="single-tour__information-box-text">
            {!! $information !!}
        </div>
        <div class="single-tour__information-box-button text-center">
            <a href="#"
               class="mbt-button inline-block px-8 py-3 border-2 font-bold uppercase font-medium rounded shadow-lg
               transition duration-500 ease-in-out transform hover:-translate-y-1 hover:scale-110">
                {{ __('Get more information about tours', THEME_TD) }}
            </a>
        </div>
    </div>
    <div id="tour-booking-form" class="single-tour__booking-form mb-8">
        <h2 class="text-2xl uppercase text-center font-medium mb-8">
            {{ __("Booking", THEME_TD) }}
        </h2>
    </div>
</div>
