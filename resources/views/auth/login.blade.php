<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>My Soft | Login</title>

    @include('include.master_style')
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{asset('dist')}}/css/adminlte.min.css">
    <link rel="stylesheet" href="{{asset('plugins')}}/icheck-bootstrap/icheck-bootstrap.min.css">

    <style>
        body {
            /* background-image: url('{{ asset("images/bg1.jpg") }}'); */
            /* Replace with the actual path to your image */
            background-size: cover;
            /* Adjust to your preference */
            background-repeat: no-repeat;
            background-attachment: fixed;
            /* This will keep the background fixed while scrolling */
        }

        .logo-container {
            position: absolute;
            top: 20px;
            left: 20px;
        }

        .logo-container img {
            max-width: 120px;
            max-height: auto;
        }

        .card-header {
            display: flex;
            flex-direction: column;
            /* Center text vertically */
            justify-content: center;
            /* Center text horizontally */
            align-items: center;
            /* Center text vertically */
            background-color: transparent;
            /* border-bottom: none; */
        }

        .card-header h4 {
            font-weight: bold;
            margin: 0;
        }

        .card-header img {
            max-width: 100%;
            max-height: 60px;
            /* Adjust the height as needed */
            margin-right: 20px;
            /* Add some spacing between the logo and text */
        }
    </style>

</head>

<body class="hold-transition login-page">
    <div class="logo-container">
        <img src='{{ asset("images/ndl_logo.png") }}' alt="NDL LOGO" srcset="">
    </div>
    <div class="login-box">
        <!-- /.login-logo -->
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <h4>Smart Energy Monitoring</h4>
                {{-- <img src='{{ asset("images/ndl_logo.png") }}' alt="NDL LOGO" srcset=""> --}}
            </div>
            <div class="card-body">
                <p class="login-box-msg">Sign in to start your session</p>
                @if(session()->has('error'))
                <p class="login-box-msg"><span style="color: red;">{{ session()->get('error') }}</span> </p>
                @endif

                <form action="{{route('auth.login')}}" method="post">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="email" name="email" class="form-control" placeholder="Email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" name="password" class="form-control" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox" id="remember" name="remember">
                                <label for="remember">
                                    Remember Me
                                </label>
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>

                <div class="social-auth-links text-center mt-2 mb-3">
                    {{-- <a href="{{ route('auth.login_view_new') }}" class="btn btn-block btn-primary"> New Login Interface </a> --}}
                    <a href="{{ route('auth.google') }}" class="btn btn-block btn-danger">
                        <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
                    </a>
                </div>
                <!-- /.social-auth-links -->

                <p class="mb-1">
                    <a href="#">Forgot password?</a>
                </p>
                {{-- <p class="mb-0">
                    <a href="{{route('auth.register')}}" class="text-center">Register a new membership</a>
                </p> --}}
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.login-box -->

    @include('include.master_script')
</body>

</html>
