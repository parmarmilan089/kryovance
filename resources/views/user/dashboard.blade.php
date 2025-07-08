<!-- Extends template page-->
@extends('user.layout.header')

<!-- Specify content -->
@section('content')

<style>
    .item.d-flex.align-items-center.clearfix.slick-slide {
        height: 720px;
    }

    .carousel_nav button {
        width: 50px;
        height: 50px;
        color: #ffffff;
        font-size: 39px;
        border-radius: 4px;
        align-items: center;
        display: inline-flex;
        justify-content: center;
        background-color: #1c71d3;
    }

    section.product_section.sec_ptb_140.clearfix {
        padding-top: 60px;
    }

    ul#category-tab li a img {
        width: 120px !important;
        height: 120px !important;
        margin-bottom: 30px;
    }

    .search_body form {
        background: #f3f3f3;
        border-radius: 30px;
        overflow: hidden;
        border: 1px solid #484646;
        height: 50px;
    }
</style>
<!-- Banner -->
<div class="banner_flex">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0"
                            class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                            aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                            aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="banner-content">
                                        <h1>India's Best Home Printers <span>2025</span></h1>
                                        <p>Reliable and affordable printers perfect for everyday use at home.</p>
                                        <div class="banner-cta">
                                            <a href="#">Shop Now <i class="fa-solid fa-arrow-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="banner-img">
                                        <figure>
                                            <img src="{{asset('user/assets/images/printer.png')}}" alt="">
                                        </figure>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="carousel-item">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="banner-content">
                                        <h1>India's Best Home Printers <span>2025</span></h1>
                                        <p>Reliable and affordable printers perfect for everyday use at home.</p>
                                        <div class="banner-cta">
                                            <a href="#">Shop Now <i class="fa-solid fa-arrow-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="banner-img">
                                        <figure>
                                            <img src="{{asset('user/assets/images/printer.png')}}" alt="">
                                        </figure>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="carousel-item">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="banner-content">
                                        <h1>India's Best Home Printers <span>2025</span></h1>
                                        <p>Reliable and affordable printers perfect for everyday use at home.</p>
                                        <div class="banner-cta">
                                            <a href="#">Shop Now <i class="fa-solid fa-arrow-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="banner-img">
                                        <figure>
                                            <img src="{{asset('user/assets/images/printer.png')}}" alt="">
                                        </figure>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Arrows -->
                    <!-- <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Previous</span>
                                    </button>
                                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Next</span>
                                    </button> -->
                </div>
            </div>
        </div>
    </div>
</div>
<!--End Banner  -->

<!-- Hot Products -->
<div class="hotProdcut_flex">
    <?php $latestProducts = getLatestProductsWithImages(); ?>
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="hotproduct-heading">
                    <div class="hot-suptext">Power Up Your Printing and Photography
                        <div class="hot-boldtext">Fast, Reliable & Affordable!!</div>
                    </div>
                </div>
            </div>
            @foreach ($latestProducts as $item)
            @php
            $price = getDiscountedPrice($item->product_id, $item->product_price);
            @endphp

            <div class="col-md-3">
                <div class="hotproduct-cart">
                    <div class="hotproduct-text">
                        <div class="hot-heading">
                            {{ $item->product_name }}
                        </div>
                        <div class="hotP-price">
                            ₹ {{ $price }}
                        </div>
                        <div class="hot-cta">
                            <a href="{{route('product_details',$item->product_id)}}">Shop Now</a>
                        </div>
                    </div>
                    <div class="hotP-img">
                        <figure>
                            <img src="{{ $item->image_url ? $item->image_url : asset('user/assets/images/15980049.png') }}"
                                alt="{{ $item->product_name }}" />
                        </figure>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<!-- End Hot Products  -->


<div class="productCategory-flex">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="heading-main">Category</div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="category_tabs">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        @foreach ($productsByCategory as $category => $products)
                        @php
                        $cat = \App\Models\Category::where('name', $category)->first(); // get category details
                        @endphp
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="{{ Str::slug($category) }}-tab" data-bs-toggle="tab"
                                data-bs-target="#{{ Str::slug($category) }}" type="button" role="tab"
                                aria-controls="{{ Str::slug($category) }}" aria-selected="false" tabindex="-1">{{
                                strtoupper($category) }}</button>
                        </li>
                        @endforeach
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        @foreach ($productsByCategory as $category => $products)
                        <div class="tab-pane fade" id="{{ Str::slug($category) }}" role="tabpanel"
                            aria-labelledby="{{ Str::slug($category) }}-tab">
                            <div class="row">
                                @foreach ($products->take(6) as $product)
                                <div class="col-md-3">
                                    <div class="productCart-flex">
                                        @php
                                        $images = getProductImages($product->id);

                                        // Get discounted and original price using the helper function
                                        $price = getDiscountedPrice($product->id, $product->price);
                                        @endphp
                                        <figure>
                                            <img src="images/product-1.jpg" alt="">
                                        </figure>
                                        <div class="product-heading"><a href="#">Epson EcoTank ET-2862 A4 Colour
                                                Multifun..</a></div>
                                        <div class="product-subtext">HP Printer</div>
                                        <div class="price-area">
                                            <div class="main-price">₹20,999 <span>MRP ₹23,525</span></div>
                                            <div class="discount">11%off</div>
                                        </div>
                                        <div class="cart-ctaflex">
                                            <div class="cart-plus-flex">
                                                <div class="input-group">
                                                    <span class="input-group-btn">
                                                        <button class="btn btn-default btn-subtract"
                                                            type="button">-</button>
                                                    </span>
                                                    <input type="text"
                                                        class="form-control no-padding text-center item-quantity"
                                                        value="1">
                                                    <span class="input-group-btn">
                                                        <button class="btn btn-default btn-add" type="button">+</button>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="cart-cta"><button><img src="images/cart-icon-w.svg"
                                                        alt=""></button></div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="load-more">
                                        <div class="load-text">
                                            Load More...
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="productCart-flex">
                                        <figure>
                                            <img src="images/product-1.jpg" alt="">
                                        </figure>
                                        <div class="product-heading"><a href="#">Epson EcoTank ET-2862 A4 Colour
                                                Multifun..</a></div>
                                        <div class="product-subtext">HP Printer</div>
                                        <div class="price-area">
                                            <div class="main-price">₹20,999 <span>MRP ₹23,525</span></div>
                                            <div class="discount">11%off</div>
                                        </div>
                                        <div class="cart-ctaflex">
                                            <div class="cart-plus-flex">
                                                <div class="input-group">
                                                    <span class="input-group-btn">
                                                        <button class="btn btn-default btn-subtract"
                                                            type="button">-</button>
                                                    </span>
                                                    <input type="text"
                                                        class="form-control no-padding text-center item-quantity"
                                                        value="1">
                                                    <span class="input-group-btn">
                                                        <button class="btn btn-default btn-add" type="button">+</button>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="cart-cta"><button><img src="images/cart-icon-w.svg"
                                                        alt=""></button></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="productCart-flex">
                                        <figure>
                                            <img src="images/product-1.jpg" alt="">
                                        </figure>
                                        <div class="product-heading"><a href="#">Epson EcoTank ET-2862 A4 Colour
                                                Multifun..</a></div>
                                        <div class="product-subtext">HP Printer</div>
                                        <div class="price-area">
                                            <div class="main-price">₹20,999 <span>MRP ₹23,525</span></div>
                                            <div class="discount">11%off</div>
                                        </div>
                                        <div class="cart-ctaflex">
                                            <div class="cart-plus-flex">
                                                <div class="input-group">
                                                    <span class="input-group-btn">
                                                        <button class="btn btn-default btn-subtract"
                                                            type="button">-</button>
                                                    </span>
                                                    <input type="text"
                                                        class="form-control no-padding text-center item-quantity"
                                                        value="1">
                                                    <span class="input-group-btn">
                                                        <button class="btn btn-default btn-add" type="button">+</button>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="cart-cta"><button><img src="images/cart-icon-w.svg"
                                                        alt=""></button></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade active show" id="contact" role="tabpanel"
                            aria-labelledby="contact-tab">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="productCart-flex">
                                        <figure>
                                            <img src="images/product-1.jpg" alt="">
                                        </figure>
                                        <div class="product-heading"><a href="#">Epson EcoTank ET-2862 A4 Colour
                                                Multifun..</a></div>
                                        <div class="product-subtext">HP Printer</div>
                                        <div class="price-area">
                                            <div class="main-price">₹20,999 <span>MRP ₹23,525</span></div>
                                            <div class="discount">11%off</div>
                                        </div>
                                        <div class="cart-ctaflex">
                                            <div class="cart-plus-flex">
                                                <div class="input-group">
                                                    <span class="input-group-btn">
                                                        <button class="btn btn-default btn-subtract"
                                                            type="button">-</button>
                                                    </span>
                                                    <input type="text"
                                                        class="form-control no-padding text-center item-quantity"
                                                        value="1">
                                                    <span class="input-group-btn">
                                                        <button class="btn btn-default btn-add" type="button">+</button>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="cart-cta"><button><img src="images/cart-icon-w.svg"
                                                        alt=""></button></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="productCart-flex">
                                        <figure>
                                            <img src="images/product-1.jpg" alt="">
                                        </figure>
                                        <div class="product-heading"><a href="#">Epson EcoTank ET-2862 A4 Colour
                                                Multifun..</a></div>
                                        <div class="product-subtext">HP Printer</div>
                                        <div class="price-area">
                                            <div class="main-price">₹20,999 <span>MRP ₹23,525</span></div>
                                            <div class="discount">11%off</div>
                                        </div>
                                        <div class="cart-ctaflex">
                                            <div class="cart-plus-flex">
                                                <div class="input-group">
                                                    <span class="input-group-btn">
                                                        <button class="btn btn-default btn-subtract"
                                                            type="button">-</button>
                                                    </span>
                                                    <input type="text"
                                                        class="form-control no-padding text-center item-quantity"
                                                        value="1">
                                                    <span class="input-group-btn">
                                                        <button class="btn btn-default btn-add" type="button">+</button>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="cart-cta"><button><img src="images/cart-icon-w.svg"
                                                        alt=""></button></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="productCart-flex">
                                        <figure>
                                            <img src="images/product-1.jpg" alt="">
                                        </figure>
                                        <div class="product-heading"><a href="#">Epson EcoTank ET-2862 A4 Colour
                                                Multifun..</a></div>
                                        <div class="product-subtext">HP Printer</div>
                                        <div class="price-area">
                                            <div class="main-price">₹20,999 <span>MRP ₹23,525</span></div>
                                            <div class="discount">11%off</div>
                                        </div>
                                        <div class="cart-ctaflex">
                                            <div class="cart-plus-flex">
                                                <div class="input-group">
                                                    <span class="input-group-btn">
                                                        <button class="btn btn-default btn-subtract"
                                                            type="button">-</button>
                                                    </span>
                                                    <input type="text"
                                                        class="form-control no-padding text-center item-quantity"
                                                        value="1">
                                                    <span class="input-group-btn">
                                                        <button class="btn btn-default btn-add" type="button">+</button>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="cart-cta"><button><img src="images/cart-icon-w.svg"
                                                        alt=""></button></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Why Printer -->
<div class="whyFlex">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <div class="whyMainContent">
                    <span class="whySubtitle bg-primary-opacity">
                        Explore Printers
                    </span>
                    <h2 class="Whytitle">
                        "Top Printers for Every Need"
                    </h2>
                    <p>
                        Discover the best printers for home, office, and creative use. From inkjet to laser, explore
                        features, performance, and budget-friendly options.
                    </p>
                    <div class="why-cta">
                        <a href="#">Model Collection</a>
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <div class="whyImg">
                    <div class="why-dots">
                        <img src="{{asset('user/assets/images/dots.svg')}}" alt="" />
                    </div>
                    <div class="purple-circle">
                        <img src="{{asset('user/assets/images/purple-circle.svg')}}" alt="" />
                    </div>
                    <div class="why-girl-img">
                        <img src="{{asset('user/assets/images/why-img.png')}}" alt="" />
                    </div>
                    <div class="why-qutote">
                        <img src="{{asset('user/assets/images/light-printer.svg')}}" alt="" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Why Printer  -->

<!-- Client -->
<div class="client-flex">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="heading-main">Our Clients</div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="owl-one owl-carousel owl-theme">
                    <div class="item">
                        <figure><img src="{{asset('user/assets/images/client-1.png')}}" alt="" /></figure>
                    </div>
                    <div class="item">
                        <figure><img src="{{asset('user/assets/images/client-1.png')}}" alt="" /></figure>
                    </div>
                    <div class="item">
                        <figure><img src="{{asset('user/assets/images/client-1.png')}}" alt="" /></figure>
                    </div>
                    <div class="item">
                        <figure><img src="{{asset('user/assets/images/client-1.png')}}" alt="" /></figure>
                    </div>
                    <div class="item">
                        <figure><img src="{{asset('user/assets/images/client-1.png')}}" alt="" /></figure>
                    </div>
                    <div class="item">
                        <figure><img src="{{asset('user/assets/images/client-1.png')}}" alt="" /></figure>
                    </div>
                    <div class="item">
                        <figure><img src="{{asset('user/assets/images/client-1.png')}}" alt="" /></figure>
                    </div>
                    <div class="item">
                        <figure><img src="{{asset('user/assets/images/client-1.png')}}" alt="" /></figure>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Client  -->


<!-- slider_section - start
            ================================================== -->
<section class="slider_section minimal_slider position-relative arrow_ycenter clearfix">
    <div class="main_slider clearfix" data-slick='{"dots": false}'>
        <div class="item d-flex align-items-center clearfix"
            data-background="user/assets/images/slider/modern_minimal/homepage_1.png">
            <div class="container">
                <div class="slider_content">
                    <h4 class="text-uppercase" data-animation="fadeInUp" data-delay=".4s">Best Home Printers 2025</h4>
                    <h3 data-animation="fadeInUp" data-delay=".6s">Best Home Printers 2025</h3>
                    <p data-animation="fadeInUp" data-delay=".8s">
                        Reliable and affordable printers perfect for everyday use at home.
                    </p>
                    <div class="abtn_wrap clearfix" data-animation="fadeInUp" data-delay="1s">
                        <a href="/products" class="custom_btn bg_modern_red text-uppercase">Shop Now</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="item d-flex align-items-center clearfix"
            data-background="{{ asset('user/assets/images/slider/modern_minimal/homepage_2.png') }}">
            <div class="container">
                <div class="slider_content">
                    <h4 class="text-uppercase" data-animation="fadeInUp" data-delay=".4s">Printers 2025</h4>
                    <h3 data-animation="fadeInUp" data-delay=".6s">Top Office Printers for Productivity</h3>
                    <p data-animation="fadeInUp" data-delay=".8s">
                        High-speed, efficient printers designed to keep up with busy office workflows.
                    </p>
                    <div class="abtn_wrap clearfix" data-animation="fadeInUp" data-delay="1s">
                        <a href="/products" class="custom_btn bg_modern_red text-uppercase">Shop Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="carousel_nav clearfix">
        <button type="button" class="main_left_arrow"><i class="fal fa-angle-left"></i></button>
        <button type="button" class="main_right_arrow"><i class="fal fa-angle-right"></i></button>
    </div>

    <!-- slider progress -->
    <div class="slick-progress">
        <span></span>
    </div>
</section>
<!-- slider_section - end
            ================================================== -->


<!-- product_section - start
            ================================================== -->
<section class="product_section sec_ptb_140 clearfix">
    <div class="container">
        <div class="minimal_section_title text-center mb_50">
            <h2 class="title_text mb-0">Categories</h2>
        </div>

        <ul class="carparts_inline_tabs nav ul_li_center mb_15 clearfix" role="tablist" id="category-tab">
            @foreach ($productsByCategory as $category => $products)
            @php
            $cat = \App\Models\Category::where('name', $category)->first(); // get category details
            @endphp
            <li>
                <a data-toggle="tab" href="#{{ Str::slug($category) }}_tab" class="{{ $loop->first ? 'active' : '' }}"
                    data-category="{{ Str::slug($category) }}">
                    <div class="text-center">
                        <img src="{{ $cat && $cat->image ? asset('storage/' . $cat->image) : 'user/assets/images/15980049.png' }}"
                            alt="{{ $category }}"
                            style="width: 50px; height: 50px; object-fit: cover; border-radius: 50%;">
                        <div>{{ strtoupper($category) }}</div>
                    </div>
                </a>
            </li>
            @endforeach
        </ul>

        <div class="tab-content mb_50">
            @foreach ($productsByCategory as $category => $products)
            <div id="{{ Str::slug($category) }}_tab" class="tab-pane {{ $loop->first ? 'active' : '' }}">
                <div class="row justify-content-center" id="product-list-{{ Str::slug($category) }}">
                    @foreach ($products->take(6) as $product)
                    <!-- Initially display 6 products -->
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                        <div class="minimal_product_item">
                            @php
                            $images = getProductImages($product->id);

                            // Get discounted and original price using the helper function
                            $price = getDiscountedPrice($product->id, $product->price);
                            @endphp
                            <div class="tab-content">
                                <div class="tab-pane product-img active">
                                    <img src="{{ isset($images[0]) ? asset('storage/' . $images[0]->file_path) : asset('user/assets/images/product-placeholder.png') }}"
                                        alt="image_not_found">
                                </div>
                            </div>
                            <div class="item_content">
                                <h3 class="item_title">
                                    <a href="{{ route('product_details', $product->id) }}">{{
                                        \Illuminate\Support\Str::limit($product->name, 40, '..') }}</a>
                                </h3>
                                <span class="item_category">{{ $product->category_name }}</span>
                                <span class="item_price">₹ {{ number_format($price, 2) }}</span>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            @endforeach
        </div>

        <div class="text-center clearfix">
            <button class="custom_btn bg_modern_red text-uppercase load_more" data-page="6">Load More</button>
        </div>
    </div>
</section>
<!-- product_section - end
            ================================================== -->


<!-- advertisement_section - start
            ================================================== -->
<section class="advertisement_section sec_ptb_100 clearfix" data-background="user/assets/images/backgrounds/bg_06.jpg">
    <div class="minimal_advertisement">
        <div class="container">
            <div class="row align-items-center justify-content-center">

                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="item_image">
                        <img src="user/assets/images/offer/minimal/img_01.png" alt="image_not_found">
                    </div>
                </div>

                <div class="col-lg-5 col-md-6 col-sm-12 col-xs-12">
                    <div class="item_content">
                        <h2 class="title_text">
                            "Top Printers for Every Need"
                        </h2>
                        <p>
                            Discover the best printers for home, office, and creative use. From inkjet to laser, explore
                            features, performance, and budget-friendly options.
                        </p>
                        <a class="custom_btn bg_modern_red text-uppercase" href="/products">Model Collection</a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
<!-- advertisement_section - end
            ================================================== -->


<!-- barnd_section - start
            ================================================== -->
<div class="barnd_section sec_ptb_100 clearfix">
    <div class="container">
        <div class="barnd_carousel clearfix">
            <div class="item">
                <a class="brand_item" href="#!">
                    <img src="user/assets/images/brands/img_13.png" alt="image_not_found">
                </a>
            </div>

            <div class="item">
                <a class="brand_item" href="#!">
                    <img src="user/assets/images/brands/img_14.png" alt="image_not_found">
                </a>
            </div>

            <div class="item">
                <a class="brand_item" href="#!">
                    <img src="user/assets/images/brands/img_15.png" alt="image_not_found">
                </a>
            </div>

            <div class="item">
                <a class="brand_item" href="#!">
                    <img src="user/assets/images/brands/img_16.png" alt="image_not_found">
                </a>
            </div>

            <div class="item">
                <a class="brand_item" href="#!">
                    <img src="user/assets/images/brands/img_17.png" alt="image_not_found">
                </a>
            </div>

            <div class="item">
                <a class="brand_item" href="#!">
                    <img src="user/assets/images/brands/img_18.png" alt="image_not_found">
                </a>
            </div>

            <div class="item">
                <a class="brand_item" href="#!">
                    <img src="user/assets/images/brands/img_01.png" alt="image_not_found">
                </a>
            </div>

            <div class="item">
                <a class="brand_item" href="#!">
                    <img src="user/assets/images/brands/img_02.png" alt="image_not_found">
                </a>
            </div>

            <div class="item">
                <a class="brand_item" href="#!">
                    <img src="user/assets/images/brands/img_03.png" alt="image_not_found">
                </a>
            </div>

            <div class="item">
                <a class="brand_item" href="#!">
                    <img src="user/assets/images/brands/img_04.png" alt="image_not_found">
                </a>
            </div>

            <div class="item">
                <a class="brand_item" href="#!">
                    <img src="user/assets/images/brands/img_05.png" alt="image_not_found">
                </a>
            </div>

            <div class="item">
                <a class="brand_item" href="#!">
                    <img src="user/assets/images/brands/img_06.png" alt="image_not_found">
                </a>
            </div>
        </div>
    </div>
</div>
<!-- barnd_section - end
            ================================================== -->
@endsection
@section('scripts')
<script>
    $(document).ready(function () {
        $('.load_more').click(function () {
            let offset = $(this).data('page');
            $(this).text("Loading Products...").prop('disabled', true);
            let category = $('#category-tab a.active').data('category');
            $.ajax({
                url: "{{ route('load.more.products') }}",
                type: "POST",
                data: {
                    _token: "{{ csrf_token() }}",
                    offset: offset,
                    category: category
                },
                success: function (response) {
                    if (response.moreProducts) {
                        $('#product-list-' + category).append(response.products);
                        $('.result_text span').text(1 + ' to ' + (offset + response.count));
                        $('.load_more').text('Load More').prop('disabled', false).data(
                            'page', offset + 3);
                    } else {
                        $('.load_more').text("No More Products").prop('disabled', true);
                    }
                }
            });
        });
    });
</script>
@endsection
