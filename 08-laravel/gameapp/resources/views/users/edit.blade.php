@extends ('layouts.app')
@section('tittle','GameApp- Edit User')
@section('class','my-profile register')


@section('content')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<header>
    <a href="{{ url('users') }}" class="btn-back">
        <img src="{{ asset('images/btn-back.svg')}}" alt="Back">
    </a>
    <h1>Edit</h1>
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
    <form action="{{ url('users/' .$user->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <img id="upload" class="mask" src="{{ asset ('images') . '/' . $user->photo }}" alt="photo">
            <img class="border" src="{{ asset ('images/borde.svg') }}" alt="border">
            <input id="photo" type="file" name="photo" accept="image/*">
            <input type="hidden" name="originphoto" value="{{ $user->photo}}">
            <input type="hidden" name="id" value="{{ $user->id}}">
        </div>
        <div class="form-group">
            <label>
                <img src="{{ asset ('images/ico-document.svg') }}" alt="document">
                Document:
            </label>
            <input type="text" name="document" placeholder="12323456" value="{{ old('document' , $user->document)}}">
        </div>
        <div class="form-group">
            <label>
                <img src="{{ asset ('images/ico-name.svg') }}" alt="document">
                Fullname:
            </label>
            <input type="text" name="fullname" placeholder="Rosa Perez" value="{{old('fullname' , $user->fullname)}}">
        </div>
        <div class="form-group">
            <label>
                <img src="{{ asset ('images/ico-gender.svg') }}" alt="gender">
                Gender:
            </label>
            <input type="text" name="gender" placeholder="Female" value="{{old('gender', $user->gender)}}">
        </div>
         {{-- //genero --}}
            {{-- <select name="gender" id="">
                <option value="">Select..</option>
                <option value="Female" @if(old('gender', $user->gender)= 'female') selected @endif>Female</option>
                <option value="Male" @if(old('gender', $user->gender)= 'male') selected @endif>Male</option>
            </select> --}}
        <div class="form-group">
            <label>
                <img src="{{ asset ('images/ico-email-register.svg') }}" alt="Email">
                Email:
            </label>
            <input type="email" name="email" value="{{old('email' ,$user->email)}}" placeholder="dirlortr@gmail.com">
        </div>
        <div class="form-group">
            <label>
                <img src="{{ asset ('images/ico-phone.svg') }}" alt="phone">
                Phone Number:
            </label>
            <input type="text" value="{{old('phone', $user->phone)}}" name="phone" placeholder="320XXXXXXXX">
        </div>
        <div class="form-group">
            <label>
                <img src="{{ asset ('images/ico-birthday.svg') }}" alt="text">
                Birth Date:
            </label>
            <input type="text" value="{{old('birthdate' ,$user->birthdate)}}" name="birthdate" placeholder="1980-10-10">
        </div>        
        <div class="form-group">
            <button type="submit">
                <img src="{{ asset ('images/content-btn-save.svg') }}" alt="Edit">
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

