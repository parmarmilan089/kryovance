<!-- Extends template page-->
@extends('user.layout.header')

<!-- Specify content -->
@section('content')
    <!-- slider_section - start
    ================================================== -->
    <section class="slider_section minimal_slider position-relative arrow_ycenter clearfix">
        <div class="main_slider clearfix" data-slick='{"dots": false}'>
            <div class="item d-flex align-items-center clearfix"
                data-background="user/assets/images/slider/modern_minimal/bg_01.jpg">
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
                data-background="{{ asset('user/assets/images/slider/modern_minimal/bg_02.jpg') }}">
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
                        <a data-toggle="tab" href="#{{ Str::slug($category) }}_tab"
                            class="{{ $loop->first ? 'active' : '' }}" data-category="{{ Str::slug($category) }}">
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
                                        @endphp
                                        <div class="tab-content">
                                            <div class="tab-pane active">
                                                <img src="{{ isset($images[0]) ? asset('storage/' . $images[0]->file_path) : asset('user/assets/images/product-placeholder.png') }}"
                                                    alt="image_not_found">
                                            </div>
                                        </div>
                                        <div class="item_content">
                                            <h3 class="item_title">
                                                <a
                                                    href="{{ route('product_details', $product->id) }}">{{ $product->name }}</a>
                                            </h3>
                                            <span class="item_category">{{ $product->category_name }}</span>
                                            <span class="item_price">₹ {{ $product->price }}</span>
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
        $(document).ready(function() {
            $('.load_more').click(function() {
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
                    success: function(response) {
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
