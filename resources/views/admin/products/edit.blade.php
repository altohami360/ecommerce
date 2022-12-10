@extends('layouts.master')

@section('page-title', 'Edit Product')

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
                        <form action="{{ route('products.update', $product) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="tile">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Name <b class="text-danger">*</b></label>
                                            <input class="form-control" type="text"
                                                name="name" value="{{ $product->name }}" placeholder="Name">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="parent">Parent Category <span class="text-danger">*</span></label>
                                            <select class="form-control custom-select" name="category_id[]" multiple>
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}" @selected($category->checked)>
                                                        {{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="parent">Brand <span class="text-danger">*</span></label>
                                            <select class="form-control custom-select" name="brand_id">
                                                @foreach ($brands as $brand)
                                                    <option value="{{ $brand->id }}" @selected($product->brand_id == $brand->id)>
                                                        {{ $brand->name }} </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Price <b class="text-danger">*</b></label>
                                            <input class="form-control" type="text"
                                                name="sale_price"value="{{ $product->sale_price }}" placeholder="Sale Price">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Sale Price <b class="text-danger">*</b></label>
                                            <input class="form-control" type="text"
                                                name="price"value="{{ $product->price }}" placeholder="Price">
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Quantity <b class="text-danger">*</b></label>
                                            <input class="form-control" type="text"
                                                name="quantity"value="{{ $product->quantity }}" placeholder="Quantity">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Weight <b class="text-danger">*</b></label>
                                            <input class="form-control" type="text"
                                                name="weight"value="{{ $product->weight }}" placeholder="Weight">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Description <b class="text-danger">*</b></label>
                                            <textarea class="form-control" name="description" placeholder="Description">{{ $product->description }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="animated-checkbox">
                                            <label>
                                                <input type="checkbox" name="featured" @checked($product->featured)><span
                                                    class="label-text">Featured</span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="animated-checkbox">
                                            <label>
                                                <input type="checkbox" name="status" @checked($product->status)><span
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
