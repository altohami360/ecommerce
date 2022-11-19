@extends('layouts.master')

@section('page-title', 'Product Attributes')

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
                        <form action="{{ route('store.product.attribute', $product) }}" method="POST">
                            <div class="tile">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-10">
                                        <h3 class="tile-title">General Settings</h3>
                                    </div>
                                    
                                    <div class="col-lg-2">
                                        <div class="form-group">
                                            <button class="btn btn-primary" id="add" onclick="event.preventDefault()"><i class="fa fa-plus"></i> Add Attribute Field</button>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div id="form">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label for="parent">Attribute <span class="text-danger">*</span></label>
                                                <select class="form-control custom-select" id="first_attribute"
                                                    name="attributes[0][attribute_id]">
                                                    <option value="">...</option>
                                                    @foreach ($attributes as $attribute)
                                                        <option value="{{ $attribute->id }}">
                                                            {{ $attribute->name }} </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label for="parent">Value <span class="text-danger">*</span></label>
                                                <input class="form-control" type="text"
                                                    name="attributes[0][value]"placeholder="Value">
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label for="parent">Sku <span class="text-danger">*</span></label>
                                                <input class="form-control" type="text"
                                                    name="attributes[0][sku]" placeholder="Sku">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label>Price <b class="text-danger">*</b></label>
                                                <input class="form-control" type="text"
                                                    name="attributes[0][price]" placeholder="Price">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label>Quantity <b class="text-danger">*</b></label>
                                                <input class="form-control" type="text"
                                                    name="attributes[0][quantity]" placeholder="Quantity">
                                            </div>
                                        </div>
                                        {{-- <div class="col-lg-1">
                                            <div class="form-group">
                                                <label>Delete</label>
                                                <button class="remove_btn" class="btn btn-md btn-danger" onclick="event.preventDefault()"><i class="fa fa-trash"></i></button>
                                            </div>
                                        </div> --}}
                                    </div>
                                </div>
                                <div class="tile-footer">
                                    <button class="btn btn-primary" type="submit">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    {{-- <div class="tab-pane" id="images">
                        <div class="tile">
                            <h3 class="tile-title">Upload Image</h3>
                            <hr>
                            <div class="tile-body">

                                <div class="row">
                                    <div class="col-md-12">
                                        <form class="text-center dropzone" id="dropzone">
                                            <div class="dz-message">Drop files here or click to upload</div>
                                            @csrf
                                            <input type="hidden" name="product_id" value="">
                                        </form>
                                    </div>
                                </div>
                                <div class="row d-print-none mt-2">
                                    <div class="col-12 text-right">
                                        <button class="btn btn-success" type="button" id="uploadButton">
                                            <i class="fa fa-fw fa-lg fa-upload"></i>Upload Images
                                        </button>
                                    </div>
                                </div>

                                @if (isset($product->images))
                                    <hr>
                                    <div class="row">
                                        @foreach ($product->images as $image)
                                            <div class="col-md-3">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <img src="{{ asset('storage/' . $image->full) }}" id="brandLogo"
                                                            class="img-fluid" alt="img">
                                                        <a class="card-link float-right text-danger"
                                                            href="{{ route('admin.products.images.delete', $image->id) }}">
                                                            <i class="fa fa-fw fa-lg fa-trash"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div> --}}
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
            var limit = 15;
            
            // Get Attribute items from select feild attributes
            attributeOption = $('.tile').find('#first_attribute').html();

            $('#form').on('click','.remove_btn', function(){
                $(this).parent().parent().parent().remove();
                maxCount -= 1;
            });
            
            $('#add').click(function() {
                if (maxCount < limit) {
                    index += 1;
                    maxCount += 1;
                    $('#form').append(`
                    <hr>
                    <div class="row"  id="${index}">
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label for="parent">Attribute <span class="text-danger">*</span></label>
                                                <select class="form-control custom-select" id="first_attribute"
                                                    name="attributes[${index}][attribute_id]">
                                                    <option value="">...</option>
                                                    @foreach ($attributes as $attribute)
                                                        <option value="{{ $attribute->id }}">
                                                            {{ $attribute->name }} </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label for="parent">Value <span class="text-danger">*</span></label>
                                                <input class="form-control" type="text"
                                                    name="attributes[${index}][value]"placeholder="Value">
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label for="parent">Sku <span class="text-danger">*</span></label>
                                                <input class="form-control" type="text"
                                                    name="attributes[${index}][sku]" placeholder="Sku">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label>Price <b class="text-danger">*</b></label>
                                                <input class="form-control" type="text"
                                                    name="attributes[${index}][price]" placeholder="Price">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label>Quantity <b class="text-danger">*</b></label>
                                                <input class="form-control" type="text"
                                                    name="attributes[${index}][quantity]" placeholder="Quantity">
                                            </div>
                                        </div>
                                        <div class="col-lg-1">
                                <div class="form-group">
                                    <label style="display:block;"></label>
                                    <button 
                                        class="remove_btn btn btn-danger w-100" 
                                        onclick="event.preventDefault()"
                                    >
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </div>
                            </div>
                                    </div>
                                    
                                    `
                    );
                    
                    // Add Attribute items to select field
                    $('.tile').find(`#${index}`).find('#attribute').append(attributeOption);
                }
            })
        })

        // $(document).ready(function() {
        //     $('#attribute').change(function() {
        //         var $value = $('#value');
        //         var attribute_id = $(this).val();
        //         var url = "{{ route('values.index', ':id') }}";
        //         url = url.replace(':id', attribute_id);
        //         $.ajax({
        //             url: url,
        //             success: function(data) {
        //                 $value.html('<option value="">...</option>');
        //                 $.each(data, function(id, value) {
        //                     $value.append('<option value="' + value.id + '">' + value
        //                         .value + '</option>');
        //                 });
        //             }
        //         })
        //         $('#value').val('');
        //     })
        // })

        // $(document).ready(function() {
        //     $('#attribute').change(function() {
        //         var $value = $('#value');
        //         var attribute_id = $(this).val();
        //         var url = "{{ route('values.index', ':id') }}";
        //         url = url.replace(':id', attribute_id);
        //         $.ajax({
        //             url: url,
        //             success: function(data) {
        //                 $value.html('<option value="">...</option>');
        //                 $.each(data, function(id, value) {
        //                     $value.append('<option value="' + value.id + '">' + value
        //                         .value + '</option>');
        //                 });
        //             }
        //         })
        //         $('#value').val('');
        //     })
        // })
    </script>
@endpush
