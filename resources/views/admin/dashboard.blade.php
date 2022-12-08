@extends('layouts.master')

@section('page-title', 'Dashboard')

@section('content')
    <div class="row" id="top-statistics">

        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between mb-2">
                        <h4><i class="fa fa-list"></i> Products</h4>
                        <a href="">Show all ...</a>
                    </div>
                    <div class="loader loader-sm" style="display: none;"></div>
                    <h3 class="mb-0" id="genres-count" style="">12</h3>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between mb-2">
                        <h4><i class="fa fa-users"></i> Customers</h4>
                        <a href="">Show all ...</a>
                    </div>
                    <div class="loader loader-sm" style="display: none;"></div>
                    <h3 class="mb-0" id="genres-count" style="">12</h3>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between mb-2">
                        <h4><i class="fa fa-list"></i> Orders</h4>
                        <a href="">Show all ...</a>
                    </div>
                    <div class="loader loader-sm" style="display: none;"></div>
                    <h3 class="mb-0" id="genres-count" style="">12</h3>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between mb-2">
                        <h4><i class="fa fa-list"></i> product</h4>
                        <a href="">Show all ...</a>
                    </div>
                    <div class="loader loader-sm" style="display: none;"></div>
                    <h3 class="mb-0" id="genres-count" style="">12</h3>
                </div>
            </div>
        </div>
    
    </div>
@endsection
