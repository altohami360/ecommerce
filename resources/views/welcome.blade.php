@extends('layouts.site')

@section('content')
    <header class="section-heading">
		<h3 class="section-title">New products</h3>
	</header> 

	<div class="row">
    @foreach ($products as $product)
        <div class="col-lg-3 col-sm-6 col-12"> 
      <div class="card card-product-grid"> 
        <div class="img-wrap"> 
          {{-- @isset($product->images)
            @foreach ($product->images as $image)
            <img src="{{ asset('storage/'. $images->path) }}"> 
            @endforeach
          @endisset --}}
        </div> 
        <div class="info-wrap border-top"> 
          <div class="price-wrap"> 
            <strong class="price">{{ $product->price }} $</strong>
          </div> 
          <a href="{{ route('product', $product) }}" class="title">{{ $product->name }}</a> 
          {{-- <p class="text-muted small mt-2"> <i class="fa fa-map-marker"></i> United kingdom</p>  --}}
        </div> 
      </div> 
    </div>    
    @endforeach
  </div>
@endsection