@extends('layouts.master')

@section('page-title', 'Order')

@section('content')
<div class="row">
        <div class="col-md-12">
            <div class="tile shadow">
                <div class="row mb-3">
                    <div class="col-md-12">
                        <a href="" class="btn btn-primary"><i class="fa fa-plus"></i> Create New
                            BTN</a>
                    </div>
                </div>
                <form action="{{ route('orders.index') }}" method="get">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <div class="input-group">
                                    <input class="form-control"  name="searchTerm" value="{{ $searchTerm }}" placeholder="Search">
                                    <div class="input-group-append">
                                        <select class="form-control custom-select" name="column">
                                            <option value="order_number">Order Number</option>
                                            <option value="status">Order Status</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Search</button>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-hover table-bordered" id="sampleTable">
                            <thead>
                                <tr>
                                    <th>Order Number</th>
                                    <th>Customer Name</th>
                                    <th>Items Quantity</th>
                                    <th>Total Amount</th>
                                    <th>Payment Method</th>
                                    <th>Order Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                    <tr>
                                        <td>{{ $order->order_number }}</td>
                                        <td>{{ $order->user->name }}</td>
                                        <td>{{ $order->items_qty }}</td>
                                        <td>{{ $order->total_amount }}</td>
                                        <td>{{ $order->payment_method }}</td>
                                        <td>{{ $order->status }}</td>
                                        <td>
                                            <button class="btn btn-info btn-sm items"  data-toggle="modal" data-target="#items" data-id="{{ $order->order_number }}">Items</button>

                                            @if ($order->status == $status)
                                                <a class="btn btn-success btn-sm" href="">Confairm</a>
                                                <a class="btn btn-danger btn-sm" href="">Deinay</a>
                                            @else
                                            
                                            @endif
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



    <!-- Modal -->
    <div class="modal fade" id="items" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog  modal-lg" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Order Items</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-hover table-bordered" id="sampleTable">
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                    <th>Total Price</th>
                                </tr>
                            </thead>
                            <tbody  id="tr">
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
                <div class="modal-footer">
                    <button type="button" class="remove-data btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {


            $('.items').click(function() {

                var id = $(this).data('id');
                var url = "{{ route('order.items', ":id") }}";
                url = url.replace(':id', id);
                
                $.ajax({
                    url: url,
                    success: function(data) {
                        $('#tr').html(data)
                    }
                });
                
                $('.remove-data').click(function(){
                    $('#tr').html('');
                });
            })
        })
    </script>
@endpush
