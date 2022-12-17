@extends('layouts.auth')

@section('content')

    <div class="row pt-lg-5 justify-content-md-center">
        <aside class="col-lg-4 col-md-6  align-middle"> 
            <div class="card"> 
                <div class="card-body"> 
                    <h4 class="mb-4">Login</h4> 
                    
                @if ($errors->any())
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <span class="text-danger">{{ $error }}.</span><br>
                    @endforeach
                </div>
                @endif

                    <form action="{{ route('login') }}" method="POST">
                        @csrf 
                        <div class="mb-3"> 
                            <label class="form-label">Email</label> 
                            <input name="email" class="form-control" placeholder="ex. name@gmail.com" type="email" value="{{ old('email') }}"> 
                        </div>  
                        <div class="mb-3"> 
                            <label class="form-label">Password</label> 
                            <a class="float-end" href="#">Forgot?</a> 
                            <input name="password" class="form-control" placeholder="******" type="password"> 
                        </div>
                        <div class="mb-3"> 
                            <label class="form-check"> 
                                <input class="form-check-input" type="checkbox" value="" checked=""> 
                                <span class="form-check-label"> Remember </span> 
                            </label> 
                        </div> 
                        <button class="btn w-100 btn-primary" type="submit"> Login </button> 
                    </form> 
                    <hr>
                    <a href="{{ route('register') }}" class="btn w-100 btn-light">Create new accaunt</a> 
                </div> 
            </div> 
        </aside>
    </div>
    
@endsection
