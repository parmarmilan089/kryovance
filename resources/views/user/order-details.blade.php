@extends('user.layout.header')

@section('content')
<main>
    <!-- breadcrumb_section -->
    <section class="breadcrumb_section text-white text-center text-uppercase d-flex align-items-end clearfix" data-background="{{asset('user/assets/images/breadcrumb/bg_01.jpg')}}">
        <div class="overlay" data-bg-color="#1d1d1d"></div>
        <div class="container">
            <h1 class="page_title text-white">Order</h1>
            <ul class="breadcrumb_nav ul_li_center clearfix">
                <li><a href="#!">Home</a></li>
                <li>Order</li>
                <li>Order Details</li>
            </ul>
        </div>
    </section>

    <!-- checkout_section -->
    <section class="checkout_section sec_ptb_140 clearfix">
        <div class="container" style="background: #f9f9f9;">
            <div class="order_details mb_50 p-4 rounded">
                <h3 class="form_title mb-4">Order Information</h3>
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

            <div class="billing_form">
                <h3 class="form_title mb_30">Your Order</h3>
                <div class="form_wrap">
                    <div class="checkout_table">
                        <table class="table text-center mb_50">
                            <thead class="text-uppercase">
                                <tr>
                                    <th>Product Name</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($order['items'] as $item)
                                    <tr>
                                        <td>
                                            <div class="cart_product d-flex align-items-center justify-content-center gap-2">
                                                @php
                                                    $images = getProductImages($item['product']['id']);
                                                @endphp
                                                <div class="item_image">
                                                    <img src="{{ !empty($images[0]) ? asset('storage/'.$images[0]->file_path) : asset('user/assets/images/15980049.png') }}" width="100px" alt="image_not_found">
                                                </div>
                                                <div class="item_content text-left">
                                                    <h4 class="item_title mb-0">{{ $item['product']['name'] }}</h4>
                                                </div>
                                            </div>
                                        </td>
                                        <td>₹{{ $item['original_price'] }}</td>
                                        <td>{{ $item['quantity'] }}</td>
                                        <td>₹{{ $item['original_price'] * $item['quantity'] }}</td>
                                    </tr>
                                @endforeach

                                <!-- Subtotal -->
                                <tr>
                                    <td class="text-left"><span class="subtotal_text">Subtotal</span></td>
                                    <td></td>
                                    <td></td>
                                    <td><span class="total_price">₹{{ $order['subtotal'] }}</span></td>
                                </tr>

                                <!-- Discount -->
                                @if(isset($order['total_discount_amount']) && $order['total_discount_amount'] > 0)
                                    <tr>
                                        <td class="text-left"><span class="subtotal_text text-danger">Discount</span></td>
                                        <td></td>
                                        <td></td>
                                        <td><span class="total_price text-danger">- ₹{{ $order['total_discount_amount'] }}</span></td>
                                    </tr>
                                @endif

                                <!-- Coupon Code -->
                                @if(!empty($order['coupon_code']))
                                    <tr>
                                        <td class="text-left"><span class="subtotal_text">Coupon Code</span></td>
                                        <td colspan="3" class="text-right"><strong>{{ $order['coupon_code'] }}</strong></td>
                                    </tr>
                                @endif

                                <!-- Grand Total -->
                                <tr>
                                    <td class="text-left"><span class="subtotal_text font-weight-bold">Grand Total</span></td>
                                    <td></td>
                                    <td></td>
                                    <td><span class="total_price font-weight-bold">₹{{ $order['total'] }}</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection
