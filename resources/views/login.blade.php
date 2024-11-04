@extends('default')

{{-- give page title --}}
@section('title', 'Login')

{{-- define css link --}}
@section('css')
    <link rel="stylesheet" href="{{ asset('css/form.css') }}">
@endsection

{{-- page content --}}
@section('content')
<div class="container">
    <form action="{{route('login.post')}}" method="post">
        @csrf

        <div class="inputs">

            @if($errors->any())
                <div class="badges">
                    <span disabled class="red">Invalid Credentials</span>
                </div>
            @endif

            @if (session()->has('success'))
                <div class="badges">
                    <span disabled class="green">{{session()->get('success')}}</span>
                </div>
            @endif

{{--            input fields--}}
            <div class="fields">
                <input placeholder="Email address" class="input inp-email" name="email" type="email" value="{{old('email')}}" required/>
            </div>
            <div class="fields">
                <input placeholder="password" class="input i" name="password" type="password" required/>
            </div>

            <div class="submit">
                <button class="cta" type="submit">
                <span class="hover-underline-animation"> Login </span>
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
                    <span>Not</span>
                    <span>a</span>
                    <span>user ?</span>
                  </div>
                  <div class="clone">
                    <a href="{{ route('register') }}">Register</a>
                    {{-- <span>Register</span> --}}
                  </div>
                </button>

            </div>
        </div>
    </form>
</div>
@endsection
