<!DOCTYPE html>
<html lang="{{ App::isLocale('ar') }}" dir="{{ App::isLocale('ar') ? 'rtl' : 'ltr' }}">

<head>

    <title>{{ $siteSetting['site_name']->value }}</title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/main.css') }}">

    <!-- RTL CSS-->
    @if (App::isLocale('ar'))
        <link rel="stylesheet" type="text/css" href="{{ asset('css/rtl.css') }}">
    @endif

    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css"
        href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Google Font-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">

</head>

<body class="  pace-done">
    <div class="pace  pace-inactive">
        <div class="pace-progress" data-progress-text="100%" data-progress="99"
            style="transform: translate3d(100%, 0px, 0px);">
            <div class="pace-progress-inner"></div>
        </div>
        <div class="pace-activity"></div>
    </div>
    <section class="material-half-bg">
        <div class="cover"></div>
    </section>

    <section class="login-content">
        <div class="logo">
            <h3 class="login-head"></i>Login</h3>
        </div>
        
        @if ($errors->any())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <span class="text-danger">{{ $error }}.</span><br>
            @endforeach
        </div>
        @endif

        <div class="login-box width-login">
            <form class="login-form" action="{{ route('admin.login') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label class="control-label">Email</label>
                    <input class="form-control" type="text" value="admin@admin.com" name="email" placeholder="Email" autofocus="">
                </div>
                <div class="form-group">
                    <label class="control-label">Password</label>
                    <input class="form-control" type="password" value="password" name="password" placeholder="Password">
                </div>
                <div class="form-group">
                    <div class="utility">
                        <div class="animated-checkbox">
                            <label>
                                <input type="checkbox" name="remmber"><span class="label-text">Remmber Me</span>
                            </label>
                        </div>
                        <p class="semibold-text mb-2"><a href="" data-toggle="flip">Forgot
                                Password ?</a></p>
                    </div>
                </div>
                <div class="form-group btn-container">
                    <button class="btn btn-primary btn-block"><i class="fa fa-sign-in fa-lg fa-fw"></i>LOGIN</button>
                </div>
            </form>
        </div>
    </section>
    

</body>

</html>

    