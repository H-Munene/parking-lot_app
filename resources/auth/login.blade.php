<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('css/login.css')}}">
</head>
<body>
    <div class="container">
        <div class="form">
            <div class="fields">
                <input placeholder="Email address" class="input inp-email" name="text" type="email" />
            </div>
            <div class="fields">
                <input placeholder="password" class="input i" name="text" type="password" />
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
    </div>
</body>
</html>
