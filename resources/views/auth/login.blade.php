@extends('layouts.auth')

@section('content')
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
            <form class="login-form" action="{{ route('login') }}" method="POST">
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
                        <p class="semibold-text mb-2"><a href="{{ route('password.request') }}" data-toggle="flip">Forgot
                                Password ?</a></p>
                    </div>
                </div>
                <div class="form-group btn-container">
                    <button class="btn btn-primary btn-block"><i class="fa fa-sign-in fa-lg fa-fw"></i>LOGIN</button>
                </div>
            </form>
        </div>
    </section>
@endsection
