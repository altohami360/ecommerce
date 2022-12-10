@extends('layouts.master')

@section('page-title', 'Categories')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="tile shadow">
                <div class="row mb-3">
                    <div class="col-md-12">
                        <a href="{{ route('categories.create') }}" class="btn btn-primary">
                            <i class="fa fa-plus"></i>
                            Create New Category
                        </a>
                    </div>
                </div>
                <form action="{{ route('categories.index') }}" method="get">
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
                                    <th class="text-center"> Parent </th>
                                    <th class="text-center"> Featured </th>
                                    <th class="text-center"> Menu </th>
                                    <th class="text-center"> Order </th>
                                    <th style="width:100px; min-width:100px;" class="text-center text-danger"><i
                                            class="fa fa-bolt"> </i></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $category)
                                    <tr>
                                        <td>{{ $category->id }}</td>
                                        <td>{{ $category->name }}</td>
                                        <td>{{ $category->slug }}</td>
                                        <td>{{ $category->parent->name ?? '' }}</td>
                                        <td class="text-center">
                                            <span class='badge badge-{{ $category->featured ? 'success' : 'danger' }}'>
                                                {{ $category->featured ? 'Yes' : 'NO' }}
                                            </span>
                                        </td>
                                        <td class="text-center">
                                            <span class='badge badge-{{ $category->menu ? 'success' : 'danger' }}'>
                                                {{ $category->menu ? 'Yes' : 'NO' }}
                                            </span>
                                        </td>
                                        <td>{{ $category->order }}</td>
                                        <td>
                                            <a class="btn btn-warning btn-sm"
                                                href="{{ route('categories.edit', $category) }}">Edit</a>
                                            <form action="{{ route('categories.destroy', $category) }}" method="post"
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


    <!-- Create Modal -->
    {{-- <div class="modal fade bd-example-modal-lg" id="create-modal" tabindex="-1" role="dialog"
            aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>

                    </div>
                    <form action="{{ route('categories.store') }}" method="post">
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    @csrf

                                    <div class="form-group">
                                        <label>Name <b class="text-danger">*</b></label>
                                        <input class="form-control" type="text" name="name" value=""
                                            placeholder="Name">
                                    </div>
                                    <div class="form-group">
                                        <textarea class="form-control" name="description" id="" cols="30" rows="10"></textarea>
                                    </div>

                                    <div class="form-group">
                                        <label>User Avatar</label>
                                        <input class="form-control-file" type="file" name="avatar">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div> --}}

    <!-- Edit Modal -->
    {{-- <div class="modal fade bd-example-modal-lg" id="edit-modal" tabindex="-1" role="dialog"
            aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>

                    </div>
                    <form action="{{ route('categories.update', $category) }}" method="post" id="edit-form">
                        @csrf
                        @method('PUT')
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <input type="text" name="id" id="categorey-id">
                                        <label>Name <b class="text-danger">*</b></label>
                                        <input class="form-control" id="categorey-name" type="text" name="name" value=""
                                            placeholder="Name">
                                    </div>
                                    <div class="form-group">
                                        <textarea class="form-control" id="categorey-description" name="description" cols="30" rows="10"></textarea>
                                    </div>

                                    <div class="form-group">
                                        <label>User Avatar</label>
                                        <input class="form-control-file" type="file" name="avatar">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" id="btn-update">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div> --}}
@endsection

@push('scripts')
    {{-- @if (!empty(Session::get('errors')) && Session::get('error_code') == 5)
        <script>
            $(function() {
                $('#edit-modal').modal('show');
            });
        </script>
    @endif
        <script>
            $(document).ready(function() {
                
                // $('#create-modal').modal('show');

                $('.btn-edit').click(function(){
                    var id = $(this).val();
                    var url = "{{ route('categories.edit', ":id") }}";
                    url = url.replace(':id', id);
                    $.ajax({
                        url: url,
                        success: function(data) {
                            $('#categorey-id').val(data.id);
                            $('#categorey-name').val(data.name);
                            $('#categorey-description').text(data.description);
                        }
                    });
                });
                
                $('.btn-update').click(function(){
                    var id = $('#categorey-id').val();
                    var name = $('#categorey-name').val();
                    var description = $('#categorey-description').val();

                    var url = "{{ route('categories.update', ":id") }}";
                    url = url.replace(':id', id);

                    $('#edit-form').action(url);
                    alert(url);
                    $.ajax({
                        type: "PUT",
                        url: url,
                        success: function(data) {
                            $('#categorey-id').val(data.id);
                            $('#categorey-name').val(data.name);
                            $('#categorey-description').text(data.description);
                        }
                    });
                });
            });
        </script> --}}
@endpush
