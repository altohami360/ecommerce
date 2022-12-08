@extends('layouts.master')

@section('page-title', 'Customers')

@section('content')
    <div class="row">
        <div class="col-md-12">

            <div class="tile shadow">

                <div class="row mb-3">

                    <div class="col-md-12">

                        <a href="{{ route('users.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Create New
                            Customer</a>

                    </div>

                </div><!-- end of row -->

                <div class="row">

                    <div class="col-md-4">
                        <div class="form-group">
                            <input type="text" id="data-table-search" class="form-control" autofocus=""
                                placeholder="Search">
                        </div>
                    </div>
                    {{-- <div class="col-md-4">
                            <div class="form-group">
                                <select class="form-control" id="demoSelect">
                                    <optgroup label="Select Cities">
                                        <option>Ahmedabad</option>
                                        <option>Surat</option>
                                        <option>Vadodara</option>
                                        <option>Rajkot</option>
                                        <option>Bhavnagar</option>
                                        <option>Jamnagar</option>
                                        <option>Gandhinagar</option>
                                        <option>Nadiad</option>
                                        <option>Morvi</option>
                                        <option>Surendranagar</option>
                                        <option>Junagadh</option>
                                        <option>Gandhidham</option>
                                        <option>Veraval</option>
                                        <option>Ghatlodiya</option>
                                        <option>Bharuch</option>
                                        <option>Anand</option>
                                        <option>Porbandar</option>
                                        <option>Godhra</option>
                                        <option>Navsari</option>
                                        <option>Dahod</option>
                                        <option>Botad</option>
                                        <option>Kapadwanj</option>
                                    </optgroup>
                                </select>
                            </div>
                        </div> --}}

                </div><!-- end of row -->

                <div class="row">

                    <div class="col-md-12">
                        <table class="table table-hover table-bordered" id="sampleTable">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>
                                            {{-- <a class="btn btn-primary btn-sm" href="">Info</a> --}}
                                            <a class="btn btn-warning btn-sm" href="{{ route('users.edit', $user) }}">Edit</a>
                                            <form action="{{ route('users.destroy', $user) }}" method="post"
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
