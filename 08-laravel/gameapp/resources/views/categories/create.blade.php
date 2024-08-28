@extends ('layouts.app')
@section('tittle','GameApp- Create User')
@section('class','my-profile register')


@section('content')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<header>
    <a href="{{ url('categories') }}" class="btn-back">
        <img src="{{ asset('images/btn-back.svg')}}" alt="Back">
    </a>
    <h1>Add</h1>
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
    <form action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <img id="upload" class="mask" src="{{ asset ('images/bg-upload-photo.svg') }}" alt="image">
            <img class="border" src="{{ asset ('images/borde.svg') }}" alt="border">
            <input id="photo" type="file" name="image" accept="image/*">
        </div>
        <div class="form-group">
            <label>
                <img src="{{ asset ('images/ico-document.svg') }}" alt="name">
                Name:
            </label>
            <input type="text" name="name" placeholder="12323456" value="{{old('name')}}">
        </div>
        <div class="form-group">
            <label>
                <img src="{{ asset ('images/ico-name.svg') }}" alt="manufacturer">
                manufacturer:
            </label>
            <input type="text" name="manufacturer" placeholder="nintendo" value="{{old('manufacturer')}}">
        </div> 
        <div class="form-group">
            <label>
                <img src="{{ asset ('images/ico-birthday.svg') }}" alt="releasedate">
                releasedate:
            </label>
            <input type="text" value="{{old('releasedate')}}" name="releasedate" placeholder="1980-10-10">
        </div>
        <div class="form-group">
            <label>
                <img src="{{ asset ('images/ico-email-register.svg') }}" alt="Email">
                Description:
            </label>
            <input type="text" name="description" value="{{old('description')}}" placeholder="lorem ipsum">
        </div>      
        <div class="form-group">
            <button type="submit">
                <img src="{{ asset ('images/content-btn-add.svg') }}" alt="add">
            </button>
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
    //----------------------------
    $togglePass = false
    $('section').on('click', '.ico-eye', function(){
        !$togglePass ? $(this).next().attr('type', 'text')
                    : $(this).next().attr('type', 'password')

        !$togglePass ? $(this).attr('src', "{{ asset ('images/ico-eye.svg')}}")
                    : $(this).attr('src', "{{asset('images/ico-eye-open.svg') }}")

        $togglePass = !$togglePass

    })
     //----------------------------
    $('.border').click(function(e) {
        $('#photo').click()
    })
    $('#photo').change(function(e){
        e.preventDefault()
        let reader = new FileReader()
        reader.onload = function(evt) {
            $('#upload').attr('src', event.target.result)
        }
        reader.readAsDataURL(this.files[0])
    })
     //----------------------------
    })
</script>
@if (count($errors->all()) > 0)
@php $error = '' @endphp
@foreach ($errors->all() as $message)
        @php $error .= '<li>' . $message . '</li>' @endphp
@endforeach

<script>
    $(document).ready(function(){
        Swal.fire({
            position: "top",
            title: "ops!",
            html: `@php echo $error @endphp`,
            icon: "error",
            toast: true,
            showConfirmButton: true,
            timer: 5000
        })
    });   
</script>
@endif

@endsection

