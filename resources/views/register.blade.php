@extends('default')

@section('css')
    <link rel="stylesheet" href="{{asset('css/form.css')}}">
@endsection

@section('content')
<div class="container">
    <form action="{{route('register.post')}}" method="post">
        @csrf

        @if (session()->has('error'))
            <div class="popup error-popup">
            <div class="popup-icon error-icon">
              <svg
                class="error-svg"
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 20 20"
                aria-hidden="true"
              >
                <path
                  fill-rule="evenodd"
                  d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                  clip-rule="evenodd"
                ></path>
              </svg>
            </div>
            <div class="error-message">{{session()->get('error')}}</div>
            <div class="popup-icon close-icon">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 20 20"
                class="close-svg"
              >
                <path
                  d="m15.8333 5.34166-1.175-1.175-4.6583 4.65834-4.65833-4.65834-1.175 1.175 4.65833 4.65834-4.65833 4.6583 1.175 1.175 4.65833-4.6583 4.6583 4.6583 1.175-1.175-4.6583-4.6583z"
                  class="close-path"
                ></path>
              </svg>
            </div>
          </div>

        @else
        <div class="popup success-popup">
            <div class="popup-icon success-icon">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 24 24"
                class="success-svg"
              >
                <path
                  fill-rule="evenodd"
                  d="m12 1c-6.075 0-11 4.925-11 11s4.925 11 11 11 11-4.925 11-11-4.925-11-11-11zm4.768 9.14c.0878-.1004.1546-.21726.1966-.34383.0419-.12657.0581-.26026.0477-.39319-.0105-.13293-.0475-.26242-.1087-.38085-.0613-.11844-.1456-.22342-.2481-.30879-.1024-.08536-.2209-.14938-.3484-.18828s-.2616-.0519-.3942-.03823c-.1327.01366-.2612.05372-.3782.1178-.1169.06409-.2198.15091-.3027.25537l-4.3 5.159-2.225-2.226c-.1886-.1822-.4412-.283-.7034-.2807s-.51301.1075-.69842.2929-.29058.4362-.29285.6984c-.00228.2622.09851.5148.28067.7034l3 3c.0983.0982.2159.1748.3454.2251.1295.0502.2681.0729.4069.0665.1387-.0063.2747-.0414.3991-.1032.1244-.0617.2347-.1487.3236-.2554z"
                  clip-rule="evenodd"
                ></path>
              </svg>
            </div>
            <div class="success-message">{{session()->get('success')}}</div>
            <div class="popup-icon close-icon">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 20 20"
                aria-hidden="true"
                class="close-svg"
              >
                <path
                  d="m15.8333 5.34166-1.175-1.175-4.6583 4.65834-4.65833-4.65834-1.175 1.175 4.65833 4.65834-4.65833 4.6583 1.175 1.175 4.65833-4.6583 4.6583 4.6583 1.175-1.175-4.6583-4.6583z"
                  class="close-path"
                ></path>
              </svg>
            </div>
          </div>
        @endif

        <div class="inputs">
            {{-- username --}}
            <div class="fields">
                <input placeholder="Username" class="input inp-username" name="username" type="text" required/>
            </div>
            {{-- email --}}
            <div class="fields">
                <input placeholder="Email address" class="input inp-email" name="email" type="email" required/>
            </div>
            {{-- vehicle license plate --}}
            <div class="fields">
                <input placeholder="Vehicle License Plate" class="input inp-vehiclelp" name="vehicle_lp" type="vehicle_lp" required/>
            </div>
            {{-- phone number --}}
            <div class="fields">
                <input placeholder="Phone number" class="input inp-phone" name="phone" type="text" required/>
            </div>
            {{-- password --}}
            <div class="fields">
                <input placeholder="password" class="input i" name="password" type="password" required/>
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
                    <a href="{{ route('login.get') }}">L o g i n</a>
                    {{-- <span>Login</span> --}}
                  </div>
                </button>
            </div>
        </div>
    </form>
</div>
@endsection
