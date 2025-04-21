<!-- Extends template page-->
@extends('user.layout.header')

<!-- Specify content -->
@section('content')
    <!-- main body - start
		================================================== -->
		<main>
			<!-- breadcrumb_section - start
			================================================== -->
			<section class="breadcrumb_section minimal_breadcrumb d-flex align-items-end clearfix" data-background="user/assets/images/breadcrumb/bg_11.jpg">
				<div class="container maxw_1430">
					<h1 class="minimal_page_title mb_15">Shop Page</h1>
					<div class="f2_breadcrumb_nav_wrap mt-0">
						<ul class="ce_breadcrumb_nav ul_li clearfix">
							<li><a href="#!">Home</a></li>
							<li>Shop</li>
							<li>Minimal Shop</li>
							<li>Shop Details</li>
						</ul>
					</div>
				</div>
			</section>
			<!-- breadcrumb_section - end
			================================================== -->


			<!-- details_section - start
			================================================== -->
			<section class="details_section shop_details sec_ptb_100 clearfix">
				<div class="container">
					<div class="row mb_100 justify-content-lg-between">
						<div class="col-lg-5 col-md-7">
							<div class="col-lg-5 col-md-7">
                                <div class="shop_details_image">
                                    @php
                                        $images = getProductImages($product['id']);
                                    @endphp

                                    <div class="tab-content">
                                        @foreach($images as $key => $img)
                                            <div id="tab_{{$key}}" class="tab-pane fade {{ $key == 0 ? 'show active' : '' }}">
                                                <img  src="{{ $img ? asset('storage/'.$img->file_path) : asset('user/assets/images/15980049.png') }}" alt="image_not_found">
                                            </div>
                                        @endforeach
                                    </div>

                                    <ul class="nav nav-tabs ul_li clearfix mt-3" role="tablist">
                                        @foreach($images as $key => $img)
                                            <li class="nav-item">
                                                <a class="nav-link {{ $key == 0 ? 'active' : '' }}" data-toggle="tab" href="#tab_{{$key}}">
                                                    <img  src="{{ $img ? asset('storage/'.$img->file_path) : asset('user/assets/images/15980049.png') }}" alt="image_not_found">
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
						</div>

						<div class="col-lg-7 col-md-8">
							<div class="shop_details_content">
								<h2 class="item_title">{{$product['name']}}</h2>
								<span class="item_price">$ {{$product['price']}}</span>
								<hr>
								<div class="row mb_30 align-items-center justify-content-lg-between">
									<div class="col-lg-5">
										<div class="item_brand d-flex align-items-center">
											<span class="brand_title">Brands: </span>
											<span class="brand_image d-flex align-items-center justify-content-center" data-bg-color="#f7f7f7">
												{{$product['brand']}}
											</span>
										</div>
									</div>

									<div class="col-lg-7">
										<div class="rating_review_wrap d-flex align-items-center clearfix">
											<ul class="rating_star ul_li">
												<li><i class="fas fa-star"></i></li>
												<li><i class="fas fa-star"></i></li>
												<li><i class="fas fa-star"></i></li>
												<li><i class="fas fa-star"></i></li>
												<li><i class="fas fa-star"></i></li>
											</ul>
											<span>4 Review(s)</span>
											<button type="button" class="add_review_btn">Add Your Review</button>
										</div>
									</div>
								</div>
								<p class="mb-0">
									{{$product['description']}}
								</p>
								<hr>
								<!-- <div class="item_color_list mb_30 clearfix">
									<h4 class="list_title mb_15 text-uppercase">Color</h4>
									<ul class="ul_li clearfix">
										<li>
											<button type="button"><span><small data-bg-color="#cc7b4a"></small></span> Brown</button>
										</li>
					    					<li>
											<button type="button"><span><small data-bg-color="#b6b8ba"></small></span> Grey</button>
										</li>
										<li>
											<button type="button"><span><small data-bg-color="#dd3333"></small></span> Red</button>
										</li>
									</ul>
								</div> -->
								<!-- <div class="item_size_list mb_30 clearfix">
									<h4 class="list_title mb_15 text-uppercase">Size</h4>
									<ul class="ul_li clearfix">
										<li><button type="button">XL</button></li>
										<li><button type="button">L</button></li>
										<li><button type="button">M</button></li>
										<li><button type="button">SM</button></li>
										<li><a class="size_guide" href="#!"><i class="far fa-tape mr-1"></i> Size Guide</a></li>
									</ul>
								</div> -->
                                <form action="{{route('add-to-cart',$product->id)}}" method="post" id="addToCartForm">
                                    @csrf
                                    <ul class="btns_group_1 ul_li mb_30 clearfix">
                                        <li>
                                            <div class="quantity_input">
                                                    <span class="input_number_decrement">–</span>
                                                    <input class="input_number" name="quantity" type="text" value="1">
                                                    <span class="input_number_increment">+</span>
                                                </div>
                                            </li>
                                            @guest('customer')
                                            <li>
                                                <a class="custom_btn bg_black text-uppercase" href="{{ route('user-login') }}"><i class="fal fa-user mr-2"></i>Login For Add to Cart</a>
                                            </li>
                                            @else
                                            <li>
                                                <button type="submit" class="custom_btn bg_black text-uppercase" href="{{ route('user-login') }}"><i class="fal fa-shopping-bag mr-2"></i> Add To Cart</button>
                                            </li>
                                            @endguest
                                    </ul>
                                </form>
                                <div id="cart-message" class="alert alert-success" style="display: none;"></div>

								<ul class="btns_group_2 ul_li clearfix">
									<li><a href="#!"><span><i class="far fa-heart"></i></span> Add to Wishlist</a></li>
									<li><a href="#!"><span><i class="fal fa-repeat"></i></span> Compare</a></li>
								</ul>

								<hr>

								<ul class="product_info ul_li_block clearfix">
									<li><strong>SKU:</strong> {{$product['sku']}}</li>
									<li><strong>Categories:</strong> <a href="#!">{{$product->category_name}}</li>
								</ul>
							</div>
						</div>
					</div>

					<div class="details_description_tab">
						<ul class="nav ul_li text-uppercase" role="tablist">
							<li>
								<a class="active" data-toggle="tab" href="#description_tab">Product Description</a>
							</li>
							<li>
								<a data-toggle="tab" href="#reviews_tab">Reviews</a>
							</li>
							<li>
								<a data-toggle="tab" href="#information_tab">Additional Information</a>
							</li>
						</ul>

						<!-- Tab panes -->
						<div class="tab-content">
							<div id="description_tab" class="tab-pane active">
								<div class="row mb_50">
									<div class="col-lg-12 col-md-12">
										<div class="content_wrap">
											<p class="mb_30">
									            {{$product['description']}}
											</p>
										</div>
									</div>
								</div>
							</div>

							<div id="reviews_tab" class="tab-pane fade">
								<form action="#">
									<div class="row">
										<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
											<div class="form_item">
												<input type="text" name="name" placeholder="Your Name">
											</div>
										</div>

										<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
											<div class="form_item">
												<input type="email" name="email" placeholder="Your Email">
											</div>
										</div>

										<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
											<div class="form_item">
												<input type="text" name="subject" placeholder="Subject">
											</div>
										</div>
									</div>

									<div class="form_item">
										<textarea name="message" placeholder="Your Message"></textarea>
									</div>
									<button type="submit" class="custom_btn bg_default_red text-uppercase">Submit Review</button>
								</form>
							</div>

							<div id="information_tab" class="tab-pane fade">
								<div class="row mb_50">
									<div class="col-lg-3 col-md-5">
										<div class="image_wrap">
											<img src="user/assets/images/details/shop/img_06.jpg" alt="image_not_found">
										</div>
									</div>

									<div class="col-lg-9 col-md-7">
										<div class="content_wrap">
											<p class="mb_30">
												Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur
											</p>

											<h4 class="list_title">Pretium turpis et arcu</h4>
											<p class="mb_30">
												Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur
											</p>

											<h4 class="list_title">Unordered list</h4>
											<p class="mb_30">
												Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
											</p>

											<ul class="product_info ul_li_block clearfix">
												<li><strong>Color:</strong> Brown, Grey, Nude, Red</li>
												<li><strong>Size:</strong> L, M, S, XL, XS</li>
											</ul>
										</div>
									</div>
								</div>

								<div class="row mb_50">
									<div class="col-lg-3 col-md-5 order-last">
										<div class="image_wrap">
											<img src="user/assets/images/details/shop/img_07.jpg" alt="image_not_found">
										</div>
									</div>

									<div class="col-lg-9 col-md-7">
										<div class="content_wrap">
											<h4 class="list_title">Paragraph text</h4>
											<p class="mb_15">
												Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur
											</p>
											<p class="mb_30">
												Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur
											</p>

											<h4 class="list_title">Pretium turpis et arcu</h4>
											<p class="mb-0">
												Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur
											</p>
										</div>
									</div>
								</div>

								<span class="aware_info_icons">
									<img src="user/assets/images/icons/aware_icons.png" alt="image_not_found">
								</span>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- details_section - end
			================================================== -->


		</main>
		<!-- main body - end
		================================================== -->
@endsection
@section('scripts')

<script>
    $(document).ready(function() {
        $('#addToCartForm').submit(function(e) {
            e.preventDefault(); // Prevent default form submission

            var form = $(this);
            var url = form.attr('action');
            var formData = form.serialize();

            $.ajax({
                type: 'POST',
                url: url,
                data: formData,
                success: function(response) {
                    if (response.status === 'success') {
                        $('#cart-message').text(response.message).fadeIn().delay(3000).fadeOut(); // Show success message
                        $('.cart_btn span').text(response.cart_count); // Update cart count in header
                    }
                },
                error: function(response) {
                    $('#cart-message').removeClass('alert-success').addClass('alert-danger')
                        .text('Failed to add product to cart.').fadeIn().delay(3000).fadeOut();
                }
            });
        });
    });
</script>
@endsection
