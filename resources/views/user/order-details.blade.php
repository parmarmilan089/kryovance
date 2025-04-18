<!-- Extends template page-->
@extends('user.layout.header')

<!-- Specify content -->
@section('content')
<!-- main body - start
    ================================================== -->
    <main>
        <!-- breadcrumb_section - start
        ================================================== -->
        <section class="breadcrumb_section text-white text-center text-uppercase d-flex align-items-end clearfix" data-background="user/assets/images/breadcrumb/bg_01.jpg">
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
        <!-- breadcrumb_section - end
        ================================================== -->


        <!-- checkout_section - start
        ================================================== -->
        <section class="checkout_section sec_ptb_140 clearfix">
            <div class="container">
                    <div class="billing_form">
                        <h3 class="form_title mb_30">Your order</h3>
                        <div class="form_wrap">

                            <div class="checkout_table">
                                <table class="table text-center mb_50">
                                    <thead class="text-uppercase text-uppercase">
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
                                                    <div class="cart_product">
                                                        <div class="item_image">
                                                            <img src="{{ $item['product']['image_path'] ? getStoragePath() . $item['product']['image_path'] : asset('user/assets/images/product-placeholder.png') }}" alt="image_not_found">
                                                        </div>
                                                        <div class="item_content">
                                                            <h4 class="item_title mb-0">{{$item['product']['name']}}</h4>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <span class="price_text">${{$item['price']}}</span>
                                                </td>
                                                <td>
                                                    <span class="quantity_text">{{$item['quantity']}}</span>
                                                </td>
                                                <td><span class="total_price">${{$item['price'] * $item['quantity']}}</span></td>
                                            </tr>
                                        @endforeach
                                        <tr>
                                            <td class="text-left">
                                                <span class="subtotal_text">TOTAL</span>
                                            </td>
                                            <td></td>
                                            <td></td>
                                            <td>
                                                <span class="total_price">${{$order['subtotal']}}</span>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </section>
        <!-- checkout_section - end
        ================================================== -->


    </main>
    <!-- main body - end
    ================================================== -->

@endsection
