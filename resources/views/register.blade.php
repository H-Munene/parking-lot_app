@extends('default')

@section('css')
    <link rel="stylesheet" href="{{asset('css/form.css')}}">
@endsection

@section('content')
<div class="container">
    <form action="{{route('register.post')}}" method="post">
        @csrf
        @error('email')
        <div class="badges">
            <span disabled class="red">{{$message}}</span>
        </div>
        @enderror

        @error('vehicle_lp')
        <div class="badges">
            <span disabled class="red">{{$message}}</span>
        </div>
        @enderror

        @error('password')
        <div class="badges">
            <span disabled class="red">{{$message}}</span>
        </div>
        @enderror

        @error('phone_number')
        <div class="badges">
            <span disabled class="red">{{$message}}</span>
        </div>
        @enderror

        <div class="inputs">
            {{-- username --}}
            <div class="fields">
                <input placeholder="Username" class="input inp-username" name="username" type="text" value="{{old('username')}}" required/>
            </div>

            {{-- email --}}
            <div class="fields">
                <input placeholder="Email address" class="input inp-email" name="email" type="email" value="{{old('email')}}" required/>
            </div>

            {{-- vehicle license plate --}}
            <div class="fields">
                <input placeholder="Vehicle License Plate" class="input inp-vehiclelp" name="vehicle_lp" type="text" value="{{old('vehicle_lp')}}" required/>
            </div>

            {{-- phone number --}}
            <div class="fields">
                <input placeholder="Phone number" class="input inp-phone" name="phone_number" type="text" value="{{old('phone_number')}}" required/>
            </div>

            {{-- password --}}
            <div class="fields">
                <input placeholder="password" class="input i" name="password" type="password" required/>
            </div>

            {{-- confirm password --}}
            <div class="fields">
                <input placeholder="confirm password" class="input i" name="password_confirmation" type="password" required/>
            </div>

            {{-- submit --}}
            <div class="submit">
                <button class="cta" type="submit">
                <span class="hover-underline-animation"> Register </span>
                <svg
                    id="arrow-horizontal"
                    xmlns="http://www.w3.org/2000/svg"
                    width="30"
                    height="10"
                    viewBox="0 0 46 16"
                >
                    <path
                    id="Path_10"
                    data-name="Path 10"
                    d="M8,0,6.545,1.455l5.506,5.506H-30V9.039H12.052L6.545,14.545,8,16l8-8Z"
                    transform="translate(30)"
                    ></path>
                </svg>
                </button>
            </div>

            {{-- or double dash --}}
            <div class="content__or-text">
                <span></span>
                <span>OR</span>
                <span></span>
            </div>

            <div class="signup">
                <button class="reg">
                  <div class="text">
                    <span>Enrolled ?</span>
                    {{-- <span>registered ?</span> --}}
                    {{-- <span>user ?</span> --}}
                  </div>
                  <div class="clone">
                    <a href="{{ route('login') }}">L o g i n</a>
                    {{-- <span>Login</span> --}}
                  </div>
                </button>
            </div>
        </div>
    </form>
</div>
@endsection
