@extends('layouts.app')
@section('title' , 'GameApp - Welcome')
@section('class' , 'welcome')


@section('content')
<header>
            <img src="{{ asset ('images/logo-welcome.sgv.svg') }}" alt="Logo">
</header>
<section class="owl-carousel owl-theme">
    @foreach ($sliders as $slider)
        <img src="{{ asset('images/' .$slider->image) }} " alt="{{ $slider->title }}">
    @endforeach
            
</section>
<footer>
        <a href="{{ url('catalogue') }}" alt="Explore">
                <img src="{{ asset ('images/content-btn-welcome.svg.svg') }}" alt="Explore">
        </a>
</footer>
@endsection

@section('js')
<script>
$(document).ready(function () {
            $('.owl-carousel').owlCarousel({
                autoplay: true,
                autoplayTimeout: 1000,
                autoplayHoverPause: true,
                loop: true,
                margin: 10,
                nav: true,
                responsive: {
                    0: {
                        items: 1
                    }


                }
            })
})
</script>
@endsection