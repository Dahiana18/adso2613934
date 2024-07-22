{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout> --}}
@extends('layouts.app')
@section('title', 'GameApp - Catalogue')
@section('class', 'dashboard')

@section('content')
    <header>
        <img src="images/logo-dashboard.png" alt="">
        <svg class="btn-burger" viewBox="0 0 100 100" width="80">
            <path class="line top" d="m 70,33 h -40 c 0,0 -8.5,-0.149796 -8.5,8.5 0,8.649796 8.5,8.5 8.5,8.5 h 20 v -20" />
            <path class="line middle" d="m 70,50 h -40" />
            <path class="line bottom"
                d="m 30,67 h 40 c 0,0 8.5,0.149796 8.5,-8.5 0,-8.649796 -8.5,-8.5 -8.5,-8.5 h -20 v 20" />
        </svg>
    </header>
    @include('menuburger')
    <section>
    <article class="module module-users">
                <aside>
                    <img src="images/ico-users.svg" alt="Users Module">
                    <span class="count-rows">20 Rows</span>
                </aside>
                <aside>
                    <h2>Users</h2>
                    <a href="{{ url ('users') }}" class="btn-more">                        
                        view
                    </a>
                </aside>
            </article>
            <article class="module module-cats">
                <aside>
                    <img src="images/ico-cats.svg" alt="Categories Module">
                    <span class="count-rows">6 Rows</span>
                </aside>
                <aside>
                    <h2>Categories</h2>
                    <a class="btn-more"  href="/07-layout/categories/categories.html">                        
                        view
                    </a>
                </aside>
            </article>
            <article class="module module-games">
                <aside>
                    <img src="images/ico-games.svg" alt="Games Module">
                    <span class="count-rows">40 Rows</span>
                </aside>
                <aside>
                    <h2>Games</h2>
                    <a class="btn-more"  href="/07-layout/games/games.html">
                    view
                    </a>
                </aside>
            </article>
    </section>
@endsection
@section('js')
    <script>
        $(document).ready(function() {
            $('header').on('click', '.btn-burger', function() {
                $(this).toggleClass('active')
                $('.nav').toggleClass('active')
            })

            // $togglePass = false
            // $('section').on('click', '.ico-eye', function() {
            //     !$togglePass ? $(this).next().attr('type', 'text') :
            //         $(this).next().attr('type', 'password') !$togglePass ? $(this).attr('src',
            //             'images/ico-eye-hidden.svg') :
            //         $(this).attr('src', 'images/ico-eye.svg')
            //     $togglePass = !$togglePass
            // })
        })
    </script>
@endsection
