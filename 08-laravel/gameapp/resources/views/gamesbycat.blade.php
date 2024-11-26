@if (isset($category))
@if (count($category->games) > 0 )
<article>
    <h2>
        <img src="{{ asset('images/ico-category.svg') }}" alt="Category">
        {{ $category->name }}
    </h2>
    <div class="owl-carousel owl-theme">
        @foreach ($games as $game)
            @if ($category->id == $game->category_id)
                <figure>
                    <img src="{{ asset('images/'.$game->image) }}" alt="" class="slide">
                    <figcaption>{{ Str::words($game->title, 3, ' ...') }}</figcaption>
                    <a href="{{ url('catalogue/'.$game->id) }}" class="btn-more">
                        <img src="{{ asset('images/ico-more.svg') }}" alt="">
                        view
                    </a>
                </figure>
            @endif
        @endforeach
    </div>
</article>
@else
    <h4>No Games yet!</h4>
@endif
@else    
    @foreach ($categories as $category)
        @if (count($category->games) > 0 )
        <article>
            <h2>
                <img src="{{ asset('images/ico-category.svg') }}" alt="Category">
                {{ $category->name }}
            </h2>
            <div class="owl-carousel owl-theme">
                @foreach ($games as $game)
                    @if ($category->id == $game->category_id)
                        <figure>
                            <img src="{{ asset('images/'.$game->image) }}" alt="" class="slide">
                            <figcaption>{{ Str::words($game->title, 3, ' ...') }}</figcaption>
                            <a href="{{ url('catalogue/'.$game->id) }}" class="btn-more">
                                <img src="{{ asset('images/ico-more.svg') }}" alt="">
                                view
                            </a>
                        </figure>
                    @endif
                @endforeach
            </div>
        </article>
        @endif
    @endforeach
@endif
