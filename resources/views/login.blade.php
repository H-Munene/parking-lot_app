@extends('default')

{{-- give page title --}}
@section('title', 'Login')

{{-- define css link --}}
@section('css')
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endsection

{{-- page content --}}
@section('content')
<div class="container">
    <form action="" method="post">
        @csrf
        <div class="inputs">
            <div class="fields">
                <input placeholder="Email address" class="input inp-email" name="email" type="email" required/>
            </div>
            <div class="fields">
                <input placeholder="password" class="input i" name="password" type="password" required/>
            </div>

            <div class="submit">
                <button class="cta">
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
                    <span>user?</span>
                  </div>
                  <div class="clone">
                    <span>Register</span>
                  </div>

                </button>

            </div>
        </div>
    </form>
</div>
@endsection
