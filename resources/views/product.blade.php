@extends('layouts.site') 

@section('content')
    <div class="row">
        <aside class="col-lg-6"> 
            <article class="gallery-wrap"> 
                @foreach ($product->images as $image)
                    @if ($loop->first)
                        <div class="img-big-wrap img-thumbnail"> 
                            <a href="#"> 
                                <img height="520" src="{{ asset('storage/' . $image->path) }}"> 
                            </a> 
                        </div>
                    @else
                        <div class="thumbs-wrap"> 
                            <a href="#" class="item-thumb"> 
                                <img width="60" height="60" src="{{ asset('storage/' . $image->path) }}"> 
                            </a>
                        </div>
                    @endif
                @endforeach
            </article> <!-- gallery-wrap .end// -->
        </aside>
            <div class="col-lg-6"> 
                <article class="ps-lg-3"> 
                    <h4 class="title text-dark">{{ $product->name }}</h4> 
                    <div class="rating-wrap my-3">  
                        <span class="label-rating text-success">Verified</span> 
                        <br>
                        <strong>Brand : </strong>{{ $product->brand->name }}
                    </div> 
                    <div class="mb-3"> 
                        <var class="price h5">${{ $product->price }}</var> 
                        <span class="text-muted"></span> 
                    </div> 
                    <p>{{ $product->description }}</p>
                    <div class="row"> 
                        <div class="col-md-3 mb-3"> 
                            <select class="form-select"> 
                                <option selected="">Select size</option> 
                                <option>Small</option> 
                                <option>Medium</option> 
                                <option>Large</option> 
                            </select> 
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md mb-3"> 
                            <div class="mt-2"> 
                                <label class="form-check form-check-inline"> 
                                    <input class="form-check-input" type="radio" name="choose_11" value="option1"> 
                                    <span class="form-check-label">Red</span> 
                                </label> 
                            </div> 
                        </div> 
                    </div> 
                    <a href="#" class="btn btn-primary"> 
                        <i class="me-2 fa fa-shopping-basket"></i> Add to cart 
                    </a> 
                </article>
            </div> 
        </div>
    </div>
                            
@endsection