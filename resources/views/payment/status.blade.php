@extends('user.layout.header')
@section('content')

<!-- main body - start
    ================================================== -->
    <main>





        <!-- breadcrumb_section - start
        ================================================== -->
        <section class="breadcrumb_section text-white text-center text-uppercase d-flex align-items-end clearfix" data-background="user/assets/images/breadcrumb/bg_01.jpg">
            <div class="overlay" data-bg-color="#1d1d1d"></div>
            <div class="container">
                <h1 class="page_title text-white">Checkout</h1>
                <ul class="breadcrumb_nav ul_li_center clearfix">
                    <li><a href="/">Home</a></li>
                    <li>Shop</li>
                    <li>Checkout</li>
                </ul>
            </div>
        </section>
        <!-- breadcrumb_section - end
        ================================================== -->


        <!-- checkout_section - start
        ================================================== -->
        <section class="checkout_section sec_ptb_140 clearfix">
            <div class="container">

                <ul class="checkout_step ul_li clearfix">
                    <li class="activated"><a href="#"><span>01.</span> Shopping Cart</a></li>
                    <li class="activated"><a href="#"><span>02.</span> Checkout</a></li>
                    <li class="active"><a href="#"><span>03.</span> Order Completed</a></li>
                </ul>

                <div class="order_complete_alart text-center">
                    <div class="row justify-content-center">
                        <div class="col-md-12">
                                <div class="card-body text-center">
                                <h2>Congratulation! Your <strong>Order Placed</strong> successfully.</h2>
                                    <p class="lead">Order ID: <strong>{{ $order->order_number ?? 'N/A' }}</strong></p>
                                    <p class="mb-3">Amount: <strong>₹{{ isset($order->final_total) ? number_format($order->final_total, 2) : 'N/A' }}</strong></p>
                                    <p class="mb-3">Payment Status: 
                                        @if(isset($order) && $order->payment_status === 'paid')
                                            <span class="badge bg-success">Paid</span>
                                        @elseif(isset($order))
                                            <span class="badge bg-warning text-dark">{{ ucfirst($order->payment_status) }}</span>
                                        @else
                                            <span class="badge bg-secondary">Unknown</span>
                                        @endif
                                    </p>
                                    <a href="/" class="btn btn-primary mt-3">Back to Home</a>
                                </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>
        <!-- checkout_section - end
        ================================================== -->


    </main>
    <!-- main body - end
    ================================================== -->
@endsection     