@extends('layouts.master')

@section('page-title', 'Categories')

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
                    <form action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Name <b class="text-danger">*</b></label>
                                    <input class="form-control" type="text" name="name" value="{{ old('name') }}"
                                        placeholder="Name">
                                </div>
                                <div class="form-group">
                                    <label>Description <b class="text-danger">*</b></label>
                                    <textarea class="form-control" name="description" placeholder="Description">{{ old('description') }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="parent">Parent Category <span class="text-danger"> *</span></label>
                                    <select class="form-control custom-select" name="parent_id">
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}" @selected(old('parent_id') == $category->id)> {{ $category->name }} </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="animated-checkbox">
                                    <label>
                                        <input type="checkbox" name="featured" @checked(old('featured'))><span class="label-text">Featured</span>
                                    </label>
                                </div>
                                <div class="animated-checkbox">
                                    <label>
                                        <input type="checkbox" name="menu"  @checked(old('menu'))><span class="label-text">Menu</span>
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label>User Avatar</label>
                                    <input class="form-control" type="file" name="avatar">
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
