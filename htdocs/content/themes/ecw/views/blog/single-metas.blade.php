@if ( ! empty( $get_description ) )
    <div class="featured_caption">{{ $get_description }}</div>
@endif
<ul class="my-2 mx-0 text-sm flex flex-wrap">
    @foreach(Loop::tags() as $tag)
        <li class="list-none m-1 bg-body hover:button-che rounded-full px-2 font-semibold text-xs leading-loose cursor-pointer shadow-2xl hover:text-white">
            <a href="{{ get_tag_link( $tag->term_id ) }}"
               class="text-black hover:text-white capitalize">{{ $tag->name }}
            </a>
        </li>
    @endforeach
</ul>
