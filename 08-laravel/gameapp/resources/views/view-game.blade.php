@extends('layouts.app')
@section('title' , 'GameApp - View Game')
@section('class' , 'view-game')

@section('content')

<header>
            <a href="{{ url ('catalogue') }}" class="btn-back">
                <img src="{{asset('images/btn-back.svg')}}" alt="Back">
            </a>
            <h1>{{ Str::words ($game->title, 3, '...') }}</h1>
            <svg class="btn-burger" viewBox="0 0 100 100" width="80">
                <path
                    class="line top"
                    d="m 70,33 h -40 c 0,0 -8.5,-0.149796 -8.5,8.5 0,8.649796 8.5,8.5 8.5,8.5 h 20 v -20" />
                <path
                    class="line middle"
                    d="m 70,50 h -40" />
                <path
                    class="line bottom"
                    d="m 30,67 h 40 c 0,0 8.5,0.149796 8.5,-8.5 0,-8.649796 -8.5,-8.5 -8.5,-8.5 h -20 v 20" />
            </svg>
</header>
        @include('menuburger') 
        <section>
            <img src="{{ asset('images/'.$game->image) }}" alt="Game">
            <article>
                <div class="row">
                    <div class="column">
                        <h4>Category:</h4>
                        <p>{{ $game->category->name }}</p>
                    </div>
                    <div class="column">
                        <p class="price">$ {{ $game->price }}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="column">
                        <h4>Year:</h4>
                        <p>{{ $game->releasedate }}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="column">
                        <h4>Description:</h4>
                        <p>
                            {{ $game->description }}
                        </p>
                    </div>
                </div>
            </article>
            <footer>
                @guest
                    <a href="javascript:;" class="not-allowed">
                        <img src="{{ asset('images/content-btn-collection.svg') }}" alt="Add">
                    </a>    
                @endguest
                @auth
                    @if (Auth::user()->role == 'Customer')
                        <a href="{{ url('catalogue/add/'.$game->id) }}">
                            <img src="{{ asset('images/content-btn-collection.svg') }}" alt="Add">
                        </a>
                    @endif
                @endauth
            </footer>
        </section>


@endsection
@section('js')

<script>
        $(document).ready(function () {
            $('.owl-carousel').owlCarousel({
                loop: true,
                margin: 10,
                nav: true,
                dots: false,
                autoplay: false,
                autoplayTimeout: 5000,
                responsive: {
                    0: {
                        items: 2
                    }
                }
            })
            $('header').on('click', '.btn-burger', function(){
            $(this).toggleClass('active')
            $('.nav').toggleClass('active')
        })
        })
</script>
@endsection