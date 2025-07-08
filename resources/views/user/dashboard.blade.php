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
                                            <img src="{{ isset($images[0]) ? asset('storage/' . $images[0]->file_path) : asset('user/assets/images/product-placeholder.png') }}" alt="">
                                        </figure>
                                        <div class="product-heading"><a href="{{ route('product_details', $product->id) }}">{{ \Illuminate\Support\Str::limit($product->name, 40, '..') }}</a></div>
                                        <div class="product-subtext">{{ $product->category_name }}</div>
                                        <div class="price-area">
                                            <div class="main-price">₹ {{ number_format($price, 2) }}<span>MRP ₹ {{ number_format($product->mrp, 2) }}</span></div>
                                            <div class="discount">{{ $product->discount_percentage }}%off</div>
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
                                            <div class="cart-cta"><button><img src="{{asset('user/assets/images/cart-icon-w.svg')}}"
                                                        alt=""></button></div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="load-more">
                                        <div class="load-text load_more">
                                            Load More...
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
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
