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
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <input type="text" id="data-table-search" class="form-control" autofocus=""
                                placeholder="Search">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-hover table-bordered" id="sampleTable">
                            <thead>
                                <tr>
                                    <th> # </th>
                                    <th> Name </th>
                                    {{-- <th> Slug </th>
                                    <th> Brand </th>
                                    <th> Price </th>
                                    <th class="text-center"> Categories </th> --}}
                                    <th class="text-center"> Attributes </th>
                                    <th> Status </th>
                                    {{-- <th class="text-center"> Featured </th>
                                    <th class="text-center"> Menu </th>
                                    <th class="text-center"> Order </th> --}}
                                    <th style="width:100px; min-width:100px;" class="text-center text-danger"><i
                                            class="fa fa-bolt"> </i></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                    <tr>
                                        <td>{{ $product->id }}</td>
                                        <td>{{ $product->name }}</td>
                                        {{-- <td>{{ $product->slug }}</td>
                                        <td>{{ $product->brand->name }}</td>
                                        <td>{{ $product->price }}$</td>
                                        <td class="text-center">
                                            @foreach ($product->categories as $category)
                                                <span class='badge badge-success'>
                                                    {{ $category->name }}
                                                </span>
                                            @endforeach
                                        </td> --}}
                                        <td class="text-center">

                                            @foreach ($product->productsAttributes as $productAttribute)
                                                
                                                {{$productAttribute->attribute->name}}    

                                                <span class='badge badge-success'>
                                                    {{ $productAttribute->attributeValue->value }}
                                                </span>
                                                <br>
                                            @endforeach

                                        </td>
                                        <td class="text-center">
                                            <span class='badge badge-{{ $product->status ? 'success' : 'danger' }}'>
                                                {{ $product->status ? 'Active' : 'Not Active' }}
                                            </span>
                                        </td>
                                        {{-- <td class="text-center">
                                            <span class='badge badge-{{ $product->menu ? 'success' : 'danger' }}'>
                                                {{ $product->menu ? 'Yes' : 'NO' }}
                                            </span>
                                        </td>
                                        <td>{{ $product->order }}</td> --}}
                                        <td>
                                            <a class="btn btn-warning btn-sm"
                                                href="{{ route('products.edit', $product) }}">Edit</a>
                                            <form action="{{ route('products.destroy', $product) }}" method="post"
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
                </div>
            </div>
        </div>
    </div>


@endsection
