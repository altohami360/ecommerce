@extends('layouts.master')

@section('page-title', 'Test')

@section('content')
    <div class="row">
        <div class="col-md-12">

            <div class="tile shadow">

                <div class="row">

                    <div class="col-md-12">
                        <table class="table table-hover table-bordered" id="sampleTable">
                            <thead>
                                <th>name</th>
                                <th>slug</th>
                                <th>attribute</th>
                            </thead>
                            <tbody>
                                @foreach ($data as $item)
                                    <tr>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->attributeValues }} - </td>
                                        <td>
                                            {{-- @foreach ($item->attributes as $i)
                                                <span>-attribute :{{ $i->attribute_id }} <br></span>
                                                <span>-value : {{ $i->attribute_value_id }} <br></span>
                                            @endforeach --}}
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
