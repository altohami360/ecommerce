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
                        <div class="tile">
                            <div class="row">
                                <div class="col-md-12">
                                    <form action="{{ route('store.product.attribute', $product) }}" method="POST">
                                        @csrf
                                        <div class="row">
                                            <div class="col-lg-10">
                                                {{-- <h3 class="tile-title">General Settings</h3> --}}
                                            </div>
                                            
                                                <div class="col-lg-2">
                                                    <div class="form-group">
                                                        <button class="btn btn-primary" id="add" onclick="event.preventDefault()"><i class="fa fa-plus"></i> Add Attribute Field</button>
                                                    </div>
                                                </div>
                                            
                                        </div>

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
                                    </form>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-6">
                                    <table class="table table-hover table-bordered" id="sampleTable">
                                        <thead>
                                            <tr>
                                                <th> # </th>
                                                <th> Attribute </th>
                                                <th> value </th>
                                                <th> SKU </th>
                                                <th> Price </th>
                                                <th> Quantity </th>
                                                <th>  </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($productAttribtues as $productAttribute)
                                                <tr>
                                                    <td>{{ $productAttribute->id }}</td>
                                                    <td>{{ $productAttribute->attribute->name }}</td>
                                                    <td>{{ $productAttribute->value }}</td>
                                                    <td>{{ $productAttribute->sku }}</td>
                                                    <td>{{ $productAttribute->price }}</td>
                                                    <td>{{ $productAttribute->quantity }}</td>
                                                    <td>
                                                        <form action="{{ route('delete.product.attribute', [$product, $productAttribute->id]) }}" method="post"
                                                            style="display: inline;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button class="btn btn-danger" type="submit">Delete</button>
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

                var lastID = $('#form > .row:last-child').attr('id');

                if (lastID != null && lastID != 0) {
                    console.log('last id');
                    index = Number(lastID);
                }
                
                if (maxCount < limit) {
                    index += 1;
                    maxCount += 1;
                    $('#form').append(`
                    <div class="row"  id="${index}">
                                        <div class="col-lg-2">
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
                                        <div class="col-lg-2">
                                            <div class="form-group">
                                                <label for="parent">Value <span class="text-danger">*</span></label>
                                                <input class="form-control" type="text"
                                                    name="attributes[${index}][value]"placeholder="Value">
                                            </div>
                                        </div>
                                        <div class="col-lg-2">
                                            <div class="form-group">
                                                <label for="parent">Sku <span class="text-danger">*</span></label>
                                                <input class="form-control" type="text"
                                                    name="attributes[${index}][sku]" placeholder="Sku">
                                            </div>
                                        </div>
                                        <div class="col-lg-2">
                                            <div class="form-group">
                                                <label>Price <b class="text-danger">*</b></label>
                                                <input class="form-control" type="text"
                                                    name="attributes[${index}][price]" placeholder="Price">
                                            </div>
                                        </div>
                                        <div class="col-lg-2">
                                            <div class="form-group">
                                                <label>Quantity <b class="text-danger">*</b></label>
                                                <input class="form-control" type="text"
                                                    name="attributes[${index}][quantity]" placeholder="Quantity">
                                            </div>
                                        </div>
                                        <div class="col-lg-1">
                                <div class="form-group">
                                    <label style="display:block;">Delete</label>
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
    </script>
@endpush



                                        {{-- <div id="form"> --}}
                                        {{-- @forelse ($productAttribtues as $key => $productAttribute)
                                                <div class="row" id="{{ $key }}">
                                                    <div class="col-lg-2">
                                                        <div class="form-group">
                                                            <label for="parent">Attribute <span class="text-danger">*</span></label>
                                                            <select class="form-control custom-select" id="first_attribute"
                                                                name="attributes[{{$key}}][attribute_id]">
                                                                <option value="">...</option>
                                                                @foreach ($attributes as $attribute)
                                                                    <option value="{{ $attribute->id }}" @selected($productAttribute->attribute_id == $attribute->id)>
                                                                        {{ $attribute->name }} </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-2">
                                                        <div class="form-group">
                                                            <label for="parent">Value <span class="text-danger">*</span></label>
                                                            <input class="form-control" type="text"
                                                                name="attributes[{{$key}}][value]" value="{{ $productAttribute->value }}" placeholder="Value">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-2">
                                                        <div class="form-group">
                                                            <label for="parent">Sku <span class="text-danger">*</span></label>
                                                            <input class="form-control" type="text"
                                                                name="attributes[{{ $key }}][sku]" value="{{ $productAttribute->sku }}" placeholder="Sku">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-2">
                                                        <div class="form-group">
                                                            <label>Price <b class="text-danger">*</b></label>
                                                            <input class="form-control" type="text"
                                                                name="attributes[{{ $key }}][price]" value="{{ $productAttribute->price }}" placeholder="Price">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-2">
                                                        <div class="form-group">
                                                            <label>Quantity <b class="text-danger">*</b></label>
                                                            <input class="form-control" type="text"
                                                                name="attributes[{{ $key }}][quantity]" value="{{ $productAttribute->quantity }}" placeholder="Quantity">
                                                        </div>
                                                    </div>
                                                </div>
                                        @empty
                                            
                                            <div id="form">
                                                <div class="row" id="0">
                                                    <div class="col-lg-2">
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
                                                    <div class="col-lg-2">
                                                        <div class="form-group">
                                                            <label for="parent">Sku <span class="text-danger">*</span></label>
                                                            <input class="form-control" type="text"
                                                                name="attributes[0][sku]" placeholder="Sku">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-2">
                                                        <div class="form-group">
                                                            <label>Price <b class="text-danger">*</b></label>
                                                            <input class="form-control" type="text"
                                                                name="attributes[0][price]" placeholder="Price">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-2">
                                                        <div class="form-group">
                                                            <label>Quantity <b class="text-danger">*</b></label>
                                                            <input class="form-control" type="text"
                                                                name="attributes[0][quantity]" placeholder="Quantity">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforelse --}}
                                        {{-- </div> --}}