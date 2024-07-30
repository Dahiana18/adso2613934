{{-- <x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}
@extends('layouts.app')
@section('title', 'GameApp - login')
@section('class', 'login')

@section('content')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<header>
    <a href="javascript:;" class="btn-back">
        <img src="images/btn-back.svg" alt="Back">
    </a>
    <img src="images/title-login.svg" alt="login">
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
<nav class="nav">
    <img src="images/title-menu.svg" alt="Menu" class="title-menu" >
    <menu>
        <a href={{url('login')}}>
            <img src="images/ico-login.svg" alt="Login">
            Login
        </a>
        <a href={{url('register')}}>
            <img src="images/ico-register.svg" alt="Register">
            Register
        </a>
        <a href={{url('catalogue')}}>
            <img src="images/ico-catalogue.svg" alt="Catalogue">
            Catalogue
        </a>
    </menu>
</nav>
<section>
    <form action="{{route('login')}}" method="POST">
        @csrf
        <div class="form-group">
                <label>
                    <img src="images/ico-email.svg" alt="Email">
                    Email:
                </label>
                <input type="email" name="email" value="{{ old('email') }}" placeholder="johnwick@gmail.com" maxlength="30">
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>
            <div class="form-group">
                <label>
                    <img src="images/ico-password.svg" alt="Password">
                    Password:
                </label>
                <img class="ico-eye" src="images/ico-eye-open.svg" alt="Eye">
                <input type="password" name="password" placeholder="dontmesswithmydog">
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>
            <div class="form-group">
                <button>
                    <img src="images/content-btn-login.svg" alt="login">
                </button>
                <a href="">Forgot your password ?</a>               
            </div>
    </form>
</section>

@endsection

@section('js')
<script>
$(document).ready(function () {

            $('header').on('click', '.btn-burger', function(){
            $(this).toggleClass('active')
            $('.nav').toggleClass('active')
        })
        // -------------------------------------
        $togglePass = false
            $('section').on('click', '.ico-eye', function(){
                !$togglePass? $(this).next().attr('type', 'text')
                            : $(this).next().attr('type', 'password')

                !$togglePass? $(this).attr('src', 'images/ico-eye.svg')
                            : $(this).attr('src', 'images/ico-eye-open.svg')
                $togglePass = !$togglePass
            })
        // -------------------
    })

</script>

@endsection

