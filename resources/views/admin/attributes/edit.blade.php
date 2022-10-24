@extends('layouts.master')

@section('page-title', 'Attribute')

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
                <form action="{{ route('attributes.update', $attribute) }}" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>Code <b class="text-danger">*</b></label>
                                <input class="form-control" type="text" name="code" value="{{ old('code', $attribute->code) }}"
                                    placeholder="Code">
                            </div>
                            <div class="form-group">
                                <label>Name <b class="text-danger">*</b></label>
                                <input class="form-control" type="text" name="name" value="{{ old('name', $attribute->name) }}"
                                    placeholder="Name">
                            </div>
                            @php
                                $frontend_types = [
                                    'select' => 'Select', 
                                    'radio' => 'Radio', 
                                    'text' => 'Text',
                                    'text_area' => 'Text Area'
                                ];
                            @endphp
                            <div class="form-group">
                                <label for="parent">Parent Category <span class="text-danger"> *</span></label>
                                <select class="form-control custom-select" name="frontend_type">
                                    <option>Front-End Type</option>
                                    @foreach ($frontend_types as $key => $type)
                                        <option value="{{ $key }}" @selected(old('key', $attribute->frontend_type) == $key)>
                                            {{ $type }} </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="animated-checkbox">
                                <label>
                                    <input type="checkbox" name="is_required" @checked(old('is_required', $attribute->is_required))><span
                                        class="label-text">Is Required</span>
                                </label>
                            </div>
                            <div class="animated-checkbox">
                                <label>
                                    <input type="checkbox" name="is_filterable" @checked(old('is_filterable', $attribute->is_filterable))><span
                                        class="label-text">Is Filterable</span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="tile-footer">
                        <button class="btn btn-primary" type="submit">Save</button>
                    </div>
                </form>
            </div>
        </div>
    @endsection
