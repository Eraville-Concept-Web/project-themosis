<article id="post-{{ get_the_ID() }}" {!! post_class() !!} {!! generate_do_microdata( 'article' ) !!}>
    <div class="inside-article">
        {{--        @hooked generate_featured_page_header_inside_single - 10--}}
        @php(do_action( 'generate_before_content' ))

        @if ( generate_show_entry_header() )

            <header class="entry-header">
                @php(do_action( 'generate_before_page_title' ))

                @if ( generate_show_title() )

                    @php($params = generate_get_the_title_parameters())

                    <h1 class="entry-title text-center uppercase font-semibold pt-8 md:py-8 text-purple">{{ __('Available Tours', THEME_TD) }}</h1>

                @endif

                @php(do_action( 'generate_after_page_title' ))
            </header>

        @endif

        {{--        @hooked generate_post_image - 10--}}
        @php(do_action( 'generate_after_entry_header' ))

        @php ($itemprop = '')

        @if ( 'microdata' === generate_get_schema_type() )
            @php($itemprop = ' itemprop="text"')
        @endif

        <div class="entry-content"{{$itemprop}}>
            <div class="container mx-auto md:py-10">
                <div id='calendar'></div>
                <!-- This example requires Tailwind CSS v2.0+ -->
                <div class="fixed z-10 inset-0 overflow-y-auto" id="eventContent" style="display: none">
                    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                        <!--
                          Background overlay, show/hide based on modal state.

                          Entering: "ease-out duration-300"
                            From: "opacity-0"
                            To: "opacity-100"
                          Leaving: "ease-in duration-200"
                            From: "opacity-100"
                            To: "opacity-0"
                        -->
                        <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                        </div>

                        <!-- This element is to trick the browser into centering the modal contents. -->
                        <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
                        <!--
                          Modal panel, show/hide based on modal state.

                          Entering: "ease-out duration-300"
                            From: "opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                            To: "opacity-100 translate-y-0 sm:scale-100"
                          Leaving: "ease-in duration-200"
                            From: "opacity-100 translate-y-0 sm:scale-100"
                            To: "opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                        -->
                        <div style="background-color: #fff"
                             class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
                            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                                <div class="sm:flex sm:items-start">
                                    <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                                        <!-- Heroicon name: outline/exclamation -->
                                        <img id="modalPicture" src="" alt="">
                                    </div>
                                    <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                        <h3 class="text-lg leading-6 font-medium text-gray-900" id="eventTitle"></h3>
                                        <div class="mt-2">
                                            <p id="eventInfo" class="text-sm text-gray-500"></p>
                                            <h3 class="text-sm text-gray-500 pt-4 pb-2">{{ __('TimeSlots available this day:', THEME_TD) }}</h3>
                                            <ul id="eventTimeSlots" class="text-sm text-gray-500 pl-8"></ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                                <button id="modalClose" type="button" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-purple text-base font-medium text-white hover:text-black hover:bg-mbtGray focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm">
                                    Close
                                </button>
                                <button id="modalLink" type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-purple text-base font-medium text-white hover:text-black hover:bg-mbtGray focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                                    See detail
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

        @php(do_action('generate_after_content'))
    </div>
</article>





