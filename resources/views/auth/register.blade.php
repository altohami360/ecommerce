@extends('layouts.auth')

@section('content')
    <div class="row pt-lg-5 justify-content-md-center">
        <aside class="col-lg-4 col-md-6  align-middle"> 
            <div class="card"> 
                <div class="card-body"> 
                    <h4 class="mb-4">Register</h4> 
                    
                @if ($errors->any())
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <span class="text-danger">{{ $error }}.</span><br>
                    @endforeach
                </div>
                @endif

                    <form action="{{ route('register') }}" method="POST">
                        @csrf 
                        <div class="mb-3"> 
                            <label class="form-label">Name</label> 
                            <input name="name" class="form-control" type="name" value="{{ old('name') }}"> 
                        </div>  
                        <div class="mb-3"> 
                            <label class="form-label">Email</label> 
                            <input name="email" class="form-control" placeholder="ex. name@gmail.com" type="email" value="{{ old('email') }}"> 
                        </div> 
                        <div class="mb-3"> 
                            <label class="form-label">Password</label> 
                            <input name="password" class="form-control" placeholder="******" type="password"> 
                        </div>
                        <div class="mb-3"> 
                            <label class="form-label">Password</label> 
                            <input name="password_confirmation" class="form-control" placeholder="******" type="password"> 
                        </div>
                        <button class="btn w-100 btn-primary" type="submit"> Login </button> 
                    </form> 
                    <hr>
                    <a href="{{ route('login') }}" class="btn w-100 btn-light">I have accaunt</a> 
                </div> 
            </div> 
        </aside>
    </div>
@endsection
