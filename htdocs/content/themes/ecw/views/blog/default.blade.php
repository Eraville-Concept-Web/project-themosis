@extends('layouts.main')

@section('site-content')
    <section id="primary" class="content-area">
        <main id="main" class="site-main">
            @if(have_posts())
                @while(have_posts())
                    @php(the_post())
                    @template('template-parts.content.content')
                @endwhile
                {{-- Previous/next page navigation. --}}
                {!! Loop::paginate() !!}
            @else
                @template('template-parts.content.content', 'none')
            @endif
        </main>
    </section>
@endsection
