@extends('layouts.master')

@section('page-title', 'Customers')


@section('content')
    <div>
        @if ($errors->any())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <p class="mb-0">{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>User Name <b class="text-danger">*</b></label>
                                    <input class="form-control" type="text" name="name" value="{{ old('name') }}" placeholder="User Name">
                                </div>
                                <div class="form-group">
                                    <label>Email <b class="text-danger">*</b></label>
                                    <input class="form-control" type="email" name="email" value="{{ old('email') }}" placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <label>Password <b class="text-danger">*</b></label>
                                    <input class="form-control" type="password" name="password" placeholder="Password">
                                </div>
                                <div class="form-group">
                                    <label>Password Confirmation <b class="text-danger">*</b></label>
                                    <input class="form-control" type="password" name="password_confirmation"
                                        placeholder="Password Confirmation">
                                </div>
                                <div class="form-group">
                                    <label>User Avatar</label>
                                    <input class="form-control-file" type="file" name="avatar">
                                </div>
                            </div>
                        </div>
                        <div class="tile-footer">
                            <button class="btn btn-primary" type="submit">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endsection
