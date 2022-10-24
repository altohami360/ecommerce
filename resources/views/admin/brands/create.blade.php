@extends('layouts.master')

@section('page-title', 'Brands')

@section('content')
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
                <form action="{{ route('brands.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>User Name <b class="text-danger">*</b></label>
                                <input class="form-control" type="text" name="name" value="{{ old('name') }}"
                                    placeholder="User Name">
                            </div>
                            <div class="form-group">
                                <label>Logo</label>
                                <input class="form-control-file" type="file" name="logo">
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
