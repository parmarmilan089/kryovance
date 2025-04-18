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
                <h1 class="page_title text-white">Checkout</h1>
                <ul class="breadcrumb_nav ul_li_center clearfix">
                    <li><a href="#!">Home</a></li>
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
                    <h2>Congratulation! You’ve <strong>Completed</strong> Payment.</h2>
                </div>

            </div>
        </section>
        <!-- checkout_section - end
        ================================================== -->


    </main>
    <!-- main body - end
    ================================================== -->


@endsection
