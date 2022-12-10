@extends('layouts.master')

@section('page-title', 'Products')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="tile shadow">
                <div class="row mb-3">
                    <div class="col-md-12">
                        <a href="{{ route('products.create') }}" class="btn btn-primary">
                            <i class="fa fa-plus"></i>
                            Create New Product
                        </a>
                    </div>
                </div>
                <form action="{{ route('products.index') }}" method="get">
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
                                    <th> # </th>
                                    <th> Name </th>
                                    <th> Slug </th>
                                    <th> sku </th>
                                    <th> Brand </th>
                                    <th> Price </th>
                                    <th  class="text-center w-25"> Categories </th>
                                    {{-- <th class="text-center"> Attributes </th> --}}
                                    {{-- <th class="text-center"> Images </th> --}}
                                    <th> Status </th>
                                    <th style="" class="text-center text-danger"><i
                                            class="fa fa-bolt"> </i></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                    <tr>
                                        <td>{{ $product->id }}</td>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ $product->slug }}</td>
                                        <td>SKU</td>
                                        <td>{{ $product->brand->name ?? '' }}</td>
                                        <td>{{ $product->price }}$</td>
                                        <td class="text-center">
                                            @foreach ($product->categories as $category)
                                                <span class='badge badge-success'>
                                                    {{ $category->name }}
                                                </span>
                                            @endforeach
                                        </td>
                                        {{-- Attribtue --}}
                                        {{-- <td class="text-center">
                                            @forelse ($product->attributes as $attributes)   

                                                
                                                @foreach ($attributes as $a)
                                                   
                                                    <span class='badge badge-primary'>{{ $a['name'] }} </span>  <i class="fa fa-arrow-right"></i>

                                                    @foreach ($a['value'] as $item)
                                                        <span class='badge badge-success'>{{ $item->value }} </span>  
                                                    @endforeach
                                                    <br>
                                                @endforeach

                                            @empty
                                                <a href="{{ route('create.product.attribute', $product->id) }}" class="btn btn-primary btn-sm">
                                                    <i class="fa fa-plus"></i>
                                                    Add Attribute
                                                </a>
                                            @endforelse 
                                        </td> --}}
                                        {{-- Images --}}
                                        {{-- <td class="text-center">
                                            @forelse ($product->images as $image)   

                                            {{ $image->thumbnail }}

                                            @empty
                                                <a href="#" class="btn btn-success btn-sm">
                                                    <i class="fa fa-plus"></i>
                                                    Add Images
                                                </a>
                                            @endforelse 
                                        </td> --}}
                                        <td class="text-center">
                                            <span class='badge badge-{{ $product->status ? 'success' : 'danger' }}'>
                                                {{ $product->status ? 'Active' : 'Not Active' }}
                                            </span>
                                        </td>
                                        <td>

                                            
                                            <a class="btn btn-info btn-sm"
                                            href="">show</a>
                                            <a class="btn btn-success btn-sm"
                                            href="{{ route('products.edit', $product->id) }}">Edit</a>
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                            <button class="btn btn-secondary btn-sm dropdown-toggle" id="btnGroupDrop4" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
                                            
                                                <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(36px, 37px, 0px);">
                                                    <a class="dropdown-item" href="{{ route('product.attribute', $product) }}">
                                                        <i class="fa fa-list"></i>
                                                        Attribtues
                                                    </a>
                                                    <a class="dropdown-item" href="{{ route('product.image', $product) }}">
                                                        <i class="fa fa-file-image-o"></i>
                                                        Images
                                                    </a>

                                                    <a class="dropdown-item text-danger" href="#" onclick="event.preventDefault(); document.getElementById('delete-form-{{  $product->id }}').submit();">
                                                        <i class="fa fa-trash"></i>
                                                        Delete
                                                    </a>

                                                    <form id="delete-form-{{  $product->id }}" action="{{ route('products.destroy', $product) }}" method="post"
                                                        style="display: none;">
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
