@extends('layouts.master')

@section('page-title', 'Products')

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
            <div class="col-md-9">
                <div class="tab-content">
                    <div class="tab-pane active" id="general">
                        <form action="{{ route('products.store') }}" method="POST">
                            <div class="tile">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Name <b class="text-danger">*</b></label>
                                            <input class="form-control" type="text"
                                                name="name"value="{{ old('name') }}" placeholder="Name">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="parent">Parent Category <span class="text-danger">*</span></label>
                                            <select class="form-control custom-select" name="category_id[]" multiple>
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}" @selected(old('category_id') == $category->id)>
                                                        {{ $category->name }} </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="parent">Brand <span class="text-danger">*</span></label>
                                            <select class="form-control custom-select" name="brand_id">
                                                @foreach ($brands as $brand)
                                                    <option value="{{ $brand->id }}" @selected(old('brand_id') == $brand->id)>
                                                        {{ $brand->name }} </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Price <b class="text-danger">*</b></label>
                                            <input class="form-control" type="text"
                                                name="sale_price"value="{{ old('sale_price') }}" placeholder="Sale Price">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Sale Price <b class="text-danger">*</b></label>
                                            <input class="form-control" type="text"
                                                name="price"value="{{ old('price') }}" placeholder="Price">
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Quantity <b class="text-danger">*</b></label>
                                            <input class="form-control" type="text"
                                                name="quantity"value="{{ old('quantity') }}" placeholder="Quantity">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Weight <b class="text-danger">*</b></label>
                                            <input class="form-control" type="text"
                                                name="weight"value="{{ old('weight') }}" placeholder="Weight">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Description <b class="text-danger">*</b></label>
                                            <textarea class="form-control" name="description" placeholder="Description">{{ old('description') }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="animated-checkbox">
                                            <label>
                                                <input type="checkbox" name="featured" @checked(old('featured'))><span
                                                    class="label-text">Featured</span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="animated-checkbox">
                                            <label>
                                                <input type="checkbox" name="status" @checked(old('status'))><span
                                                    class="label-text">Status</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="tile-footer">
                                    <button class="btn btn-primary" type="submit">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="tab-pane fade" id="site-logo">

                </div>
            </div>
        </div>
    </div>
@endsection
