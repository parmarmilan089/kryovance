<!-- Extends template page-->
@extends('user.layout.header')

<!-- Specify content -->
@section('content')
<!-- main body - start
    ================================================== -->
    <main>


        <!-- sidebar mobile menu & sidebar cart - start
        ================================================== -->
        <div class="sidebar-menu-wrapper">

            <div class="sidebar_mobile_menu">
                <button type="button" class="close_btn"><i class="fal fa-times"></i></button>

                <div class="msb_widget brand_logo text-center">
                    <a href="index.html">
                        <img src="{{asset('public/user/assets/images/logo/logo_25_1x.png')}}" srcset="user/assets/images/logo/logo_25_2x.png 2x" alt="logo_not_found">
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
                        <li><a href="contact.html">Conatct</a></li>
                    </ul>
                </div>

                <div class="user_info">
                    <h3 class="title_text mb_30 text-uppercase"><i class="fas fa-user mr-2"></i> User Info</h3>
                    <div class="profile_info clearfix">
                        <div class="user_thumbnail">
                            <img src="{{asset('public/user/assets/images/meta/img_01.png')}}" alt="thumbnail_not_found">
                        </div>
                        <div class="user_content">
                            <h4 class="user_name">Jone Doe</h4>
                            <span class="user_title">Seller</span>
                        </div>
                    </div>
                    <ul class="settings_options ul_li_block clearfix">
                        <li><a href="#!"><i class="fal fa-user-circle"></i> Profile</a></li>
                        <li><a href="#!"><i class="fal fa-user-cog"></i> Settings</a></li>
                        <li><a href="#!"><i class="fal fa-sign-out-alt"></i> Logout</a></li>
                    </ul>
                </div>
            </div>

            <div class="overlay"></div>
        </div>
        <!-- sidebar mobile menu & sidebar cart - end
        ================================================== -->


        <!-- breadcrumb_section - start
        ================================================== -->
        <section class="breadcrumb_section minimal_breadcrumb d-flex align-items-end clearfix" data-background="{{asset('public/user/assets/images/breadcrumb/bg_11.jpg')}}">
            <div class="container maxw_1430">
                <h1 class="minimal_page_title mb_15">Shop Page</h1>
                <div class="f2_breadcrumb_nav_wrap mt-0">
                    <ul class="ce_breadcrumb_nav ul_li clearfix">
                        <li><a href="#!">Home</a></li>
                        <li>Shop</li>
                        <li>Minimal Shop</li>
                        <li>Shop Page</li>
                    </ul>
                </div>
            </div>
        </section>
        <!-- breadcrumb_section - end
        ================================================== -->


        <!-- product_section - start
        ================================================== -->
        <section class="product_section sec_ptb_100 clearfix">
            <div class="container">
                <div class="carparts_filetr_bar">
                    <div class="row align-items-center justify-content-lg-between">
                        <div class="col-lg-6 col-md-6">
                            <h4 class="result_text">Showing <span>1 to 6</span> of {{$total_products }} total</h4>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="option_select d-flex align-items-center mb-0">
                                <span class="option_title text-uppercase">Sort by:</span>
                                <select style="display: none;">
                                    <option data-display="Select Your Option">Nothing</option>
                                    <option value="1" selected=""> Name</option>
                                    <option value="2">Another option</option>
                                    <option value="3" disabled="">A disabled option</option>
                                    <option value="4">Potato</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mb_50 justify-content-center">
                    <div class="row mb_50 justify-content-center" id="product-list">
                        @include('user.product-list', ['products' => $products])
                    </div>
                </div>

                <div class="load_more text-center clearfix">
                    <button id="load-more" class="custom_btn bg_modern_red text-uppercase" data-page="6">Load More</button>
                </div>
            </div>
        </section>
        <!-- product_section - end
        ================================================== -->


    </main>
    <!-- main body - end
    ================================================== -->

@endsection
@section('scripts')
<script>
    $(document).ready(function() {
        $('#load-more').click(function() {
            let $button = $(this);
            let offset = $(this).data('page');
            $button.text("Loading Products...").prop('disabled', true);
            let name = $('#filter-name').val();
            let price = $('#filter-price').val();
            $.ajax({
                url: "{{ route('loadMore') }}",
                type: "POST",
                data: {
                    _token: "{{ csrf_token() }}",
                    offset: offset,
                    name: name,
                    price: price
                },
                beforeSend: function() {
                },
                success: function(response) {
                    if(response.moreProducts) {
                        $('#product-list').append(response.products);
                        $('.result_text span').text( 1 +' to '+ (offset + response.count));
                        $('#load-more').text('Load More').prop('disabled', false).data('page', offset + 3);
                    } else {
                        $('#load-more').text("No More Products").prop('disabled', true);
                    }
                }
            });
        });

        $('#apply-filters').click(function() {
            $('#product-list').html('');
            $('#load-more').data('offset', 0).prop('disabled', false).text('Load More').click();
        });
    });
    </script>
@endsection
