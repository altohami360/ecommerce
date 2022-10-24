@extends('layouts.master')

@section('page-title', 'Attributes')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="tile shadow">
                <div class="row mb-3">
                    <div class="col-md-12">
                        <a href="{{ route('attributes.create') }}" class="btn btn-primary">
                            <i class="fa fa-plus"></i>
                            Create New Attribute
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
                                    <th> Code </th>
                                    <th> Name </th>
                                    <th> Front-End Type </th>
                                    <th class="text-center"> Is Filterable </th>
                                    <th class="text-center"> Is Required </th>
                                    <th style="width:100px; min-width:100px;" class="text-center text-danger"><i
                                            class="fa fa-bolt"> </i></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($attributes as $attribute)
                                    <tr>
                                        <td>{{ $attribute->id }}</td>
                                        <td>{{ $attribute->code }}</td>
                                        <td>{{ $attribute->name }}</td>
                                        <td>{{ $attribute->frontend_type }}</td>
                                        <td class="text-center">
                                            <span class='badge badge-{{ $attribute->is_filterable ? 'success' : 'danger' }}'>
                                                {{ $attribute->is_filterable ? 'Yes' : 'NO' }}
                                            </span>
                                        </td>
                                        <td class="text-center">
                                            <span class='badge badge-{{ $attribute->is_required ? 'success' : 'danger' }}'>
                                                {{ $attribute->is_required ? 'Yes' : 'NO' }}
                                            </span>
                                        </td>
                                  
                                        <td>
                                            <a class="btn btn-warning btn-sm"
                                                href="{{ route('attributes.edit', $attribute) }}">Edit</a>

                                            <form action="{{ route('attributes.destroy', $attribute) }}" method="post"
                                                style="display: inline-block;">
                                                @method('DELETE')
                                                @csrf
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
