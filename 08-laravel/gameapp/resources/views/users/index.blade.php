@extends('layouts.app')
@section('title', 'GameApp - Users Module')
@section('class', 'users')

@section('content')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <header>
        <a href="{{ url('dashboard') }}" class="btn-back">
            <img src="../images/btn-back.svg" alt="Back">
        </a>
        <h1>Users</h1>
        <svg class="btn-burger" viewBox="0 0 100 100" width="80">
            <path class="line top" d="m 70,33 h -40 c 0,0 -8.5,-0.149796 -8.5,8.5 0,8.649796 8.5,8.5 8.5,8.5 h 20 v -20" />
            <path class="line middle" d="m 70,50 h -40" />
            <path class="line bottom"
                d="m 30,67 h 40 c 0,0 8.5,0.149796 8.5,-8.5 0,-8.649796 -8.5,-8.5 -8.5,-8.5 h -20 v 20" />
        </svg>
    </header>
    @include('menuburger')
    </nav>
    <section>
        <div class="area">
            <a class="add" href="{{ url('users/create') }}">
                <img src="{{ asset('images/content-btn-add.svg') }}" alt="Add">
            </a>           
            <div class="options">
            <form action="{{ url('import/users') }}" method="POST" enctype="multipart/form-data">            
                @csrf
                <input type="file" name="file" id="file" class="hidden" accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet">
                <button type="button" class="btn-import">
                    <img src="{{ asset('images/btn-import-excel.svg')}}" alt="">
                </button>
            </form>
            <a href="{{ url ('export/users/pdf') }}">
                    <img src="{{ asset('images/btn-export-pdf.svg')}}" alt="Pdf">
            </a>
                <a href="{{ url ('export/users/excel') }}">
                    <img src="{{ asset('images/btn-export-excel.svg')}}" alt="Excel">                    
                </a>
                <input type="text" name="qsearch" id="qsearch" placeholder="Search">
            </div>            
            <div class="loader"></div>
            <div id="list">
            @foreach ($users as $user)
                <article class="record">
                    <figure class="avatar">
                        <img class="mask" src="{{ asset('images') . '/' . $user->photo }}" alt="Photo">
                        <img class="border" src="{{ asset('images/shape-border-small.svg') }}" alt="Border">
                    </figure>
                    <aside>
                        <h3>{{ $user->fullname }}</h3>
                        <h4>{{ $user->role }}</h4>
                    </aside>
                    <figure class="actions">
                        <a href="{{ url('users/' . $user->id) }}">
                            <img src="../images/ico-search.svg" alt="Show">
                        </a>
                        <a href="{{ url('users/' . $user->id . '/edit') }}">
                            <img src="../images/ico-edit.svg" alt="Edit">
                        </a>
                        <a href="javascript:;" class="delete" data-fullname="{{ $user->fullname }}">
                            <img src="{{ asset('images/ico-trash.svg') }}" alt="Delete">
                        </a>
                        <form action="{{ url('users/' . $user->id) }}" method="POST" style="display: none">
                            @csrf
                            @method('delete')
                        </form>
                    </figure>
                </article>
            @endforeach
        </div>
        </div>
    </section>
    <div class="paginate">
        <!-- {{ $users->links() }} -->
        {{ $users->links('layouts.paginator') }}
        <!-- <a class="btn-prev" href="javascript:;">
                    <img src="../images/btn-prev.svg" alt="prev">
                </a>
                <span>01/03</span>
                <a class="btn-prev" href="javascript:;">
                    <img src="../images/btn-next.svg" alt="prev">
                </a> -->
    </div>
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            $('.loader').hide()
            $('header').on('click', '.btn-burger', function() {
                $(this).toggleClass('active')
                $('.nav').toggleClass('active')
            })
            $('.btn-import').click(function(e) {
                $('#file').click()
            })
            $('#file').change(function(event) {
                $(this).parent().submit()
            })
            //----------
            @if (session('message'))
                Swal.fire({
                    position: "top",
                    title: '{{ session('message') }}',
                    icon: "success",
                    toast: true,
                    timer: 5000
                })
            @endif
            //------------------  

            $('figure').on('click', '.delete', function() {
                $fullname = $(this).attr('data-fullname')

                Swal.fire({
                    title: "Are you sure?",
                    text: "Desesa eliminar a: " + $fullname,
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#240b34",
                    toast:true,
                    cancelButtonColor: "#891652",
                    confirmButtonText: "Yes, delete it!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        $(this).next().submit()
                }
                });
            })
            //-------------------------------- bloque para el input de buscar
            $('body').on('keyup', '#qsearch', function (e){
                e.preventDefault()
                $query = $(this).val()
                $token = $('input[name=_token]').val()
                $model = 'users'    
                
                $('.loader').show()
                $('#list').hide()

                setTimeout(() => {                 
                    $.post($model + '/search',
                        { q: $query, _token: $token },
                    function (data) {
                        $('#list').html(data)
                        $('.loader').hide()
                        $('#list').fadeIn('slow')
                                                                        
                    }                    
                )
            }, 1000);
            })
            //----------------------------------_
        })
    </script>
@endsection
