@extends('layouts.master')

@section('page-title', 'Product Images')

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
            <div class="col-md-12">
                <div class="tab-content">
                    <div class="tab-pane active" id="attributes">
                        <div class="tile">
                            <div class="row">
                                {{-- <div class="col-lg-10">
                                    <h3 class="tile-title">Images</h3>
                                </div>
                                
                                <div class="col-lg-2">
                                    <div class="form-group">
                                        <button class="btn btn-primary" id="add" onclick="event.preventDefault()"><i class="fa fa-plus"></i> Add Attribute Field</button>
                                    </div>
                                </div> --}}
                            </div>
                            <form action="{{ route('store.product.image', $product) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                {{-- <input type="hidden" name="product_id" value="{{ $product->id }}"> --}}
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label>Image</label>
                                            <input type="file" class="form-control form-control-file" name="image">
                                        </div>
                                    </div>
                                    <div class="col-lg-1">
                                        <div class="form-group">
                                            <label>Submit</label>
                                            <button class="btn btn-primary" type="submit">Save image</button>
                                        </div>
                                    </div>
                                </div>
                            
                            </form>
                            <br><br>

                            <div class="row">
                                @foreach ($productImages as $image)
                                <div class="col-lg-3">
                                    <div class="bs-component">
                                        <div class="card">
                                            <div class="card-body">
                                                <img style="height: auto; width: 100%; display: block;" src="{{ asset('storage/' . $image->path) }}" alt="igm">
                                            </div>
                                            <div class="card-body">
                                                <form action="{{ route('delete.product.image', [$product, $image]) }}" method="post"
                                                    style="display: inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger" type="submit">Delete</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>

                            {{-- <table class="table table-hover table-bordered" id="sampleTable">
                                <thead>
                                    <tr>
                                        <th> # </th>
                                        <th> path </th>
                                        <th> igm </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($productImages as $image)
                                        <tr>
                                            <td>{{ $image->id }}</td>
                                            <td>{{ asset($image->path) }}</td>
                                            <td><img class="w-25" src="{{ asset('storage/' . $image->path) }}" alt="igm"></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection



@push('scripts')
    <script type="text/javascript" src="{{ asset('js/plugins/dropzone.js') }}"></script>

    <script>
        $(document).ready(function() {

            var index = 0;
            var maxCount = 1;
            var limit = 5;
            
            // Get Attribute items from select feild attributes
            attributeOption = $('.tile').find('#first_attribute').html();

            $('#form').on('click','.remove_btn', function(){
                $(this).parent().parent().parent().remove();
                maxCount -= 1;
            });
            
            $('#add').click(function() {

                var lastID = $('#form > .row:last-child').attr('id');

                if (lastID != null && lastID != 0) {
                    console.log('last id');
                    index = Number(lastID);
                }
                
                if (maxCount < limit) {
                    index += 1;
                    maxCount += 1;
                    $('#form').append(`
                        <div class="row" id="${index}">

                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label>Image</label>
                                                    <input class="form-control" name="images[]" type="file" placeholder="Amount">
                                                </div>
                                            </div>
                                            <div class="col-lg-1">
                                                <div class="form-group">
                                                    <label>Delete</label>
                                                    <button class="btn btn-danger btn-sm remove_btn" class="btn btn-md btn-danger" onclick="event.preventDefault()"><i class="fa fa-trash"></i></button>
                                                </div>
                                            </div>
                                        </div>
                    `);
                    
                    // Add Attribute items to select field
                    $('.tile').find(`#${index}`).find('#attribute').append(attributeOption);
                }
            })
        })
    </script>
@endpush
