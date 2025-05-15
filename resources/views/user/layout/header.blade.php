<!DOCTYPE html>
<html lang="en">



    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="x-ua-compatible" content="ie=edge">

        <title>Kryovance</title>
        <link rel="shortcut icon" href="{{ asset('user/assets/images/logo/favourite_icon_01.png')}}">

        <!-- fraimwork - css include -->
        <link rel="stylesheet" type="text/css" href="{{ asset('user/assets/css/bootstrap.min.css')}}">

        <!-- icon - css include -->
        <link rel="stylesheet" type="text/css" href="{{ asset('user/assets/css/fontawesome.css')}}">

        <!-- animation - css include -->
        <link rel="stylesheet" type="text/css" href="{{ asset('user/assets/css/animate.css')}}">

        <!-- nice select - css include -->
        <link rel="stylesheet" type="text/css" href="{{ asset('user/assets/css/nice-select.css')}}">

        <!-- carousel - css include -->
        <link rel="stylesheet" type="text/css" href="{{ asset('user/assets/css/slick.css')}}">
        <link rel="stylesheet" type="text/css" href="{{ asset('user/assets/css/slick-theme.css')}}">

        <!-- popup images & videos - css include -->
        <link rel="stylesheet" type="text/css" href="{{ asset('user/assets/css/magnific-popup.css')}}">

        <!-- jquery ui - css include -->
        <link rel="stylesheet" type="text/css" href="{{ asset('user/assets/css/jquery-ui.css')}}">

        <!-- custom - css include -->
        <link rel="stylesheet" type="text/css" href="{{ asset('user/assets/css/style.css')}}">
        <meta name="csrf-token" content="{{ csrf_token() }}">

    </head>
<style>
/*    .minimal_product_item .tab-content {*/
/*    height: 600px;*/
/*}*/
.form_item.mb-0 {display: flex;}

.search_body {}

.search_body .container-fluid.prl_90 {
    padding: 0;
}

.ul_li_right {
    max-width: 100%;
    width: 100%;
}

.ul_li_right li:nth-child(1) {
    max-width: 70%;
    width: 100% !important;
}

.search_body form {
    background: #f1f1f1;
    border-radius: 30px;
    overflow: hidden;
    border: 1px solid #e8e8e8;
    height: 50px;
}

.search_body form input[type="search"] {
    background: transparent;
    border: 0;
    height: 50px;
}

.minimal_header .action_btns_group button {}

.search_body form button {
    background: transparent;
    box-shadow: none !important;
}
.search_body form {
    background: #f5f5f5;
    border-radius: 30px;
    overflow: hidden;
    border: 1px solid #6e6e6e;
    height: 50px;
}
</style>

    <body class="home_minimal">


        <!-- backtotop - start -->
        <div id="thetop"></div>
        <div class="backtotop bg_black">
            <a href="#" class="scroll">
                <i class="far fa-arrow-up"></i>
            </a>
        </div>
        <!-- backtotop - end -->

        <!-- preloader - start -->
        <!-- <div id="preloader"></div> -->
        <!-- preloader - end -->


        <!-- header_section - start
        ================================================== -->
        <header class="header_section minimal_header sticky_header clearfix">
            <div class="header_content_wrap d-flex align-items-center clearfix">
                <div class="container maxw_1430">
                    <div class="row align-items-center justify-content-lg-between">
                        <div class="col-lg-3">
                            <div class="brand_logo">
                                <a class="brand_link" href="{{route('home')}}">
                                    <img src="{{asset('user/assets/images/logo/logo_10_1x.png')}}" srcset="{{asset('user/assets/images/logo/logo_10_2x.png')}}" alt="logo_not_found">
                                </a>

                                <ul class="mh_action_btns ul_li clearfix">
                                    <li>
                                        <button type="button" class="search_btn" data-toggle="collapse" data-target="#search_body_collapse" aria-expanded="false" aria-controls="search_body_collapse">
                                            <i class="fal fa-search"></i>
                                        </button>
                                    </li>
                                    <li>
                                        <button type="button" class="cart_btn">
                                            <i class="fal fa-shopping-cart"></i>
                                                <span class="btn_badge">{{ getCartCount() }}</span>
                                        </button>
                                    </li>
                                    <li><button type="button" class="mobile_menu_btn"><i class="far fa-bars"></i></button></li>
                                </ul>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <nav class="main_menu clearfix">
                                <ul class="ul_li_center clearfix">
                                    <li class="">
                                        <a href="{{route('home')}}">Home</a>

                                    </li>
                                    <li><a href="{{route('products')}}">Shop</a></li>
                                    <!--<li class="menu_item_has_child">-->
                                    <!--    <a href="#!">Shop</a>-->
                                        <!--<div class="mega_menu">-->
                                        <!--    <div class="background" data-bg-color="#ffffff">-->
                                        <!--        <div class="container">-->
                                        <!--            <div class="row mt__30">-->
                                        <!--                <div class="col-lg-3">-->
                                        <!--                    <div class="page_links">-->
                                        <!--                        <h3 class="title_text">Carparts</h3>-->
                                        <!--                        <ul class="ul_li_block">-->
                                        <!--                            <li><a href="carparts_shop.html">Shop Page</a></li>-->
                                        <!--                            <li><a href="carparts_shop_grid.html">Shop Grid</a></li>-->
                                        <!--                            <li><a href="carparts_shop_list.html">Shop List</a></li>-->
                                        <!--                            <li><a href="carparts_shop_details.html">Shop Details</a></li>-->
                                        <!--                        </ul>-->
                                        <!--                    </div>-->

                                        <!--                    <div class="page_links">-->
                                        <!--                        <h3 class="title_text">Classic Ecommerce</h3>-->
                                        <!--                        <ul class="ul_li_block">-->
                                        <!--                            <li><a href="classic_ecommerce_shop.html">Shop Page</a></li>-->
                                        <!--                            <li><a href="classic_ecommerce_shop_details.html">Shop Details</a></li>-->
                                        <!--                        </ul>-->
                                        <!--                    </div>-->

                                        <!--                    <div class="page_links">-->
                                        <!--                        <h3 class="title_text">Electronic</h3>-->
                                        <!--                        <ul class="ul_li_block">-->
                                        <!--                            <li><a href="electronic_shop.html">Shop Page</a></li>-->
                                        <!--                            <li><a href="electronic_shop_details.html">Shop Details</a></li>-->
                                        <!--                        </ul>-->
                                        <!--                    </div>-->

                                        <!--                    <div class="page_links">-->
                                        <!--                        <h3 class="title_text">Fashion</h3>-->
                                        <!--                        <ul class="ul_li_block">-->
                                        <!--                            <li><a href="fashion_shop.html">Shop Page</a></li>-->
                                        <!--                            <li><a href="fashion_shop_details.html">Shop Details</a></li>-->
                                        <!--                        </ul>-->
                                        <!--                    </div>-->
                                        <!--                </div>-->

                                        <!--                <div class="col-lg-3">-->
                                        <!--                    <div class="page_links">-->
                                        <!--                        <h3 class="title_text">Fashion Minimal</h3>-->
                                        <!--                        <ul class="ul_li_block">-->
                                        <!--                            <li><a href="fashion_minimal_shop.html">Shop Page</a></li>-->
                                        <!--                            <li><a href="fashion_minimal_shop_details.html">Shop Details</a></li>-->
                                        <!--                        </ul>-->
                                        <!--                    </div>-->

                                        <!--                    <div class="page_links">-->
                                        <!--                        <h3 class="title_text">Fashion Minimal</h3>-->
                                        <!--                        <ul class="ul_li_block">-->
                                        <!--                            <li><a href="fashion_minimal_shop.html">Shop Page</a></li>-->
                                        <!--                            <li><a href="fashion_minimal_shop_details.html">Shop Details</a></li>-->
                                        <!--                        </ul>-->
                                        <!--                    </div>-->

                                        <!--                    <div class="page_links">-->
                                        <!--                        <h3 class="title_text">Furniture</h3>-->
                                        <!--                        <ul class="ul_li_block">-->
                                        <!--                            <li><a href="furniture_shop.html">Shop Page</a></li>-->
                                        <!--                            <li><a href="furniture_shop_details.html">Shop Details</a></li>-->
                                        <!--                        </ul>-->
                                        <!--                    </div>-->

                                        <!--                    <div class="page_links">-->
                                        <!--                        <h3 class="title_text">Gadget</h3>-->
                                        <!--                        <ul class="ul_li_block">-->
                                        <!--                            <li><a href="gadget_shop.html">Shop Page</a></li>-->
                                        <!--                            <li><a href="gadget_shop_details.html">Shop Details</a></li>-->
                                        <!--                        </ul>-->
                                        <!--                    </div>-->
                                        <!--                </div>-->

                                        <!--                <div class="col-lg-3">-->
                                        <!--                    <div class="page_links">-->
                                        <!--                        <h3 class="title_text">Medical</h3>-->
                                        <!--                        <ul class="ul_li_block">-->
                                        <!--                            <li><a href="medical_shop.html">Shop Page</a></li>-->
                                        <!--                            <li><a href="medical_shop_details.html">Shop Details</a></li>-->
                                        <!--                        </ul>-->
                                        <!--                    </div>-->

                                        <!--                    <div class="page_links">-->
                                        <!--                        <h3 class="title_text">Modern Minimal</h3>-->
                                        <!--                        <ul class="ul_li_block">-->
                                        <!--                            <li><a href="modern_minimal_shop.html">Shop Page</a></li>-->
                                        <!--                            <li><a href="modern_minimal_shop_details.html">Shop Details</a></li>-->
                                        <!--                        </ul>-->
                                        <!--                    </div>-->

                                        <!--                    <div class="page_links">-->
                                        <!--                        <h3 class="title_text">Modern</h3>-->
                                        <!--                        <ul class="ul_li_block">-->
                                        <!--                            <li><a href="modern_shop.html">Shop Page</a></li>-->
                                        <!--                            <li><a href="modern_shop_details.html">Shop Details</a></li>-->
                                        <!--                        </ul>-->
                                        <!--                    </div>-->

                                        <!--                    <div class="page_links">-->
                                        <!--                        <h3 class="title_text">Motorcycle</h3>-->
                                        <!--                        <ul class="ul_li_block">-->
                                        <!--                            <li><a href="motorcycle_shop_grid.html">Shop Grid</a></li>-->
                                        <!--                            <li><a href="motorcycle_shop_list.html">Shop List</a></li>-->
                                        <!--                            <li><a href="motorcycle_shop_details.html">Shop Details</a></li>-->
                                        <!--                        </ul>-->
                                        <!--                    </div>-->
                                        <!--                </div>-->

                                        <!--                <div class="col-lg-3">-->
                                        <!--                    <div class="page_links">-->
                                        <!--                        <h3 class="title_text">Simple Shop</h3>-->
                                        <!--                        <ul class="ul_li_block">-->
                                        <!--                            <li><a href="simple_shop.html">Shop Page</a></li>-->
                                        <!--                            <li><a href="simple_shop_details.html">Shop Details</a></li>-->
                                        <!--                        </ul>-->
                                        <!--                    </div>-->

                                        <!--                    <div class="page_links">-->
                                        <!--                        <h3 class="title_text">Sports</h3>-->
                                        <!--                        <ul class="ul_li_block">-->
                                        <!--                            <li><a href="sports_shop.html">Shop Page</a></li>-->
                                        <!--                            <li><a href="sports_shop_details.html">Shop Details</a></li>-->
                                        <!--                        </ul>-->
                                        <!--                    </div>-->

                                        <!--                    <div class="page_links">-->
                                        <!--                        <h3 class="title_text">Lookbook</h3>-->
                                        <!--                        <ul class="ul_li_block">-->
                                        <!--                            <li><a href="lookbook_creative_shop.html">Shop Page</a></li>-->
                                        <!--                            <li><a href="lookbook_creative_shop_details.html">Shop Details</a></li>-->
                                        <!--                        </ul>-->
                                        <!--                    </div>-->

                                        <!--                    <div class="page_links">-->
                                        <!--                        <h3 class="title_text">Shop Other Pages</h3>-->
                                        <!--                        <ul class="ul_li_block">-->
                                        <!--                            <li><a href="#!"><del>Shop Page</del></a></li>-->
                                        <!--                            <li><a href="shop_details.html">Shop Details</a></li>-->
                                        <!--                        </ul>-->
                                        <!--                    </div>-->
                                        <!--                </div>-->
                                        <!--            </div>-->
                                        <!--        </div>-->
                                        <!--    </div>-->
                                        <!--</div>-->
                                    <!--</li>-->

                                    <li><a href="{{route('about')}}">About us</a></li>
                                    <li><a href="{{route('contact')}}">Contact us</a></li>
                                </ul>
                            </nav>
                        </div>

                        <div class="col-lg-5">
                            <ul class="action_btns_group ul_li_right clearfix">
                                <li>
                                   <div class="search_body">
                                        <div class="container-fluid prl_90">
                                            <form action="{{route('products')}}" method="get">

                                                <div class="form_item mb-0">

                                                    <input type="search" name="search" placeholder="Type here..."  value="{{ $search ?? '' }}">

                                                    <button type="submit"><i class="fal fa-search"></i></button>

                                                </div>

                                            </form>
                                        </div>
                                    </div>
                                </li>
                                @guest('customer')
                                <li>
                                        <button type="button" class="user_btn" data-toggle="collapse" data-target="#use_deropdown" aria-expanded="false" aria-controls="use_deropdown">
                                            <i class="fal fa-user"></i>
                                        </button>
                                        <div id="use_deropdown" class="collapse_dropdown collapse">
                                            <div class="dropdown_content">
                                                <div class="profile_info clearfix">
                                                    <div class="user_content m-auto">
                                                    <a class="custom_btn bg_black text-uppercase text-center px-5" href="{{ route('user-login') }}"><i class="fal fa-user mr-2"></i>Login</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <!-- <li><a class="auth-label" href="{{ route('user-login') }}">Login</a></li> -->
                                    <!-- <li><a class="auth-label" href="{{ route('user-register') }}">Register</a></li> -->
                                @else
                                    <li>
                                        <button type="button" class="user_btn" data-toggle="collapse" data-target="#use_deropdown" aria-expanded="false" aria-controls="use_deropdown">
                                            <i class="fal fa-user"></i>
                                        </button>
                                        <div id="use_deropdown" class="collapse_dropdown collapse">
                                            <div class="dropdown_content">
                                                <div class="profile_info clearfix">
                                                    <div class="user_content">
                                                        <h4 class="user_name">{{ auth('customer')->user()->fname }} {{ auth('customer')->user()->lname }}</h4>
                                                         <span class="user_title">{{ auth('customer')->user()->role->title ?? 'Customer' }}</span>
                                                    </div>
                                                </div>
                                                <ul class="settings_options ul_li_block clearfix">
                                                    <li><a href="{{route('user-dashboard')}}"><i class="fal fa-user-circle"></i> Profile</a></li>
                                                    <li><a href="{{route('customer.logout')}}"><i class="fal fa-sign-out-alt"></i> Logout</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </li>
                                @endguest
                                <li>
                                    <button type="button" class="cart_btn">
                                        <i class="fal fa-shopping-cart"></i>
                                            <span class="btn_badge">{{ getCartCount() }}</span>
                                    </button>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div id="search_body_collapse" class="search_body_collapse collapse">
                <div class="search_body">
                    <div class="container-fluid prl_90">
                        <form action="{{route('products')}}" method="get">

                            <div class="form_item mb-0">

                                <input type="search" name="search" placeholder="Type here..."  value="{{ $search ?? '' }}">

                                <button type="submit"><i class="fal fa-search"></i></button>

                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </header>
        <!-- header_section - end
        ================================================== -->


        <!-- main body - start
        ================================================== -->
        <main>


            <!-- sidebar mobile menu & sidebar cart - start
            ================================================== -->
            <div class="sidebar-menu-wrapper">
                <div class="cart_sidebar">
                    <button type="button" class="close_btn"><i class="fal fa-times"></i></button>

                    <ul class="cart_items_list ul_li_block mb_30 clearfix">
                        <li>
                            <div class="item_image">
                                <img src="user/assets/images/cart/img_01.jpg" alt="image_not_found">
                            </div>
                            <div class="item_content">
                                <h4 class="item_title">Yellow Blouse</h4>
                                <span class="item_price">$30.00</span>
                            </div>
                            <button type="button" class="remove_btn"><i class="fal fa-trash-alt"></i></button>
                        </li>
                        <li>
                            <div class="item_image">
                                <img src="user/assets/images/cart/img_01.jpg" alt="image_not_found">
                            </div>
                            <div class="item_content">
                                <h4 class="item_title">Yellow Blouse</h4>
                                <span class="item_price">$30.00</span>
                            </div>
                            <button type="button" class="remove_btn"><i class="fal fa-trash-alt"></i></button>
                        </li>
                        <li>
                            <div class="item_image">
                                <img src="user/assets/images/cart/img_01.jpg" alt="image_not_found">
                            </div>
                            <div class="item_content">
                                <h4 class="item_title">Yellow Blouse</h4>
                                <span class="item_price">$30.00</span>
                            </div>
                            <button type="button" class="remove_btn"><i class="fal fa-trash-alt"></i></button>
                        </li>
                    </ul>

                    <ul class="total_price total_price_details ul_li_block mb_30 clearfix">
                        <li>
                            <span>Subtotal:</span>
                            <span>$90</span>
                        </li>
                        <li>
                            <span>Vat 5%:</span>
                            <span>$4.5</span>
                        </li>
                        <li>
                            <span>Discount 20%:</span>
                            <span>- $18.9</span>
                        </li>
                        <li>
                            <span>Total:</span>
                            <span>$75.6</span>
                        </li>
                    </ul>

                    <ul class="btns_group ul_li_block clearfix">
                        <li><a href="{{route('shop-cart')}}">View Cart</a></li>
                        <li><a href="{{route('shopping-cart')}}">Checkout</a></li>
                    </ul>
                </div>

                <div class="sidebar_mobile_menu">
                    <button type="button" class="close_btn"><i class="fal fa-times"></i></button>

                    <div class="msb_widget brand_logo text-center">
                        <a href="index.html">
                        <img src="{{asset('user/assets/images/logo/logo_10_1x.png')}}" srcset="{{asset('user/assets/images/logo/logo_10_2x.png')}}" alt="logo_not_found">
                        </a>
                    </div>

                    <div class="msb_widget mobile_menu_list clearfix">
                        <h3 class="title_text mb_15 text-uppercase"><i class="far fa-bars mr-2"></i> Menu List</h3>
                        <ul class="ul_li_block clearfix">
                            <li class="active dropdown">
                                <a href="#!" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Home</a>
                                <ul class="ul_li_block dropdown-menu">
                                    <li><a href="home_carparts.html">Carparts</a></li>
                                    <li><a href="home_classic_ecommerce.html">Classic Ecommerce</a></li>
                                    <li><a href="home_creative_onelook.html">Creative Onelook</a></li>
                                    <li><a href="home_electronic.html">Electronic</a></li>
                                    <li><a href="home_fashion.html">Fashion</a></li>
                                    <li><a href="home_fashion_minimal.html">Fashion Minimal</a></li>
                                    <li><a href="home_furniture.html">Furniture</a></li>
                                    <li><a href="home_gadget.html">Gadget</a></li>
                                    <li><a href="home_lookbook_creative.html">Lookbook Creative</a></li>
                                    <li><a href="home_lookbook_slide.html">Lookbook Slide</a></li>
                                    <li><a href="home_medical.html">Medical</a></li>
                                    <li><a href="home_modern.html">Modern</a></li>
                                    <li><a href="home_modern_minimal.html">Modern Minimal</a></li>
                                    <li><a href="home_motorcycle.html">Motorcycle</a></li>
                                    <li><a href="home_parallax_shop.html">Parallax Shop</a></li>
                                    <li><a href="home_simple_shop.html">Simple Shop</a></li>
                                    <li><a href="home_single_story_black.html">Single Story Black</a></li>
                                    <li><a href="home_single_story_white.html">Single Story White</a></li>
                                    <li><a href="home_sports.html">Sports</a></li>
                                    <li><a href="home_supermarket.html">Supermarket</a></li>
                                    <li><a href="home_watch.html">Watch</a></li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="#!" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Shop</a>
                                <ul class="dropdown-menu">
                                    <li class="dropdown ul_li_block">
                                        <a href="#!" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Carparts</a>
                                        <ul class="dropdown-menu ul_li_block">
                                            <li><a href="carparts_shop.html">Shop Page</a></li>
                                            <li><a href="carparts_shop_grid.html">Shop Grid</a></li>
                                            <li><a href="carparts_shop_list.html">Shop List</a></li>
                                            <li><a href="carparts_shop_details.html">Shop Details</a></li>
                                        </ul>
                                    </li>

                                    <li class="dropdown">
                                        <a href="#!" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Classic Ecommerce</a>
                                        <ul class="dropdown-menu ul_li_block">
                                            <li><a href="classic_ecommerce_shop.html">Shop Page</a></li>
                                            <li><a href="classic_ecommerce_shop_details.html">Shop Details</a></li>
                                        </ul>
                                    </li>

                                    <li class="dropdown">
                                        <a href="#!" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Electronic</a>
                                        <ul class="dropdown-menu ul_li_block">
                                            <li><a href="electronic_shop.html">Shop Page</a></li>
                                            <li><a href="electronic_shop_details.html">Shop Details</a></li>
                                        </ul>
                                    </li>

                                    <li class="dropdown">
                                        <a href="#!" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Fashion</a>
                                        <ul class="dropdown-menu ul_li_block">
                                            <li><a href="fashion_shop.html">Shop Page</a></li>
                                            <li><a href="fashion_shop_details.html">Shop Details</a></li>
                                        </ul>
                                    </li>

                                    <li class="dropdown">
                                        <a href="#!" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Fashion Minimal</a>
                                        <ul class="dropdown-menu ul_li_block">
                                            <li><a href="fashion_minimal_shop.html">Shop Page</a></li>
                                            <li><a href="fashion_minimal_shop_details.html">Shop Details</a></li>
                                        </ul>
                                    </li>

                                    <li class="dropdown">
                                        <a href="#!" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Fashion Minimal</a>
                                        <ul class="dropdown-menu ul_li_block">
                                            <li><a href="fashion_minimal_shop.html">Shop Page</a></li>
                                            <li><a href="fashion_minimal_shop_details.html">Shop Details</a></li>
                                        </ul>
                                    </li>

                                    <li class="dropdown">
                                        <a href="#!" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Furniture</a>
                                        <ul class="dropdown-menu ul_li_block">
                                            <li><a href="furniture_shop.html">Shop Page</a></li>
                                            <li><a href="furniture_shop_details.html">Shop Details</a></li>
                                        </ul>
                                    </li>

                                    <li class="dropdown">
                                        <a href="#!" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Gadget</a>
                                        <ul class="dropdown-menu ul_li_block">
                                            <li><a href="gadget_shop.html">Shop Page</a></li>
                                            <li><a href="gadget_shop_details.html">Shop Details</a></li>
                                        </ul>
                                    </li>

                                    <li class="dropdown">
                                        <a href="#!" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Medical</a>
                                        <ul class="dropdown-menu ul_li_block">
                                            <li><a href="medical_shop.html">Shop Page</a></li>
                                            <li><a href="medical_shop_details.html">Shop Details</a></li>
                                        </ul>
                                    </li>

                                    <li class="dropdown">
                                        <a href="#!" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Modern Minimal</a>
                                        <ul class="dropdown-menu ul_li_block">
                                            <li><a href="modern_minimal_shop.html">Shop Page</a></li>
                                            <li><a href="modern_minimal_shop_details.html">Shop Details</a></li>
                                        </ul>
                                    </li>

                                    <li class="dropdown">
                                        <a href="#!" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Modern</a>
                                        <ul class="dropdown-menu ul_li_block">
                                            <li><a href="modern_shop.html">Shop Page</a></li>
                                            <li><a href="modern_shop_details.html">Shop Details</a></li>
                                        </ul>
                                    </li>

                                    <li class="dropdown">
                                        <a href="#!" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Motorcycle</a>
                                        <ul class="dropdown-menu ul_li_block">
                                            <li><a href="motorcycle_shop_grid.html">Shop Grid</a></li>
                                            <li><a href="motorcycle_shop_list.html">Shop List</a></li>
                                            <li><a href="motorcycle_shop_details.html">Shop Details</a></li>
                                        </ul>
                                    </li>

                                    <li class="dropdown">
                                        <a href="#!" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Simple Shop</a>
                                        <ul class="dropdown-menu ul_li_block">
                                            <li><a href="simple_shop.html">Shop Page</a></li>
                                            <li><a href="simple_shop_details.html">Shop Details</a></li>
                                        </ul>
                                    </li>

                                    <li class="dropdown">
                                        <a href="#!" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Sports</a>
                                        <ul class="dropdown-menu ul_li_block">
                                            <li><a href="sports_shop.html">Shop Page</a></li>
                                            <li><a href="sports_shop_details.html">Shop Details</a></li>
                                        </ul>
                                    </li>

                                    <li class="dropdown">
                                        <a href="#!" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Lookbook</a>
                                        <ul class="dropdown-menu ul_li_block">
                                            <li><a href="lookbook_creative_shop.html">Shop Page</a></li>
                                            <li><a href="lookbook_creative_shop_details.html">Shop Details</a></li>
                                        </ul>
                                    </li>

                                    <li class="dropdown">
                                        <a href="#!" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Shop Other Pages</a>
                                        <ul class="dropdown-menu ul_li_block">
                                            <li><a href="#!"><del>Shop Page</del></a></li>
                                            <li><a href="shop_details.html">Shop Details</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="#!" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Pages</a>
                                <ul class="dropdown-menu">
                                    <li class="dropdown">
                                        <a href="#!" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Shop Inner Pages</a>
                                        <ul class="dropdown-menu">
                                            <li><a href="shop_cart.html">Shopping Cart</a></li>
                                            <li><a href="shop_checkout.html">Checkout Step 1</a></li>
                                            <li><a href="shop_checkout_step2.html">Checkout Step 2</a></li>
                                            <li><a href="shop_checkout_step3.html">Checkout Step 3</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="404.html">404 Page</a></li>
                                    <li class="dropdown">
                                        <a href="#!" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Blogs</a>
                                        <ul class="dropdown-menu">
                                            <li><a href="blog.html">Blog Page</a></li>
                                            <li><a href="blog_details.html">Blog Details</a></li>
                                        </ul>
                                    </li>
                                    <li class="dropdown">
                                        <a href="#!" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Compare</a>
                                        <ul class="dropdown-menu">
                                            <li><a href="compare_1.html">Compare V.1</a></li>
                                            <li><a href="compare_2.html">Compare V.2</a></li>
                                        </ul>
                                    </li>
                                    <li class="dropdown">
                                        <a href="#!" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Register</a>
                                        <ul class="dropdown-menu">
                                            <li><a href="login.html">Login</a></li>
                                            <li><a href="signup.html">Sign Up</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li><a href="{{route('about')}}">About us</a></li>
                            <li><a href="{{route('contact')}}">Contact us</a></li>
                        </ul>
                    </div>

                    <div class="user_info">
                        <h3 class="title_text mb_30 text-uppercase"><i class="fas fa-user mr-2"></i> User Info</h3>
                        @guest('customer')
                            <div class="profile_info clearfix">
                                <div class="user_content">
                                    <a class="custom_btn bg_black text-uppercase text-center px-5" href="{{ route('user-login') }}"><i class="fal fa-user mr-2"></i>Login</a>
                                </div>
                            </div>
                        @else
                            <div class="profile_info clearfix">
                                <div class="user_content">
                                <h4 class="user_name">{{ auth('customer')->user()->fname }} {{ auth('customer')->user()->lname }}</h4>
                                <span class="user_title">Customer</span>
                            </div>

                            </div>
                            <ul class="settings_options ul_li_block clearfix">
                                <li><a href="#!"><i class="fal fa-user-circle"></i> Profile</a></li>
                                <li><a href="{{route('customer.logout')}}"><i class="fal fa-sign-out-alt"></i> Logout</a></li>
                            </ul>

                        @endguest
                    </div>
                </div>
                <div class="overlay"></div>
            </div>
            <!-- sidebar mobile menu & sidebar cart - end
            ================================================== -->
            @yield('content')


        </main>
        <!-- main body - end
        ================================================== -->


        <!-- footer_section - start
        ================================================== -->
        <footer class="footer_section minimal_footer clearfix">
            <div class="footer_widget_area sec_ptb_100 clearfix">
                <div class="container">
                    <div class="row justify-content-lg-between">
                        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                            <div class="footer_widget footer_about">
                                <div class="brand_logo mb_30">
                                    <a href="index.html">
                                    <img src="{{asset('user/assets/images/logo/logo_10_1x.png')}}" srcset="{{asset('user/assets/images/logo/logo_10_2x.png')}}" alt="logo_not_found">
                                    </a>
                                </div>

                                <p class="mb_30">
                                    Investigationes demonstraverunt lectores legere me lius quod ii legunt saepius. Eodem modo typi, qui nunc videntur.
                                </p>

                                <div class="footer_widget footer_contact_info clearfix">
                                    <ul class="ul_li_block">
                                        <li><span>Phone:</span> 8 800 567.890.11</li>
                                        <li><span>Email:</span> Jthemes@gmail.com</li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                            <div class="footer_widget product_list clearfix">
                                <?php $latestProducts = getLatestProductsWithImages(); ?>
                                <h3 class="footer_widget_title text-white text-uppercase">Hot Products</h3>
                                <ul class="ul_li_block">
                                    @foreach ($latestProducts as $item)
                                    @php
                                        $price = getDiscountedPrice($item->product_id, $item->product_price);
                                    @endphp
                                        <li>
                                            <div class="small_product">
                                                <div class="item_image">
                                                    <img src="{{ $item->image_url ? $item->image_url : asset('user/assets/images/15980049.png') }}" alt="image_not_found" width="80px">
                                                </div>
                                                <div class="item_content">
                                                    <h3 class="item_title">
                                                        <a class="text-white" href="{{route('product_details',$item->product_id)}}">
                                                            {{ \Illuminate\Support\Str::limit($item->product_name, 20, '..') }}
                                                        </a>
                                                    </h3>
                                                    <span class="item_price">₹{{$price}}</span>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                            <div class="footer_widget product_list clearfix">
                                <?php $saleProducts = getSaleProductsWithImages(); ?>
                                <h3 class="footer_widget_title text-white text-uppercase">Sale Products</h3>
                                <ul class="ul_li_block">
                                    @foreach ($saleProducts as $item)
                                    @php
                                        $pricee = getDiscountedPrice($item->product_id, $item->product_price);
                                    @endphp
                                        <li>
                                            <div class="small_product">
                                                <div class="item_image">
                                                    <img src="{{ $item->image_url ? $item->image_url : asset('user/assets/images/15980049.png') }}" alt="image_not_found" width="80px">
                                                </div>
                                                <div class="item_content">
                                                    <h3 class="item_title">
                                                        <a class="text-white" href="{{route('product_details',$item->product_id)}}">
                                                            {{ \Illuminate\Support\Str::limit($item->product_name, 20, '..') }}
                                                        </a>

                                                    </h3>
                                                    <span class="item_price">₹{{$pricee}}</span>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                            <div class="footer_widget footer_newsletter">
                                <h3 class="footer_widget_title text-white text-uppercase">Newsletter</h3>
                                <p class="mb_30">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec ex tortor
                                </p>
                                <form action="#">
                                    <div class="form_item mb-0">
                                        <input type="email" name="email" placeholder="Email Address">
                                        <button type="submit" class="submit_btn bg_black"><i class="fal fa-envelope"></i></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="footer_bottom clearfix">
                <div class="container">
                    <div class="row align-items-center justify-content-lg-between">
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <p class="copyright_text mb-0">
                                @<?php echo date("Y"); ?> All rights reserved. <a href="#" class="author_link text-white">Kryovance</a>.
                            </p>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <ul class="circle_social_links ul_li_right clearfix">
                                <li><a href="#!"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="#!"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#!"><i class="fab fa-instagram"></i></a></li>
                                <li><a href="#!"><i class="fab fa-whatsapp"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- footer_section - end
        ================================================== -->


        <!-- fraimwork - jquery include -->
        <script src="{{ asset('user/assets/js/jquery-3.5.1.min.js')}}"></script>
        <script src="{{ asset('user/assets/js/popper.min.js')}}"></script>
        <script src="{{ asset('user/assets/js/bootstrap.min.js')}}"></script>

        <!-- mobile menu - jquery include -->
        <script src="{{ asset('user/assets/js/mCustomScrollbar.js')}}"></script>

        <!-- google map - jquery include -->
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDk2HrmqE4sWSei0XdKGbOMOHN3Mm2Bf-M&amp;ver=2.1.6"></script>
        <script src="{{ asset('user/assets/js/gmaps.min.js')}}"></script>

        <!-- animation - jquery include -->
        <script src="{{ asset('user/assets/js/parallaxie.js')}}"></script>
        <script src="{{ asset('user/assets/js/wow.min.js')}}"></script>

        <!-- nice select - jquery include -->
        <script src="{{ asset('user/assets/js/nice-select.min.js')}}"></script>

        <!-- carousel - jquery include -->
        <script src="{{ asset('user/assets/js/slick.min.js')}}"></script>

        <!-- countdown timer - jquery include -->
        <script src="{{ asset('user/assets/js/countdown.js')}}"></script>

        <!-- popup images & videos - jquery include -->
        <script src="{{ asset('user/assets/js/magnific-popup.min.js')}}"></script>

        <!-- filtering & masonry layout - jquery include -->
        <script src="{{ asset('user/assets/js/isotope.pkgd.min.js')}}"></script>
        <script src="{{ asset('user/assets/js/masonry.pkgd.min.js')}}"></script>
        <script src="{{ asset('user/assets/js/imagesloaded.pkgd.min.js')}}"></script>

        <!-- jquery ui - jquery include -->
        <script src="{{ asset('user/assets/js/jquery-ui.js')}}"></script>
        @yield('scripts')
        <!-- custom - jquery include -->
        <script src="{{ asset('user/assets/js/custom.js')}}"></script>


        <!-- product quick view - start -->
        <div class="quickview_modal modal fade" id="quickview_modal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content clearfix">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <div class="item_image">
                        <img src="user/assets/images/shop/fashion_minimal/img_07.jpg" alt="image_not_found">
                    </div>
                    <div class="item_content">
                        <h2 class="item_title mb_15">Digital Infrared Thermometer</h2>
                        <div class="rating_star mb_30 clearfix">
                            <ul class="float-left ul_li mr-2">
                                <li class="active"><i class="las la-star"></i></li>
                                <li class="active"><i class="las la-star"></i></li>
                                <li class="active"><i class="las la-star"></i></li>
                                <li class="active"><i class="las la-star"></i></li>
                                <li><i class="las la-star"></i></li>
                            </ul>
                            <span class="review_text">(12 Reviews)</span>
                        </div>
                        <span class="item_price mb_15">$49.50</span>
                        <p class="mb_30">
                            Best Electronic Digital Thermometer adipiscing elit, sed do eiusmod teincididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse us ultrices gravidaes.
                        </p>
                        <div class="quantity_form mb_30 clearfix">
                            <strong class="list_title">Quantity:</strong>
                            <div class="quantity_input">
                                <form action="#">
                                    <span class="input_number_decrement">–</span>
                                    <input class="input_number" type="text" value="1">
                                    <span class="input_number_increment">+</span>
                                </form>
                            </div>
                        </div>
                        <ul class="btns_group ul_li mb_30 clearfix">
                            <li><a href="#!" class="custom_btn bg_carparts_red">Add to Cart</a></li>
                            <li><a href="#!" data-toggle="tooltip" data-placement="top" title="" data-original-title="Compare Product"><i class="fal fa-sync"></i></a></li>
                            <li><a href="#!" data-toggle="tooltip" data-placement="top" title="" data-original-title="Add To Wishlist"><i class="fal fa-heart"></i></a></li>
                        </ul>
                        <ul class="info_list ul_li_block clearfix">
                            <li><strong class="list_title">Category:</strong> <a href="#!">Medical Equipment</a></li>
                            <li class="social_icon">
                                <strong class="list_title">Share:</strong>
                                <ul class="ul_li clearfix">
                                    <li><a href="#!"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="#!"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="#!"><i class="fab fa-instagram"></i></a></li>
                                    <li><a href="#!"><i class="fab fa-pinterest-p"></i></a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- product quick view - end -->
        <!-- shop_section - end
                ================================================== -->
    </body>

</html>
