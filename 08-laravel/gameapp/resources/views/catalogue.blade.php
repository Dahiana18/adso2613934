@extends('layouts.app')
@section('title' , 'GameApp - Catalogue')
@section('class' , 'catalogue')

@section('content')

<header>
            <a href="{{ url ('/') }}" class="btn-back">
                <img src="images/btn-back.svg" alt="Back">
            </a>
            <img src="images/logo-top.svg" alt="Logo" class="logo-top">
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

        <section class="scroll">
            <form action="" method="post">
                @csrf
                <input type="text" id="fcat" list="lcat" placeholder="Filter" maxlength="18">
                <datalist id="lcat">
                    <option value="All"></option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->name }}"></option>
                    @endforeach
                </datalist>
            </form>

            <div class="loader hidden"></div>               
            <div id="content">
                @foreach ($categories as $category)
                    @if (count($category->games) > 0)
                    <article>
                        <h2>
                            <img src="images/ico-category.svg" alt="Category">
                            {{ $category->name }}
                        </h2>
                        <div class="owl-carousel owl-theme">
                            @foreach ($games as $game)
                                @if ($category->id == $game->category_id)
                                    <figure>
                                        <img src="{{asset('images/' .$game->image)}}" alt="" class="slide">
                                        <figcaption>{{ Str::words ($game->title, 3, '...') }}</figcaption>                        
                                        <a href="{{ url('catalogue/' .$game->id)}}" class="btn-more">   
                                            <img src="{{ asset('images/ico-more.svg')}}" alt="">
                                            view                
                                        </a>
                                    </figure> 
                                @endif
                            @endforeach                            
                        </div>
                    </article> 
                    @endif
                @endforeach
            </div>
        </section>

@endsection

@section('js')

<script>
    $(document).ready(function () {
        // - - - - - - - - - - - - - - -
        $('.owl-carousel').owlCarousel({
            center: false,
            loop: true,
            margin: 0,
            nav: true,
            dots: false,
            responsive:{
                0:{
                    items: 2
                }
            }
        })
        // - - - - - - - - - - - - - - -
        $('header').on('click', '.btn-burger', function () {
            $(this).toggleClass('active')
            $('.nav').toggleClass('active')
        })
        // - - - - - - - - - - - - - - -
        $('body').on('change', '#fcat', function(event) {
            event.preventDefault()
            $fcat = $(this).val()
            $tk   = $('input[name="_token"]').val()
            $('.loader').removeClass('hidden')
            $('#content').hide()
            $sto = setTimeout(() => {
                clearTimeout($sto)
                $.post("gamesbycat", {
                    fcat: $fcat,
                    _token: $tk
                },
                    function (data) {
                        $('.loader').addClass('hidden')
                        $('#content').html(data).fadeIn('slow')
                        $('.owl-carousel').owlCarousel({
                            center: false,
                            loop: true,
                            margin: 0,
                            nav: true,
                            dots: false,
                            responsive:{
                                0:{
                                    items: 2
                                }
                            }
                        })
                    })
            }, 1500)
        })

        // - - - - - - - - - - - - - - -
    })
</script>
@endsection
