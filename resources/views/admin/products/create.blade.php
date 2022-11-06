@extends('layouts.master')

@section('page-title', 'Products')

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
            <div class="col-md-3">
                <div class="tile p-0">
                    <ul class="nav flex-column nav-tabs user-tabs">
                        <li class="nav-item"><a class="nav-link active" href="#general" data-toggle="tab">General</a></li>
                        <li class="nav-item"><a class="nav-link" href="#images" data-toggle="tab">Product Images</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-9">
                <div class="tab-content">
                    <div class="tab-pane active" id="general">
                        <div class="tile">
                            <form action="{{ route('products.store') }}" method="POST">
                                @csrf
                                <h3 class="tile-title">General Settings</h3>
                                <hr>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Name <b class="text-danger">*</b></label>
                                            <input class="form-control" type="text"
                                                name="name"value="{{ old('name') }}" placeholder="Name">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="parent">Parent Category <span class="text-danger">*</span></label>
                                            <select class="form-control custom-select" name="category_id[]" multiple>
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}" @selected(old('category_id') == $category->id)>
                                                        {{ $category->name }} </option>
                                                @endforeach
                                            </select>

                                            {{-- <div class="tile-body">
                                                <p>This plugin can be used to convert select element into advanced componant.</p>
                                                <h4>Demo</h4>
                                                <select class="form-control select2-hidden-accessible" id="demoSelect" multiple="" tabindex="-1" aria-hidden="true">
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
                                                </select><span class="select2 select2-container select2-container--default select2-container--below" dir="ltr" style="width: 591.5px;"><span class="selection"><span class="select2-selection select2-selection--multiple" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="-1"><ul class="select2-selection__rendered"><li class="select2-selection__choice" title="Ahmedabad"><span class="select2-selection__choice__remove" role="presentation">×</span>Ahmedabad</li><li class="select2-search select2-search--inline"><input class="select2-search__field" type="search" tabindex="0" autocomplete="off" autocorrect="off" autocapitalize="none" spellcheck="false" role="textbox" aria-autocomplete="list" placeholder="" style="width: 0.75em;"></li></ul></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                                            </div> --}}

                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="parent">Brand <span class="text-danger">*</span></label>
                                            <select class="form-control custom-select" name="brand_id">
                                                @foreach ($brands as $brand)
                                                    <option value="{{ $brand->id }}" @selected(old('brand_id') == $brand->id)>
                                                        {{ $brand->name }} </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Price <b class="text-danger">*</b></label>
                                            <input class="form-control" type="text"
                                                name="sale_price"value="{{ old('sale_price') }}" placeholder="Sale Price">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Sale Price <b class="text-danger">*</b></label>
                                            <input class="form-control" type="text"
                                                name="price"value="{{ old('price') }}" placeholder="Price">
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Quantity <b class="text-danger">*</b></label>
                                            <input class="form-control" type="text"
                                                name="quantity"value="{{ old('quantity') }}" placeholder="Quantity">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Weight <b class="text-danger">*</b></label>
                                            <input class="form-control" type="text"
                                                name="weight"value="{{ old('weight') }}" placeholder="Weight">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Description <b class="text-danger">*</b></label>
                                            <textarea class="form-control" name="description" placeholder="Description">{{ old('description') }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="animated-checkbox">
                                            <label>
                                                <input type="checkbox" name="featured" @checked(old('featured'))><span
                                                    class="label-text">Featured</span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="animated-checkbox">
                                            <label>
                                                <input type="checkbox" name="status" @checked(old('status'))><span
                                                    class="label-text">Status</span>
                                            </label>
                                        </div>
                                    </div>
                                    {{-- <div class="form-group">
                                        <label>User Avatar</label>
                                        <input class="form-control" type="file" name="image">
                                    </div> --}}
                                </div>
                                <div class="tile-footer">
                                    <button class="btn btn-primary" type="submit">Save</button>
                                </div>
                        </div>
                        </form>
                    </div>
                    <div class="tab-pane" id="images">
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
                    </div>
                </div>
                <div class="tab-pane fade" id="site-logo">

                </div>
            </div>
        </div>
    </div>
@endsection



@push('scripts')
    <script type="text/javascript" src="{{ asset('js/plugins/dropzone.js') }}"></script>

    <script>
        Dropzone.autoDiscover = false;
    
        $( document ).ready(function() {
            $('#categories').select2();
    
            let myDropzone = new Dropzone("#dropzone", {
                paramName: "image",
                addRemoveLinks: false,
                maxFilesize: 4,
                parallelUploads: 2,
                uploadMultiple: false,
                url: "{{}}",
                autoProcessQueue: false,
            });
            myDropzone.on("queuecomplete", function (file) {
                window.location.reload();
                showNotification('Completed', 'All product images uploaded', 'success', 'fa-check');
            });
            $('#uploadButton').click(function(){
                if (myDropzone.files.length === 0) {
                    showNotification('Error', 'Please select files to upload.', 'danger', 'fa-close');
                } else {
                    myDropzone.processQueue();
                }
            });
            function showNotification(title, message, type, icon)
            {
                $.notify({
                    title: title + ' : ',
                    message: message,
                    icon: 'fa ' + icon
                },{
                    type: type,
                    allow_dismiss: true,
                    placement: {
                        from: "top",
                        align: "right"
                    },
                });
            }
        });
    </script>
@endpush
