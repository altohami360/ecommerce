@extends('layouts.site')

@section('page-title', 'Home')
    
@section('content')
      <div class="container-xl">
      <div class="row g-4">
        <div class="col-3">
          <form action="./" method="get" autocomplete="off" novalidate="">
            <div class="subheader mb-2">Category</div>
            <div class="list-group list-group-transparent mb-3">
              <a class="list-group-item list-group-item-action d-flex align-items-center active" href="#">
                Games
                <small class="text-muted ms-auto">24</small>
              </a>
              <a class="list-group-item list-group-item-action d-flex align-items-center" href="#">
                Clothing
                <small class="text-muted ms-auto">149</small>
              </a>
              <a class="list-group-item list-group-item-action d-flex align-items-center" href="#">
                Jewelery
                <small class="text-muted ms-auto">88</small>
              </a>
              <a class="list-group-item list-group-item-action d-flex align-items-center" href="#">
                Toys
                <small class="text-muted ms-auto">54</small>
              </a>
            </div>
            <div class="subheader mb-2">Rating</div>
            <div class="mb-3">
              <label class="form-check">
                <input type="radio" class="form-check-input" name="form-stars" value="5 stars" checked="">
                <span class="form-check-label">5 stars</span>
              </label>
              <label class="form-check">
                <input type="radio" class="form-check-input" name="form-stars" value="4 stars">
                <span class="form-check-label">4 stars</span>
              </label>
              <label class="form-check">
                <input type="radio" class="form-check-input" name="form-stars" value="3 stars">
                <span class="form-check-label">3 stars</span>
              </label>
              <label class="form-check">
                <input type="radio" class="form-check-input" name="form-stars" value="2 and less stars">
                <span class="form-check-label">2 and less stars</span>
              </label>
            </div>
            <div class="subheader mb-2">Tags</div>
            <div class="mb-3">
              <label class="form-check">
                <input type="checkbox" class="form-check-input" name="form-tags[]" value="business" checked="">
                <span class="form-check-label">business</span>
              </label>
              <label class="form-check">
                <input type="checkbox" class="form-check-input" name="form-tags[]" value="evening">
                <span class="form-check-label">evening</span>
              </label>
              <label class="form-check">
                <input type="checkbox" class="form-check-input" name="form-tags[]" value="leisure">
                <span class="form-check-label">leisure</span>
              </label>
              <label class="form-check">
                <input type="checkbox" class="form-check-input" name="form-tags[]" value="party">
                <span class="form-check-label">party</span>
              </label>
            </div>
            <div class="subheader mb-2">Price</div>
            <div class="row g-2 align-items-center mb-3">
              <div class="col">
                <div class="input-group">
                  <span class="input-group-text">
                    $
                  </span>
                  <input type="text" class="form-control" placeholder="from" value="3" autocomplete="off">
                </div>
              </div>
              <div class="col-auto">—</div>
              <div class="col">
                <div class="input-group">
                  <span class="input-group-text">
                    $
                  </span>
                  <input type="text" class="form-control" placeholder="to" autocomplete="off">
                </div>
              </div>
            </div>
            <div class="subheader mb-2">Shipping</div>
            <div>
              <select name="" class="form-select">
                <option>United Kingdom</option>
                <option>USA</option>
                <option>Germany</option>
                <option>Poland</option>
                <option>Other…</option>
              </select>
            </div>
            <div class="mt-5">
              <button class="btn btn-primary w-100">
                Confirm changes
              </button>
              <a href="#" class="btn btn-link w-100">
                Reset to defaults
              </a>
            </div>
          </form>
        </div>
        <div class="col-9">
          <div class="row row-cards">
            
            @foreach ($products as $product)
                <div class="col-sm-6 col-lg-4">
                  <div class="card card-sm">
                    <a href="#" class="d-block"><img src="./static/photos/brainstorming-session-with-creative-designers.jpg" class="card-img-top"></a>
                    <div class="card-body">
                      <div class="d-flex align-items-center">
                        <span class="avatar me-3 rounded">JL</span>
                        <div>
                          <div>Jeffie Lewzey</div>
                          <div class="text-muted">5 days ago</div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
            @endforeach 
            
          </div>
        </div>
      </div>
@endsection