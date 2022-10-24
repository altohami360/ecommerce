@extends('layouts.auth')

@section('content')
    <section class="login-content">
        <div class="logo">
            <h3 class="login-head">Rigester</h3>
        </div>

        @if ($errors->any())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <span class="text-danger">{{ $error }}.</span><br>
            @endforeach
        </div>
        @endif

        <div class="login-box width-register">
            <form class="login-form" action="{{ route('register') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label class="control-label">Name</label>
                    <input class="form-control" type="text" name="name" placeholder="Name" autofocus="">
                </div>
                <div class="form-group">
                    <label class="control-label">Email</label>
                    <input class="form-control" type="text" name="email" placeholder="Email" autofocus="">
                </div>
                <div class="form-group">
                    <label class="control-label">Password</label>
                    <input class="form-control" type="password" name="password" placeholder="Password">
                </div>
                <div class="form-group">
                    <label class="control-label">Password</label>
                    <input class="form-control" type="password" name="password_confirmation" placeholder="Password">
                </div>
                <div class="form-group btn-container">
                    <button type="submit" class="btn btn-primary btn-block"><i
                            class="fa fa-sign-in fa-lg fa-fw"></i>Rigester</button>
                </div>
            </form>
        </div>
    </section>
@endsection
