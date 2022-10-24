@extends('layouts.master')

@section('page-title', 'Categpries')

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
                    <form action="{{ route('categories.update', $category) }}" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Name <b class="text-danger">*</b></label>
                                    <input class="form-control" type="text" name="name" value="{{ old('name', $category->name) }}"
                                        placeholder="Name">
                                </div>
                                <div class="form-group">
                                    <label>Description <b class="text-danger">*</b></label>
                                    <textarea class="form-control" name="description" placeholder="Description">{{ old('description', $category->description) }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="parent">Parent Category <span class="text-danger"> *</span></label>
                                    <select class="form-control custom-select" name="parent_id">
                                        @foreach ($parent_categories as $parent_category)
                                            <option value="{{ $parent_category->id }}" @selected(old('parent_id', $category->parent_id) == $parent_category->id)> {{ $parent_category->name }} </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="animated-checkbox">
                                    <label>
                                        <input type="checkbox" name="featured" @checked(old('featured', $category->featured))><span class="label-text">Featured</span>
                                    </label>
                                </div>
                                <div class="animated-checkbox">
                                    <label>
                                        <input type="checkbox" name="menu"  @checked(old('menu', $category->menu))><span class="label-text">Menu</span>
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
