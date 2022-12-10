@extends('layouts.master')

@section('page-title', 'Brands')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="tile shadow">
                <div class="row mb-3">
                    <div class="col-md-12">
                        <a href="{{ route('brands.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Create New
                            Brands</a>
                    </div>
                </div>
                <form action="{{ route('brands.index') }}" method="get">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <div class="input-group">
                                    <input class="form-control"  name="searchTerm" value="{{ $searchTerm }}" placeholder="Search">
                                    <div class="input-group-append">
                                        <select class="form-control custom-select" name="column">
                                            <option value="name">Name</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Search</button>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-hover table-bordered" id="sampleTable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Slug</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($brands as $brand)
                                    <tr>
                                        <td>{{ $brand->id }}</td>
                                        <td>{{ $brand->name }}</td>
                                        <td>{{ $brand->slug }}</td>
                                        <td>
                                            <a class="btn btn-warning btn-sm" href="{{ route('brands.edit', $brand) }}">Edit</a>
                                            <form action="{{ route('brands.destroy', $brand) }}" method="post"
                                                style="display: inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div><!-- end of tile -->

            </div>
        </div>
    </div>
@endsection
