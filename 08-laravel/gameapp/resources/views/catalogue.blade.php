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
        <nav class="nav">
            <img src="images/title-menu.svg" alt="Menu" class="title-menu" >
            <menu>
                <a href="{{ url('login') }} ">
                    <img src="images/ico-login.svg" alt="Login">
                    Login
                </a>
                <a href="{{ url('register') }}">
                    <img src="images/ico-register.svg" alt="Register">
                    Register
                </a>
                <a href="{{ url('catalogue') }}">
                    <img src="images/ico-catalogue.svg" alt="Catalogue">
                    Catalogue
                </a>
            </menu>
        </nav>
        <section class="scroll">
            <form action="" method="post">
                <input type="text" placeholder="Filter" maxlength="18" >
            </form>
            <article>
                <h2>
                    <img src="images/ico-category.svg" alt="Category">
                    Category 01
                </h2>
                <div class="owl-carousel owl-theme">
                    <figure>
                        <img src="images/zelda.png" alt="" class="slide">
                        <figcaption>Zelda</figcaption>                        
                        <a href="view-game.html" class="btn-more">                            
                            view
                        </a>
                    </figure>
                    <figure>
                        <img src="images/slide-c1-02.png" alt="" class="slide">
                        <figcaption>Football Penalty</figcaption> 
                        <a href="view-game.html" class="btn-more">                            
                            view
                        </a>
                    </figure>
                    <figure>
                        <img src="images/slide02.png" alt="" class="slide">
                        <figcaption>Mario Kart</figcaption> 
                        <a href="view-game.html" class="btn-more">                            
                            view
                        </a>
                    </figure>
                </div>
            </article>       

    
            <article>
                <h2>
                    <img src="images/ico-category.svg" alt="Category">
                    Category 02
                </h2>
                <div class="owl-carousel owl-theme">
                    <figure>
                        <img src="images/slide-c1-04.png" alt="" class="slide">
                        <figcaption>Tom Rider</figcaption>
                        <a href="view-game.html" class="btn-more">                            
                            view
                        </a>
                    </figure>
                    <figure>
                        <img src="images/god-of-war.png" alt="" class="slide">
                        <figcaption>God of War</figcaption>
                        <a href="view-game.html" class="btn-more">                            
                            view
                        </a>
                    </figure>
                    <figure>
                        <img src="images/resident.png" alt="" class="slide">
                        <figcaption>Resident Evil</figcaption>
                        <a href="view-game.html" class="btn-more">                            
                            view
                        </a>
                    </figure>
                </div>
            </article>

            <article>
                <h2>
                    <img src="images/ico-category.svg" alt="Category">
                    Category 03
                </h2>
                <div class="owl-carousel owl-theme">
                    <figure>
                        <img src="images/age-of-empires.png" alt="" class="slide">
                        <figcaption>Age of Empires</figcaption>
                        <a href="view-game.html" class="btn-more">                            
                            view
                        </a>
                    </figure>
                    <figure>
                        <img src="images/world.png" alt="" class="slide">
                        <figcaption>World of Warcraft</figcaption>
                        <a href="view-game.html" class="btn-more">                           
                            view
                        </a>
                    </figure>
                    <figure>
                        <img src="images/diablo.png" alt="" class="slide">
                        <figcaption>Diablo</figcaption>
                        <a href="view-game.html" class="btn-more">                            
                            view
                        </a>
                    </figure>
                </div>
            </article>         



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