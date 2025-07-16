<!DOCTYPE html>
<html lang="en">



<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>Kryovance</title>
    <link rel="shortcut icon" href="{{ asset('user/assets/images/logo/favourite_icon_01.png') }}">

    <!-- fraimwork - css include -->
    <link rel="stylesheet" type="text/css" href="{{ asset('user/assets/css/bootstrap.min.css') }}">

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
    <link rel="stylesheet" type="text/css" href="{{ asset('user/assets/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('user/assets/css/owl.carousel.min.css') }}" />

    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.2.1/css/all.css" />
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.2.1/css/sharp-solid.css" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

</head>
<style>
    /*    .minimal_product_item .tab-content {*/
    /*    height: 600px;*/
    /*}*/
    .form_item.mb-0 {
        display: flex;
    }

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
    a.navbar-brand {
    max-width: 180px;
}
.right-panel .input-group-text {
    border-top-left-radius: 0;
    border-bottom-left-radius: 0;
}
.main-price span {
    padding-left: 15px;
}
.hotproduct-cart .hot-heading {
    display: -webkit-box;
    -webkit-box-orient: vertical;
    -webkit-line-clamp: 3;
    overflow: hidden;
    text-overflow: ellipsis;
}
.hotproduct-cart .hotP-img {
    width: 60% !important;
    width: 190px;
}

.hotproduct-cart .hotproduct-text {
    max-width: 40%;
}
</style>

<body class="home_minimal">
    <!-- Navigation -->
    <div class="navigation_flex">
        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <a class="navbar-brand" href="{{ route('home') }}">
                    <img src="{{ asset('user/assets/images/logo/logo.svg') }}" alt="Kryovance" />
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{ route('home') }}">
                                Home
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('products') }}">
                                Shop
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('about') }}">
                                About Us
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('contact') }}">
                                Contact
                            </a>
                        </li>
                        <!-- {/* <li class="nav-item dropdown">
                  <a
                    class="nav-link dropdown-toggle"
                    href="#"
                    role="button"
                    data-bs-toggle="dropdown"
                    aria-expanded="false"
                  >
                    Dropdown
                  </a>
                  <ul class="dropdown-menu">
                    <li>
                      <a class="dropdown-item" href="#">
                        Action
                      </a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="#">
                        Another action
                      </a>
                    </li>
                    <li>
                      <hr class="dropdown-divider" />
                    </li>
                    <li>
                      <a class="dropdown-item" href="#">
                        Something else here
                      </a>
                    </li>
                  </ul>
                </li> */} -->
                    </ul>
                    <div class="right-panel d-flex">

                        <!-- Search Bar -->
                        <form class="input-group w-auto my-auto" action="{{ route('products') }}" method="get">
                            <input autocomplete="off" type="search" class="form-control" placeholder="Search Here..."
                                name="search" value="{{ $search ?? '' }}" />
                            <span class="input-group-text d-none d-lg-flex">
                                <i class="fa-solid fa-magnifying-glass"></i>
                            </span>
                        </form>

                        <!-- Cart -->
                        <div class="cart_flex">
                            <a href="{{ route('shopping-cart') }}" class="cart_btn">
                                <img src="{{ asset('user/assets/images/cart-top.svg') }}" alt="" />
                                <div class="cartNo">{{ getCartCount() }}</div>
                            </a>
                        </div>

                        <!-- Profile -->
                        <div class="profile_flex">
                            <ul class="nav usercta">
                                @auth('customer')
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" role="button"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <img src="{{ asset('user/assets/images/profile-icon.svg') }}" alt="" />
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li>    
                                            <a class="dropdown-item" href="{{ route('user-dashboard') }}">
                                                Profile
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="{{ route('customer.logout') }}">
                                                Logout
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                @else
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="{{ route('user-login') }}" role="button"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <img src="{{ asset('user/assets/images/profile-icon.svg') }}" alt="" />
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a class="dropdown-item" href="{{ route('user-login') }}">
                                                Sign Up
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                @endauth
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </div>

    @yield('content')



    <!-- End Navigation  -->
    <!-- backtotop - start -->
    <!-- <div id="thetop"></div>
        <div class="backtotop bg_black">
            <a href="#" class="scroll">
                <i class="far fa-arrow-up"></i>
            </a>
        </div> -->
    <!-- backtotop - end -->

    <!-- preloader - start -->
    <!-- <div id="preloader"></div> -->
    <!-- preloader - end -->


    <!-- header_section - start
        ================================================== -->
    <!-- <header class="header_section minimal_header sticky_header clearfix">
            <div class="header_content_wrap d-flex align-items-center clearfix">
                <div class="container maxw_1430">
                    <div class="row align-items-center justify-content-lg-between">
                        <div class="col-lg-3">
                            <div class="brand_logo">
                                <a class="brand_link" href="{{ route('home') }}">
                                    <img src="{{ asset('user/assets/images/logo/logo_10_1x.png') }}" srcset="{{ asset('user/assets/images/logo/logo_10_2x.png') }}" alt="logo_not_found">
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
                                        <a href="{{ route('home') }}">Home</a>
                                    </li>
                                    <li><a href="{{ route('products') }}">Shop</a></li>
                                    <li><a href="{{ route('about') }}">About us</a></li>
                                    <li><a href="{{ route('contact') }}">Contact us</a></li>
                                </ul>
                            </nav>
                        </div>

                        <div class="col-lg-5">
                            <ul class="action_btns_group ul_li_right clearfix">
                                <li>
                                   <div class="search_body">
                                        <div class="container-fluid prl_90">
                                            <form action="{{ route('products') }}" method="get">

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
@else
    @php
        $parentUser = null;
        if (auth('customer')->user()->parent_id) {
            $parentUser = \App\Models\User::find(auth('customer')->user()->parent_id);
        }
        $userRoles = [
            1 => 'Seller',
            2 => 'Distributor',
            3 => 'Gov.Employee',
            4 => 'Wholesaler',
            5 => 'Retailer',
            6 => 'Admin',
        ];
    @endphp
                                            <li>
                                                <button type="button" class="user_btn" data-toggle="collapse" data-target="#use_deropdown" aria-expanded="false" aria-controls="use_deropdown">
                                                    <i class="fal fa-user"></i>
                                                </button>
                                                <div id="use_deropdown" class="collapse_dropdown collapse">
                                                    <div class="dropdown_content">
                                                        <div class="profile_info clearfix">
                                                            <div class="user_content">
                                                                <h4 class="user_name">{{ auth('customer')->user()->fname }} {{ auth('customer')->user()->lname }}</h4>
                                                                 <span class="user_title"> {{ $parentUser->first_name }} {{ $parentUser->last_name }} ({{ $userRoles[$parentUser->user_type] ?? 'Unknown' }})</span>
                                                            </div>
                                                        </div>
                                                        <ul class="settings_options ul_li_block clearfix">
                                                            <li><a href="{{ route('user-dashboard') }}"><i class="fal fa-user-circle"></i> Profile</a></li>
                                                            <li><a href="{{ route('customer.logout') }}"><i class="fal fa-sign-out-alt"></i> Logout</a></li>
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
                        <form action="{{ route('products') }}" method="get">

                            <div class="form_item mb-0">

                                <input type="search" name="search" placeholder="Type here..."  value="{{ $search ?? '' }}">

                                <button type="submit"><i class="fal fa-search"></i></button>

                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </header> -->
    <!-- header_section - end
        ================================================== -->




    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-12">
                    <div class="footer__maintext-box">
                        <figure>
                            <a href="#">
                                <img src="{{ asset('user/assets/images/logo.svg') }}" alt="" />
                            </a>
                        </figure>
                        <p>
                            Kryovance is a trusted destination for top-quality electronics
                            and accessories. Our commitment is to deliver innovation,
                            reliability, and exceptional value to every customer.
                        </p>
                        <ul class="social">
                            <li>
                                <a href="#" target="_blank">
                                    <i class="fa-brands fa-facebook-f"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fa-brands fa-instagram"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fa-brands fa-youtube"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fa-brands fa-whatsapp"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-3 col-sm-12">
                    <div class="footer_heading">Hot Products</div>
                    <?php $latestProducts = getLatestProductsWithImages(); ?>
                    @foreach ($latestProducts as $item)
                        @php
                            $price = getDiscountedPrice($item->product_id, $item->product_price);
                        @endphp
                        <div class="footerproduct">
                            <div class="footerPimg">
                                <figure>
                                    <img src="{{ asset('user/assets/images/footer-product.jpg') }}" alt="" />
                                </figure>
                            </div>
                            <div class="footerproduct-text">
                                <h3>
                                    <a href="{{ route('product_details', $item->product_id) }}">{{ $item->product_name }}</a>
                                </h3>
                                <p>₹{{ $price }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="col-md-3 col-sm-12">
                    <div class="footer_heading">Useful Links</div>
                    <ul class="footer_tabs">
                        <li>
                            <a href="#">Home</a>
                        </li>
                        <li>
                            <a href="#">About Us</a>
                        </li>
                        <li>
                            <a href="#">Shop</a>
                        </li>
                        <li>
                            <a href="#">Contact Us</a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-3 col-sm-12">
                    <div class="footer_heading">Get Contact</div>
                    <form action="" class="newsletter">
                        <div class="form-floating">
                            <i class="fa-regular fa-envelope"></i>
                            <input type="email" class="form-control" id="floatingInput"
                                placeholder="name@example.com" />
                            <label for="floatingInput">Email address</label>
                        </div>
                        <button aria-label="submit" value="submit" type="button">
                            Submit
                        </button>
                    </form>

                    <ul class="footer_tabs">
                        <li>
                            <a href="tel:+91 97118 76094"><strong>Phone:</strong> +91 97118 76094</a>
                        </li>
                        <li>
                            <a href="mailto:sales@slsyn.com"><strong>E-mail:</strong> sales@slsyn.com</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="last-footer">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <ul class="privacy_list">
                            <li>
                                <a href="#">Terms &amp; Condition</a>
                            </li>
                            <li>
                                <a href="#">Privacy Policy</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <p>
                            Copyright@ 2025 <span>Kryovance</span>. All Rights Reserved
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- End Footer -->
    <!-- footer_section - end
        ================================================== -->


    <!-- fraimwork - jquery include -->
    <script src="{{ asset('user/assets/js/jquery-3.5.1.min.js') }}"></script>
    <script src="{{ asset('user/assets/js/popper.min.js') }}"></script>
    {{--  <script src="{{ asset('user/assets/js/bootstrap.min.js')}}"></script>  --}}
    <script src="{{ asset('user/assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js"></script>
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
    <script src="{{ asset('user/assets/js/magnific-popup.min.js') }}"></script>

    <!-- filtering & masonry layout - jquery include -->
    <script src="{{ asset('user/assets/js/isotope.pkgd.min.js')}}"></script>
    {{--  <script src="{{ asset('user/assets/js/masonry.pkgd.min.js')}}"></script>  --}}
    <script src="{{ asset('user/assets/js/imagesloaded.pkgd.min.js')}}"></script>

    <!-- jquery ui - jquery include -->
    {{--  <script src="{{ asset('user/assets/js/jquery-ui.js')}}"></script>  --}}
    @yield('scripts')
    <!-- custom - jquery include -->
    <script src="{{ asset('user/assets/js/custom.js') }}"></script>

    <!-- owl carousel - jquery include -->
    <script src="{{ asset('user/assets/js/owl.carousel.js') }}"></script>
    {{--  Q@tXT333aetyAFX  --}}
</body>

</html>
