@extends('layouts.app')
@section('title', 'GameApp - Users Module')
@section('class', 'users')

@section('content')

<header>
            <a href="{{ url ('dashboard') }}" class="btn-back">
                <img src="../images/btn-back.svg" alt="Back">
            </a>
            <h1>Users</h1>
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
        </nav>
        <section>
        @foreach ($users as $user )
            <div class="area">
                <a class="add" href="{{ url ('users/create') }}">
                    <img src="../images/content-btn-add.svg" alt="Add">
                </a>
                <article class="record">
                        <figure class="avatar">
                            <img class="mask" src="{{ asset ('images') . '/' .$user-> photo}}" alt="Photo">
                            <img class="border" src="../images/shape-border-small.svg" alt="Border">
                        </figure>
                        <aside>
                            <h3>{{$user-> fullname}}</h3>
                            <h4>{{$user-> role}}</h4>
                        </aside>
                        <figure class="actions">
                            <a href="{{ url ('users/' . $user->id) }}">
                                <img src="../images/ico-search.svg" alt="Show">
                            </a>
                            <a href="{{ url ('users/' . $user->id . '/edit') }}">
                                <img src="../images/ico-edit.svg" alt="Edit">
                            </a>
                            <a href="javascript:;">
                                <img src="../images/ico-trash.svg" alt="Delete">
                            </a>
                        </figure>
                </article>
                
        </div>
        @endforeach
        </section>
        <div class="paginate">
            {{ $users->links() }}
            <a class="btn-prev" href="javascript:;">
                <img src="../images/btn-prev.svg" alt="prev">
            </a>
            <span>01/03</span>
            <a class="btn-prev" href="javascript:;">
                <img src="../images/btn-next.svg" alt="prev">
            </a>
        </div>
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