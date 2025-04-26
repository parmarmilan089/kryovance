<!-- Extends template page-->
@extends('admin.layout.header')

<!-- Specify content -->
@section('content')
<link rel="stylesheet" href="https://cdn.datatables.net/2.2.1/css/dataTables.bootstrap5.css">

<div class="col-lg-12">
    <div class="card">
        <div class="card-body">
            <div class="order_details mb_50 mt-4 rounded " >
                <h5 class="card-title" style="display: inline-block;"><?php echo (isset($title)) ? $title : ''; ?> Information</h5>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <div class="info_box p-3 rounded" style="background: #fff; border: 1px solid #eee;">
                            <h6 class="text-muted mb-1">Order Status</h6>
                            <p class="mb-0 text-dark"><strong>{{ ucfirst($order['status']) }}</strong></p>
                        </div>
                    </div>

                    <div class="col-md-6 mb-3">
                        <div class="info_box p-3 rounded" style="background: #fff; border: 1px solid #eee;">
                            <h6 class="text-muted mb-1">Payment Status</h6>
                            <p class="mb-0 text-dark"><strong>{{ ucfirst($order['payment_status']) }}</strong></p>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="info_box p-3 rounded" style="background: #fff; border: 1px solid #eee;">
                            <h6 class="text-muted mb-1">Shipping Address</h6>
                            <p class="mb-0 text-dark">
                                {{ $order['billingDetails']['address'] }},
                                {{ $order['billingDetails']['city'] }},
                                {{ $order['billingDetails']['country'] }} - {{ $order['billingDetails']['zip_code'] }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="customer_details mb_50 mt-4">
                <h5 class="card-title" style="display: inline-block;">Customer Information</h5>
                <ul class="list-unstyled">
                    <li><strong>Name:</strong> {{ $order['customer']['fname'] }} {{ $order['customer']['lname'] }}</li>
                    <li><strong>Email:</strong> {{ $order['customer']['email'] }}</li>
                    <li><strong>Phone:</strong> {{ $order['customer']['phone'] }}</li>
                </ul>
            </div>
            <h5 class="card-title" style="display: inline-block;">Product List</h5>
            <table class="table text-center mb_50">
                <thead class="text-uppercase text-uppercase">
                    <tr>
                        <th>No.</th>
                        <th>Product Name</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($order['items'] as $key => $item)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>
                                <div class="d-flex justify-content-center">
                                    <div class="item_image">
                                        @php
                                            $images = getProductImages($item['product']['id']);
                                        @endphp
                                        <img src="{{ !empty($images[0]) ? asset('storage/'.$images[0]->file_path) : asset('user/assets/images/15980049.png') }}" width="100px" alt="image_not_found">
                                    </div>
                                    <div class="item_content">
                                        <h4 class="item_title mb-0">{{$item['product']['name']}}</h4>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <span class="price_text">₹{{$item['price']}}</span>
                            </td>
                            <td>
                                <span class="quantity_text">{{$item['quantity']}}</span>
                            </td>
                            <td><span class="total_price">₹{{$item['price'] * $item['quantity']}}</span></td>
                        </tr>
                    @endforeach
                    <tr>
                        <td class="text-left">
                            <span class="subtotal_text">TOTAL</span>
                        </td>
                        <td></td>
                        <td></td>
                        <td>
                            <span class="total_price">₹{{$order['subtotal']}}</span>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
